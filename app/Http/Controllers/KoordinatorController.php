<?php

namespace App\Http\Controllers;

use App\Models\academic_report;
use App\Models\activity_ppas_report;
use App\Models\activity_reguler_report;
use App\Models\beasiswa_report;
use App\Models\Koordinator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Children;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KoordinatorController extends Controller
{
    public function index()
    {
        $dataChildren = Children::join('koordinators', 'koordinators.id', '=', 'children.coordinator_id')
            ->join('children_parents', 'children_parents.id', '=', 'children.parent_id')
            ->where('koordinators.user_id', auth()->user()->id)
            ->where('children.regis_status', '=', 'Diterima')
            ->get(['children.*', 'koordinators.name as koor_name', 'children_parents.name as parent_name']);

        return view('pages.koordinator.index', [
            'dataChildren' => $dataChildren
        ]);
    }

    public function detailIndex($id)
    {
        $data = Children::join('koordinators', 'koordinators.id', '=', 'children.coordinator_id')
            ->join('children_parents', 'children_parents.id', '=', 'children.parent_id')
            ->where('children.id', $id)
            ->get(['children.*', 'koordinators.name as koor_name', 'children_parents.name as parent_name']);
        
        $dataBeasiswa = Children::join('beasiswa_reports', 'beasiswa_reports.child_id', '=', 'children.id')
            ->where('children.id', $id)
            ->get(['beasiswa_reports.*']);
        
        $dataAkademik = Children::join('academic_reports', 'academic_reports.child_id', '=', 'children.id')
            ->where('children.id', $id)
            ->get(['academic_reports.*']);
        
        $dataKegiatan = Children::join('activity_reguler_reports', 'activity_reguler_reports.child_id', '=', 'children.id')
            ->where('children.id', $id)
            ->get(['activity_reguler_reports.*']);
        
        $dataKegiatanPPA = Children::join('activity_ppas_reports', 'activity_ppas_reports.child_id', '=', 'children.id')
            ->where('children.id', $id)
            ->get(['activity_ppas_reports.*']);
        
        
        return view('pages.koordinator.detail-index', [
            'data' => $data,
            'dataBeasiswa' => $dataBeasiswa,
            'dataAkademik' => $dataAkademik,
            'dataKegiatan' => $dataKegiatan,
            'dataKegiatanPPA' => $dataKegiatanPPA
        ]);
    }

    public function about()
    {
        $data = User::join('koordinators', 'users.id', '=', 'koordinators.user_id')
            ->where('koordinators.user_id', auth()->user()->id)
            ->first();
        
        return view('pages.koordinator.about', [
            'data' => $data
        ]);
    }

    public function createData()
    {
        return view('pages.koordinator.create-data');
    }

    public function storeData(Request $request)
    {
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
            return redirect()->route('koordinator.about')->withSuccess('Data Berhasil Disimpan');
        } else {
            dd('gagal');
            return redirect()->route('koordinator.create-data')->withSuccess('Data Gagal Disimpan');
        }
    }

    public function editData($id)
    {
        $data = Koordinator::findOrFail($id);
        return view('pages.koordinator.update-data', [
            'data' => $data
        ]);
    }

    public function updateData(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = Koordinator::findOrFail($id);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = 'images/' . $photo->getClientOriginalName();
            $photo->move(public_path('images'), $filename);
            Storage::delete($data->photo);
    
            $user_id = auth()->user()->id;
            
            $data->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'photo' => $filename,
                'user_id' => $user_id
            ]);
        } else {
            $user_id = auth()->user()->id;
            
            $data->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'user_id' => $user_id
            ]);
        }

        if ($data) {
            return redirect()->route('koordinator.about')->withSuccess('Data Berhasil Diperbarui');
        } else {
            return redirect()->route('koordinator.edit-data')->withSuccess('Data Gagal Diperbarui');
        }
    }

    public function pengajuan()
    {
        $data = Children::join('koordinators', 'children.coordinator_id', '=', 'koordinators.id')
        ->join('children_parents', 'children_parents.id', '=', 'children.parent_id')
        ->where('koordinators.user_id', '=', Auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->get(['children.*', 'koordinators.name as koordinator_name', 'children_parents.name as parent_name']);


        // dd($data);
        return view('pages.koordinator.pengajuan', [
            'data' => $data
        ]);
    }

    public function editPengajuan($id)
    {
        $data = Children::join('koordinators', 'koordinators.id', '=', 'children.coordinator_id')
            ->join('children_parents', 'children_parents.id', '=', 'children.parent_id')
            ->where('children.id', $id)
            ->get(['children.*', 'koordinators.name as koor_name', 'children_parents.name as parent_name']);

        // dd($data->first()->regis_status);
        return view('pages.koordinator.edit-pengajuan', [
            'data' => $data
        ]);
    }

    public function updatePengajuan(Request $request, $id)
    {
        $this->validate($request, [
            'regis_status' => 'required',
            'note_status' => 'nullable'
        ]);

        $data = Children::findOrFail($id);

        $data->update([
            'regis_status' => $request->regis_status,
            'note_status' => $request->note_status
        ]);

        if ($data) {
            // dd('berhasil');
            return redirect()->route('koordinator.pengajuan');
        } else {
            // dd('gagal');
            return redirect()->route('koordinator.edit-pengajuan');
        }
    }

    public function riwayatPengajuanAkun()
    {
        $data = User::where('role_id', 3)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('pages.koordinator.riwayat-akun', [
            'data' => $data
        ]);
    }

    public function beasiswa()
    {
        $data = Children::join('beasiswa_reports', 'children.id', '=', 'beasiswa_reports.child_id')
        ->join('koordinators', 'children.coordinator_id', '=', 'koordinators.id')
        ->where('koordinators.user_id', '=', Auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->get(['children.name as child_name', 'children.photo as photo', 'beasiswa_reports.*']);
        // dd($data);

        return view('pages.koordinator.beasiswa', [
            'data' => $data
        ]);
    }

    public function editBeasiswa($id = null)
    {
        $data = Children::join('beasiswa_reports', 'children.id', '=', 'beasiswa_reports.child_id')
        ->where('children.id', $id)
        ->get(['children.name as child_name', 'children.photo as photo', 'beasiswa_reports.*']);

        return view('pages.koordinator.update-beasiswa', [
            'data' => $data
        ]);
    }

    public function updateBeasiswa(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        $data = beasiswa_report::findOrFail($id);

        $data->update([
            'status' => $request->status
        ]);

        if ($data) {
            return redirect()->route('koordinator.beasiswa');
        } else {
            return view('pages.koordinator.update-beasiswa');
        }
    }

    public function akademik()
    {
        $data = Children::join('academic_reports', 'children.id', '=', 'academic_reports.child_id')
        ->join('koordinators', 'children.coordinator_id', '=', 'koordinators.id')
        ->where('koordinators.user_id', '=', Auth()->user()->id)
        ->get(['children.name as child_name', 'children.photo as photo', 'academic_reports.*']);

        return view('pages.koordinator.akademik', [
            'data' => $data
        ]);
    }

    public function editAkademik($id = null)
    {
        $data = Children::join('academic_reports', 'children.id', '=', 'academic_reports.child_id')
        ->join('koordinators', 'children.coordinator_id', '=', 'koordinators.id')
        ->where('children.id', $id)
        ->get(['children.name as child_name', 'children.photo as photo', 'academic_reports.*']);

        return view('pages.koordinator.update-akademik', [
            'data' => $data
        ]);
    }

    public function updateAkademik(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        $data = academic_report::findOrFail($id);

        $data->update([
            'status' => $request->status
        ]);

        if ($data) {
            return redirect()->route('koordinator.akademik');
        } else {
            return view('pages.koordinator.update-akademik');
        }
    }

    public function kegiatanReguler()
    {
        $data = Children::join('activity_reguler_reports', 'children.id', '=', 'activity_reguler_reports.child_id')
        ->join('koordinators', 'children.coordinator_id', '=', 'koordinators.id')
        ->where('koordinators.user_id', '=', Auth()->user()->id)
        ->where('children.status_in_family', '!=', 'Penghafal al Quran')
        ->get(['children.name as child_name', 'children.photo as photo', 'activity_reguler_reports.*']);
        // dd($data);

        return view('pages.koordinator.kegiatan-reguler', [
            'data' => $data
        ]);
    }

    public function editKegiatanReguler($id = null)
    {
        $data = activity_reguler_report::join('children', 'activity_reguler_reports.child_id', '=', 'children.id')
        ->where('activity_reguler_reports.id', $id)
        ->get(['children.name as child_name', 'children.photo as photo', 'activity_reguler_reports.*']);    

        // dd($data);

        return view('pages.koordinator.update-kegiatan-reguler', [
            'data' => $data
        ]);
    }

    public function updateKegiatanReguler(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        $data = activity_reguler_report::findOrFail($id);

        $data->update([
            'status' => $request->status
        ]);

        if ($data) {
            return redirect()->route('koordinator.kegiatan');
        } else {
            return view('pages.koordinator.update-kegiatan');
        }
    }

    public function kegiatanPpa()
    {
        $data = Children::join('activity_ppas_reports', 'children.id', '=', 'activity_ppas_reports.child_id')
        ->join('koordinators', 'children.coordinator_id', '=', 'koordinators.id')
        ->where('koordinators.user_id', '=', Auth()->user()->id)
        ->where('children.status_in_family', '=', 'Penghafal al Quran')
        ->get(['children.name as child_name', 'children.photo as photo', 'activity_ppas_reports.*']);
        // dd($data);

        return view('pages.koordinator.kegiatan-ppa', [
            'data' => $data
        ]);
    }

    public function editKegiatanPpa($id = null)
    {
        $data = activity_ppas_report::join('children', 'activity_ppas_reports.child_id', '=', 'children.id')
        ->where('activity_ppas_reports.id', $id)
        ->get(['children.name as child_name', 'children.photo as photo', 'activity_ppas_reports.*']);   

        // dd($data);

        return view('pages.koordinator.update-kegiatan-ppa', [
            'data' => $data
        ]);
    }

    public function updateKegiatanPpa(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        $data = activity_ppas_report::findOrFail($id);

        $data->update([
            'status' => $request->status
        ]);

        if ($data) {
            return redirect()->route('koordinator.kegiatan-ppa');
        } else {
            return view('pages.koordinator.update-kegiatan-ppa');
        }
    }
}
