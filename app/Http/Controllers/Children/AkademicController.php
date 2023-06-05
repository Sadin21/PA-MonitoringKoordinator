<?php

namespace App\Http\Controllers\Children;

use App\Http\Controllers\Controller;
use App\Models\academic_report;
use App\Models\Children;
use Illuminate\Http\Request;

class AkademicController extends Controller
{
    public function akademik()
    {
        $dataChildren = Children::join('academic_reports', 'children.id', '=', 'academic_reports.child_id')
            ->where('children.user_id', '=', auth()->user()->id)
            ->get(['academic_reports.*', 'children.class as class', 'children.school as school']);
        
        return view('pages.anak.akademik', [
            'dataChildren' => $dataChildren
        ]);
    }

    public function createAkademik()
    {
        return view('pages.anak.create-akademik');
    }

    public function storeAkademik(Request $request)
    {
        $this->validate($request, [
            'maxScore' => 'required',
            'minScore' => 'required',
            'meanScore' => 'required',
            'file' => 'required|file|max:2048|mimes:jpg,jpeg,png,pdf'
        ]);
        // dd($request->file('file'));

        $file = $request->file('file');
            $filename = 'images/anak/' . $file->getClientOriginalName();
            $file->move(public_path('images/anak'), $filename);
    
            $user_id = auth()->user()->children->id;
        
        $data = academic_report::create([
            'maxScore' => $request->maxScore,
            'minScore' => $request->minScore,
            'meanScore' => $request->meanScore,
            'file' => $filename,
            'status' => 'Pengajuan',
            'child_id' => $user_id
        ]);

        if ($data) {
            // dd('berhasil');
            return redirect()->route('child.akademik')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('child.akademik')->with('error', 'Data gagal ditambahkan');
        }
    }
}
