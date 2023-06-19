@extends('layout-koordinator')

@section('title', 'Detail Anak Asuh | Dashboard Koordinator')
@section('content')
<div class="grid grid-cols-5 gap-8">
    <div class="border-2 bg-white p-4 h-80">
        <img src="{{ asset($data->first()->photo) }}" alt="" class="w-full h-52">
        <div class="text-center mt-6">
            <h1>Aktif sejak</h1>
            <p class="font-bold">
                {{ $data->first()->updated_at->format('d M Y') }}
            </p>
        </div>
    </div>
    <div class="col-span-4">
        <div class="border-2 bg-white p-4 grid grid-cols-2">
            <div>
                <table class="table p-4 bg-white w-full">
                    <tbody>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Nama
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->name }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Status
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->status_in_family }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Jenis Kelamin
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->gender }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Tempat, Tanggal Lahir
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->birth_place }}, {{ $data->first()->birth_date }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <table class="table p-4 bg-white w-full">
                    <tbody>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Nama Wali
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->parent_name }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Sekolah
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->school }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Kelas
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->class }} {{ $data->first()->grade }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Alamat
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->address }}, {{ $data->first()->city_address }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="border-2 bg-white p-4 grid grid-cols-2 mt-8">
            <table class="table py-4 bg-white w-full">
                <tbody>
                    <tr class="text-gray-700 mb-4 flex items-start justify-between">
                        <td class="p-4">
                            File Raport
                        </td>
                        <td class="p-4 font-bold">
                            <img src="{{ asset($data->first()->file_raport) }}" alt="" class="w-72 h-44">
                        </td>
                    </tr>
                    <tr class="text-gray-700 mb-4 flex items-start justify-between">
                        <td class="p-4">
                            File SKTM
                        </td>
                        <td class="p-4 font-bold">
                            <img src="{{ asset($data->first()->file_sktm) }}" alt="" class="w-72 h-44">
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table py-4 bg-white w-full">
                <tbody>
                    <tr class="text-gray-700 mb-4 flex items-start justify-between">
                        <td class="p-4">
                            Foto Depan Rumah
                        </td>
                        <td class="p-4 font-bold">
                            <img src="{{ asset($data->first()->photo_front_home) }}" alt="" class="w-72 h-44">
                        </td>
                    </tr>
                    <tr class="text-gray-700 mb-4 flex items-start justify-between">
                        <td class="p-4">
                            Foto Ruang Tamu
                        </td>
                        <td class="p-4 font-bold">
                            <img src="{{ asset($data->first()->photo_sitting_room) }}" alt="" class="w-72 h-44">
                        </td>
                    </tr>
                    <tr class="text-gray-700 mb-4 flex items-start justify-between">
                        <td class="p-4">
                            Foto Dapur
                        </td>
                        <td class="p-4 font-bold">
                            <img src="{{ asset($data->first()->photo_kitchen) }}" alt="" class="w-72 h-44">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="border-2 bg-white p-4 mt-8">
    <h1 class="font-semibold text-2xl mb-6">Laporan Beasiswa</h1>
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded bg-white border-2">
        <table id="example" class="stripe hover" style="width:100%; padding-top: 3em;  padding-bottom: 3em;">
            <thead>
                <tr>
                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                        Tanggal
                    </th>
                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                        Nominal
                    </th>
                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                        File
                    </th>
                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                    Status 
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataBeasiswa as $b)
                    <tr>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $b->created_at->format('d M Y') }}
                            </p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $b->nominal }}
                        </p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">
                                <img src="{{ url("{$b->file}") }}" class="mx-auto object-cover border-4 rounded-sm h-24 w-28 "/>
                            </p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <span class="relative inline-block px-3 py-1 font-semibold ">
                                @if ($b->status == 'Pengajuan') 
                                  <span aria-hidden="true" class="absolute inset-0 bg-yellow-600 rounded-full ">
                                  </span>
                                  <span class="relative">
                                      {{ $b->status }}
                                  </span>
                                @elseif($b->status == 'Diterima Koordinator')
                                  <span aria-hidden="true" class="absolute inset-0 bg-green-600 rounded-full ">
                                  </span>
                                  <span class="relative">
                                      {{ $b->status }}
                                  </span>
                                @elseif ($b->status == 'Perlu Revisi')
                                  <span aria-hidden="true" class="absolute inset-0 bg-red-600 rounded-full ">
                                  </span>
                                  <span class="relative">
                                      {{ $b->status }}
                                  </span>
                                @endif
                              </span>
                        </span>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <a href="{{ route('koordinator.update-beasiswa', $b->id) }}" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                              </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="border-2 bg-white p-4 mt-8">
    <h1 class="font-semibold text-2xl mb-6">Laporan Akademik</h1>
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded bg-white border-2">
        <table id="akademik" class="stripe hover" style="width:100%; padding-top: 3em;  padding-bottom: 3em;">
            <thead>
                <tr>
                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                        Tanggal
                    </th>
                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                        Nilai Rata - Rata
                    </th>
                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                        File 
                    </th>
                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                      Status 
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Aksi
                </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataAkademik as $a)
                <tr>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ $a->created_at->format('d M Y') }}
                    </p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $a->meanScore }}
                        </p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <img src="{{ url("{$a->file}") }}" class="mx-auto object-cover border-4 rounded-sm h-24 w-28 "/>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                            <span class="relative inline-block px-3 py-1 font-semibold ">
                                @if ($a->status == 'Pengajuan') 
                                <span aria-hidden="true" class="absolute inset-0 bg-yellow-600 rounded-full ">
                                </span>
                                <span class="relative">
                                    {{ $a->status }}
                                </span>
                                @elseif($a->status == 'Diterima Koordinator')
                                <span aria-hidden="true" class="absolute inset-0 bg-green-600 rounded-full ">
                                </span>
                                <span class="relative">
                                    {{ $a->status }}
                                </span>
                                @elseif ($a->status == 'Perlu Revisi')
                                <span aria-hidden="true" class="absolute inset-0 bg-red-600 rounded-full ">
                                </span>
                                <span class="relative">
                                    {{ $a->status }}
                                </span>
                                @endif
                            </span>
                        </span>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <a href="{{ route('koordinator.edit-akademik', $a->id) }}" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                          </a>
                    </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@if ($data->first()->status_in_family == 'Penghafal al Quran')
    <div class="border-2 bg-white p-4 mt-8">
        <h1 class="font-semibold text-2xl mb-6">Laporan Kegiatan (PPA)</h1>
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded bg-white border-2">
            <table id="kegiatan-ppa" class="stripe hover" style="width:100%; padding-top: 3em;  padding-bottom: 3em;">
                <thead>
                    <tr>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                            Nama Surat
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                            Link
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                        Status 
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKegiatanPPA as $p)
                    <tr>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $p->surah_name }}
                            </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $p->youtube_link }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                <span class="relative inline-block px-3 py-1 font-semibold ">
                                    @if ($p->status == 'Pengajuan') 
                                    <span aria-hidden="true" class="absolute inset-0 bg-yellow-600 rounded-full ">
                                    </span>
                                    <span class="relative">
                                        {{ $p->status }}
                                    </span>
                                    @elseif($p->status == 'Diterima Koordinator')
                                    <span aria-hidden="true" class="absolute inset-0 bg-green-600 rounded-full ">
                                    </span>
                                    <span class="relative">
                                        {{ $p->status }}
                                    </span>
                                    @elseif ($p->status == 'Perlu Revisi')
                                    <span aria-hidden="true" class="absolute inset-0 bg-red-600 rounded-full ">
                                    </span>
                                    <span class="relative">
                                        {{ $p->status }}
                                    </span>
                                    @endif
                                </span>
                            </span>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <a href="{{ route('koordinator.edit-kegiatan-ppa', $p->id) }}" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                    </svg>
                                  </a>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <div class="border-2 bg-white p-4 mt-8">
        <h1 class="font-semibold text-2xl mb-6">Laporan Kegiatan (Reguler)</h1>
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded bg-white border-2">
            <table id="kegiatan" class="stripe hover" style="width:100%; padding-top: 3em;  padding-bottom: 3em;">
                <thead>
                    <tr>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                            Tanggal
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                            Sholat 5 waktu
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                            Membaca Al-Qur'an
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                        Status 
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKegiatan as $k)
                        <tr>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $k->created_at->format('d M Y') }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $k->five_time_pray }}
                            </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $k->read_quran }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <span class="relative inline-block px-3 py-1 font-semibold ">
                                    @if ($k->status == 'Pengajuan') 
                                      <span aria-hidden="true" class="absolute inset-0 bg-yellow-600 rounded-full ">
                                      </span>
                                      <span class="relative">
                                          {{ $k->status }}
                                      </span>
                                    @elseif($k->status == 'Diterima Koordinator')
                                      <span aria-hidden="true" class="absolute inset-0 bg-green-600 rounded-full ">
                                      </span>
                                      <span class="relative">
                                          {{ $k->status }}
                                      </span>
                                    @elseif ($k->status == 'Perlu Revisi')
                                      <span aria-hidden="true" class="absolute inset-0 bg-red-600 rounded-full ">
                                      </span>
                                      <span class="relative">
                                          {{ $k->status }}
                                      </span>
                                    @endif
                                  </span>
                            </span>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <a href="{{ route('koordinator.edit-kegiatan', $k->id) }}" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                    </svg>
                                  </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif



@endsection

@section('script')
<script>
    $(document).ready(function() {

    var table = $('#example').DataTable({
        responsive: true
        })
        .columns.adjust()
        .responsive.recalc();
    });
</script>
<script>
    $(document).ready(function() {

    var table = $('#akademik').DataTable({
        responsive: true
        })
        .columns.adjust()
        .responsive.recalc();
    });
</script>
<script>
    $(document).ready(function() {

    var table = $('#kegiatan-ppa').DataTable({
        responsive: true
        })
        .columns.adjust()
        .responsive.recalc();
    });
</script>
<script>
    $(document).ready(function() {

    var table = $('#kegiatan').DataTable({
        responsive: true
        })
        .columns.adjust()
        .responsive.recalc();
    });
</script>
@endsection
