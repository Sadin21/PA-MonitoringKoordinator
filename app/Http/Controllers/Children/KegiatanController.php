<?php

namespace App\Http\Controllers\Children;

use App\Http\Controllers\Controller;
use App\Models\activity_ppas_report;
use App\Models\activity_reguler_report;
use App\Models\Children;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function kegiatanReguler()
    {   
        $dataChildren = Children::join('activity_reguler_reports', 'children.id', '=', 'activity_reguler_reports.child_id')
        ->where('children.user_id', '=', auth()->user()->id)
        ->get('activity_reguler_reports.*');

        return view('pages.anak.kegiatan-reguler', [
            'dataChildren' => $dataChildren
        ]);
    }

    public function createKegiatanReguler()
    {
        return view('pages.anak.create-kegiatan-reguler');
    }

    public function storeKegiatanReguler(Request $request)
    {
        $this->validate($request, [
            'five_time_pray' => 'required',
            'pray_in_mosque' => 'required',
            'pray_ontime' => 'required',
            'pray_rawatib' => 'required',
            'pray_tahiyatul' => 'required',
            'pray_tahajud' => 'required',
            'pray_dhuha' => 'required',
            'pray_fajr' => 'required',
            'pray_hajad' => 'required',
            'read_quran' => 'required',
            'memorize_quran' => 'required',
            'amount_memorize_quran' => 'required',
            'fast_sunnah' => 'required',
            'infaq_sedekah' => 'required',
            'help_parent' => 'required',
            'self_study' => 'required',
            'team_study' => 'required',
            'help_friend' => 'required',
            'pray_quran_with_ustadz' => 'required',
            'description' => 'required',
        ]);

        $user_id = auth()->user()->children->id;

        $data = activity_reguler_report::create([
            'five_time_pray' => $request->five_time_pray,
            'pray_in_mosque' => $request->pray_in_mosque,
            'pray_ontime' => $request->pray_ontime,
            'pray_rawatib' => $request->pray_rawatib,
            'pray_tahiyatul' => $request->pray_tahiyatul,
            'pray_tahajud' => $request->pray_tahajud,
            'pray_dhuha' => $request->pray_dhuha,
            'pray_fajr' => $request->pray_fajr,
            'pray_hajad' => $request->pray_hajad,
            'read_quran' => $request->read_quran,
            'memorize_quran' => $request->memorize_quran,
            'amount_memorize_quran' => $request->amount_memorize_quran,
            'fast_sunnah' => $request->fast_sunnah,
            'infaq_sedekah' => $request->infaq_sedekah,
            'help_parent' => $request->help_parent,
            'self_study' => $request->self_study,
            'team_study' => $request->team_study,
            'help_friend' => $request->help_friend,
            'pray_quran_with_ustadz' => $request->pray_quran_with_ustadz,
            'description' => $request->description,
            'status' => 'Pengajuan',
            'child_id' => $user_id,
        ]);

        // dd($data);

        if ($data) {
            // dd('berhasil');
            return redirect()->route('child.kegiatan')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('child.kegiatan')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    public function kegiatanPpa()
    {   
        $dataChildren = Children::join('activity_ppas_reports', 'children.id', '=', 'activity_ppas_reports.child_id')
        ->where('children.user_id', '=', auth()->user()->id)
        ->get('activity_ppas_reports.*');

        return view('pages.anak.kegiatan-ppa', [
            'dataChildren' => $dataChildren
        ]);
    }

    public function createKegiatanPpa()
    {
        return view('pages.anak.create-kegiatan-ppa');
    }
    
    public function storeKegiatanPpa(Request $request)
    {
        $this->validate($request, [
            'surah_name' => 'required',
            'amount_ayah' => 'required',
            'description' => 'required',
            'youtube_link' => 'required',
        ]);

        $data = activity_ppas_report::create([
            'surah_name' => $request->surah_name,
            'amount_ayah' => $request->amount_ayah,
            'description' => $request->description,
            'youtube_link' => $request->youtube_link,
            'status' => 'Pengajuan',
            'child_id' => auth()->user()->children->id,
        ]);

        // dd($data);

        if ($data) {
            return redirect()->route('child.kegiatan-ppa')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('child.kegiatan-ppa')->with('failed', 'Data Gagal Ditambahkan');
        }
    }
}
