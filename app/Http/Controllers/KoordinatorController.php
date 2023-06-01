<?php

namespace App\Http\Controllers;

use App\Models\Koordinator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Children;
use Illuminate\Support\Facades\Validator;

class KoordinatorController extends Controller
{
    public function index()
    {
        $dataChildren = Koordinator::join('users', 'koordinators.user_id', '=', 'users.id')
            ->join('children', 'koordinators.id', '=', 'children.coordinator_id')
            ->where('koordinators.user_id', auth()->user()->id)
            ->get(['children.*', 'users.name as koordinator_name']);

        return view('pages.koordinator.index', [
            'dataChildren' => $dataChildren
        ]);
    }

    public function about()
    {
        $data = User::join('koordinators', 'users.id', '=', 'koordinators.user_id')
            ->where('koordinators.user_id', auth()->user()->id)
            ->first();
        
            // dd($data);
        return view('pages.koordinator.about', [
            'data' => $data
        ]);
    }

    public function storeData(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $photo = $request->file('photo');
        $filename = 'images/' . $photo->getClientOriginalName();
        $photo->move(public_path('images'), $filename);

        $user_id = auth()->user()->id;
        
        $data = Koordinator::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'photo' => $filename,
            'user_id' => $user_id
        ]);

        if ($data) {
            // dd('berhasil');
            return redirect()->route('koordinator.index')->withSuccess('Data Berhasil Disimpan');
        } else {
            dd('gagal');
            return redirect()->route('koordinator.index')->withSuccess('Data Gagal Disimpan');
        }
    }

    public function pengajuan()
    {
        $dataChildren = Children::join('koordinators', 'children.coordinator_id', '=', 'koordinators.id')
        ->join('children_parents', 'children_parents.id', '=', 'children.parent_id')
        ->where('koordinators.user_id', '=', Auth()->user()->id)
        ->get(['children.*', 'koordinators.name as koordinator_name', 'children_parents.name as parent_name']);

        return view('pages.koordinator.pengajuan', [
            'dataChildren' => $dataChildren
        ]);
    }

    public function editPegajuan($id)
    {
        $data = Children::findOrFail($id);
        dd($data);
        return view('pages.koordinator.edit-pengajuan');
    }

    public function updatePengajuan(Request $request, $id)
    {
        $this->validate($request, [
            'regis_status' => 'required'
        ]);

        $data = Children::findOrFail($id);

        $data->update([
            'regis_status' => $request->regis_status
        ]);

        if ($data) {
            dd('berhasil');
            return view('pages.koordinator.pengajuan');
        } else {
            dd('gagal');
            return view('pages.koordinator.pengajuan');
        }
    }
}
