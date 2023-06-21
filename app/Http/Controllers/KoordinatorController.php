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
use App\Models\children_parent;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
            Alert::success('Data Berhasil Disimpan');
            return redirect()->route('koordinator.about');
        } else {
            Alert::success('Data Gagal Disimpan');
            return redirect()->route('koordinator.create-data');
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
            Alert::success('Update Berhasil');
            return redirect()->route('koordinator.about');
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
            'note_status' => 'nullable',
            'donation_amount' => 'required'
        ]);

        $data = Children::findOrFail($id);

        $data->update([
            'regis_status' => $request->regis_status,
            'note_status' => $request->note_status,
            'donation_amount' => $request->donation_amount
        ]);

        if ($data) {
            // dd('berhasil');
            Alert::success('Data Berhasil Disimpan');
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

    public function dataParent()
    {
        $data = children_parent::get();
        $children_sum = [];
        foreach ($data as $d) {
            $children = Children::where('children.parent_id', $d->id)->count();
            $children_sum[$d->id] = $children;
        }
        
        return view('pages.koordinator.show-parent', [
            'data' => $data,
            'children_sum' => $children_sum
        ]);
    }

    public function detailParent($id)
    {
        $data = children_parent::find($id);

        return view('pages.koordinator.detail-parent', [
            'data' => $data
        ]);
    }

    public function createParent()
    {
        return view('pages.koordinator.create-parent');
    }

    public function storeParent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'marital' => 'required',
            'tertiary_education' => 'required',
            'job' => 'required',
            'salary' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'home_status' => 'required',
            'number_of_souls' => 'required',
            'category_of_souls' => 'required',
            'nik' => 'required',
            'file_ktp' => 'required|image|max:2048|mimes:jpg,jpeg,png',
            'file_kk' => 'required|image|max:2048|mimes:jpg,jpeg,png'
        ]);

        $file_ktp = $request->file('file_ktp');
        $filename = 'images/berkas_parent/' . $file_ktp->getClientOriginalName();
        $file_ktp->move(public_path('images/berkas_parent/'), $filename);

        $file_kk = $request->file('file_kk');
        $filename2 = 'images/berkas_parent/' . $file_kk->getClientOriginalName();
        $file_kk->move(public_path('images/berkas_parent/'), $filename2);
        
        $data = children_parent::create([
            'name' => $request->name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'marital' => $request->marital,
            'tertiary_education' => $request->tertiary_education,
            'job' => $request->job,
            'salary' => $request->salary,
            'address' => $request->address,
            'phone' => $request->phone,
            'home_status' => $request->home_status,
            'number_of_souls' => $request->number_of_souls,
            'category_of_souls' => $request->category_of_souls,
            'nik' => $request->nik,
            'file_ktp' => $filename,
            'file_kk' => $filename2
        ]);

        // dd($data);
        if ($data) {
            // dd('berhasil');
            Alert::success('Data Berhasil Disimpan');
            return redirect()->route('koordinator.data-wali');
        } else {
            return redirect()->route('koordinator.create-data-wali');
        }
    }

    public function editParent($id)
    {
        $data = children_parent::findOrFail($id);

        return view('pages.koordinator.update-parent', [
            'data' => $data
        ]);
    }

    public function updateParent(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'marital' => 'required',
            'tertiary_education' => 'required',
            'job' => 'required',
            'salary' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'home_status' => 'required',
            'number_of_souls' => 'required',
            'category_of_souls' => 'required',
            'nik' => 'required',
            'file_ktp' => 'image|max:2048|mimes:jpg,jpeg,png',
            'file_kk' => 'image|max:2048|mimes:jpg,jpeg,png'
        ]);

        $data = children_parent::find($id);

        if ($request->hasFile('file_ktp')) {
            $file_ktp = $request->file('file_ktp');
            $filename = 'images/berkas_parent/' . $file_ktp->getClientOriginalName();
            $file_ktp->move(public_path('images/berkas_parent/'), $filename);
            if ($data->file_ktp) {
                Storage::delete('public/' . $data->file_ktp);
            }
            $data->file_ktp = $filename;
        }

        if ($request->hasFile('file_kk')) {
            $file_kk = $request->file('file_kk');
            $filename2 = 'images/berkas_parent/' . $file_kk->getClientOriginalName();
            $file_kk->move(public_path('images/berkas_parent/'), $filename2);
            if ($data->file_kk) {
                Storage::delete('public/' . $data->file_kk);
            }
            $data->file_kk = $filename2;
        }
        
        $data->name = $request->name;
        $data->birth_place = $request->birth_place;
        $data->birth_date = $request->birth_date;
        $data->marital = $request->marital;
        $data->tertiary_education = $request->tertiary_education;
        $data->job = $request->job;
        $data->salary = $request->salary;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->home_status = $request->home_status;
        $data->number_of_souls = $request->number_of_souls;
        $data->category_of_souls = $request->category_of_souls;
        $data->nik = $request->nik;
        $data->save();

        // dd($data);
        if ($data) {
            Alert::success('Data Berhasil Diubah');
            return redirect()->route('koordinator.data-wali');
        } else {
            return redirect()->route('koordinator.edit-data-wali');
        }
    }

    public function destroyParent($id)
    {
        $data = children_parent::findOrFail($id);
        $data->delete();

        if ($data) {
            Alert::success('Data Berhasil Dihapus');
            return redirect()->route('koordinator.data-wali');
        } else {
            return redirect()->route('koordinator.data-wali');
        }
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

    public function editBeasiswa($id)
    {
        $data = Children::join('beasiswa_reports', 'children.id', '=', 'beasiswa_reports.child_id')
        ->where('beasiswa_reports.id', $id)
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
            Alert::success('Data Berhasil Disimpan');
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
        ->where('academic_reports.id', $id)
        ->get(['children.name as child_name', 'children.photo as photo', 'academic_reports.*']);
        // dd($data);

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
            Alert::success('Data Berhasil Disimpan');
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
            Alert::success('Data Berhasil Disimpan');
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
            Alert::success('Data Berhasil Disimpan');
            return redirect()->route('koordinator.kegiatan-ppa');
        } else {
            return view('pages.koordinator.update-kegiatan-ppa');
        }
    }
}
