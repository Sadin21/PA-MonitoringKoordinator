<?php

namespace App\Http\Controllers\Children;

use App\Http\Controllers\Controller;
use App\Models\beasiswa_report;
use App\Models\Children;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class BeasiswaController extends Controller
{
    public function beasiswa()
    {
        $dataChildren = Children::join('beasiswa_reports', 'children.id', '=', 'beasiswa_reports.child_id')
            ->where('children.user_id', '=', auth()->user()->id)
            ->get(['beasiswa_reports.*']);

        return view('pages.anak.beasiswa', [
            'dataChildren' => $dataChildren
        ]);
    }

    public function createBeasiswa()
    {
        return view('pages.anak.create-beasiswa');
    }

    public function storeBeasiswa(Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required',
            'date' => 'required',
            'file' => 'required|file|max:2048|mimes:jpg,jpeg,png,pdf'
        ]);
        // dd($request->file('file'));

        $file = $request->file('file');
            $filename = 'images/anak/' . $file->getClientOriginalName();
            $file->move(public_path('images/anak'), $filename);
    
            $user_id = auth()->user()->children->id;
        
        $data = beasiswa_report::create([
            'nominal' => $request->nominal,
            'date' => $request->date,
            'file' => $filename,
            'status' => 'Pengajuan',
            'child_id' => $user_id
        ]);

        if ($data) {
            // dd('berhasil');
            Alert::success('Data Berhasil Disimpan');
            return redirect()->route('child.beasiswa');
        } else {
            return redirect()->route('child.beasiswa');
        }
    }
}
