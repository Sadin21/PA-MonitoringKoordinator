<?php

namespace App\Http\Controllers;

use App\Models\Children;
use App\Models\Koordinator;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $dataKoor = Koordinator::get();
        return view('pages.admin.index', [
            'dataKoor' => $dataKoor,
        ]);
    }

    public function detailKoor($id)
    {
        $data = Koordinator::join('children', 'children.coordinator_id', '=', 'koordinators.id')
        ->where('koordinators.id', '=', $id)
        ->get(['koordinators.*', 'children.name as child_name', 'children.status_in_family as child_status', 'children.photo as child_photo', 'children.school as child_school', 'children.id as child_id']);

        // $data = Koordinator::findOrFail($id);
        // dd($data);
        return view('pages.admin.detail-koor', [
            'data' => $data
        ]);
    }

    public function riwayatAkun()
    {
        $data = User::where('role_id', '=', '2')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('pages.admin.riwayat-akun', [
            'data' => $data
        ]);
    }

    public function anak()
    {
        $dataChildren = Children::where('regis_status', '=', 'Diterima')->get();

        // $response = Http::get('http://localhost:8000/api/children')['data'];

        return view('pages.admin.anak', [
            'dataChildren' => $dataChildren
        ]);
        
    }

    public function getAnak(): JsonResponse
    {
        try {
            $dataChildren = Children::where('regis_status', '=', 'Diterima')->get();
            return response()->json([
                'status' => 'success',
                'data' => $dataChildren
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function detailAnak($id)
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
        
        
        return view('pages.admin.detail-anak', [
            'data' => $data,
            'dataBeasiswa' => $dataBeasiswa,
            'dataAkademik' => $dataAkademik,
            'dataKegiatan' => $dataKegiatan,
            'dataKegiatanPPA' => $dataKegiatanPPA
        ]);
    }

    public function pengajuan()
    {
        $data = Children::join('koordinators', 'koordinators.id', '=', 'children.coordinator_id')
        ->join('children_parents', 'children_parents.id', '=', 'children.parent_id')
        ->where('children.regis_status', '=', 'Diterima Koordinator')
        ->get(['children.*', 'koordinators.name as koor_name', 'children_parents.name as parent_name']);

        return view('pages.admin.pengajuan', [
            'data' => $data
        ]);
    }

    public function riwayatPengajuan()
    {
        $data = Children::join('children_parents', 'children_parents.id', '=', 'children.parent_id')
        ->orderBy('children.created_at', 'desc')
        ->get(['children.*', 'children_parents.name as parent_name']);

        return view('pages.admin.riwayat-pengajuan', [
            'data' => $data
        ]);
    }

    public function editPengajuanChildren($id)
    {
        $data = Children::join('koordinators', 'koordinators.id', '=', 'children.coordinator_id')
            ->join('children_parents', 'children_parents.id', '=', 'children.parent_id')
            ->where('children.id', $id)
            ->get(['children.*', 'koordinators.name as koor_name', 'children_parents.name as parent_name']);

        // dd($data);
        return view('pages.admin.update-pengajuan', [
            'data' => $data
        ]);
    }

    public function updatePengajuanChildren(Request $request, $id)
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
        // dd($data);
        if ($data) {
            // dd('berhasil');
            Alert::success('Data Berhasil Diperbarui');
            return redirect()->route('admin.pengajuan');
        } else {
            // dd('gagal');
            return redirect()->route('admin.edit-pengajuan');
        }
    }
}
