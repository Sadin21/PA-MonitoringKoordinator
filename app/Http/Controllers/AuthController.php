<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registerKoor()
    {
        return view('pages.admin.register-akun');
    }

    public function registerAnak()
    {
        return view('pages.koordinator.register-akun');
    }

    public function storeRegisterKoor(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password'=> 'required',
            'role_id' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id'=> $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        // dd($user);

        if ($user) {
            return redirect()->route('admin.riwayat-akun');
        } else {
            return redirect()->route('admin.register');
        }

    }

    public function storeRegisterAnak(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password'=> 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id'=> '3',
            'password' => Hash::make($request->password),
        ]);

        // dd($user);

        if ($user) {
            return redirect()->route('koordinator.pengajuan');
        } else {
            return redirect()->route('koordinator.register');
        }

    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        if(Auth::attempt($credentials)) {

            $user = Auth::user();
            // dd($user);
            
            if ($user->role_id == 1) {
                // dd('berhasil');
                return redirect()->route('admin.index')->withSuccess('Login Berhasil');
            } elseif ($user->role_id == 2) {
                // dd('koor');
                return redirect()->route('koordinator.index')->withSuccess('Login Berhasil');
            } elseif ($user->role_id == 3) {
                return redirect()->route('child.index')->withSuccess('Login Berhasil');
            }

        }

        return back()->withErrors([
            'email' => 'Email atau Password salah'
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->withSuccess('Logout Berhasil');
    }
}
