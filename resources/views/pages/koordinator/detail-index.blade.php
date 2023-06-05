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
        <div class="border-2 bg-white p-4 mt-8">
            <h1 class="font-semibold text-2xl">Laporan Beasiswa</h1>
            <table class="min-w-full leading-normal border-2 mt-6">
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
                    </tr>
                </thead>
                <tbody>
                  @forelse ($dataBeasiswa as $b)
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
                          <img src="{{ url("{$b->file}") }}" class="mx-auto object-cover border-4 rounded-sm h-24 w-28 "/>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                          <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                            <span aria-hidden="true" class="absolute inset-0 {{ $b->status == 'Aktif' ? 'bg-green-200' : 'bg-yellow-200'}} rounded-full opacity-50">
                            </span>
                            <span class="relative">
                                {{ $b->status }}
                            </span>
                          </span>
                        </td>
                    </tr>
                  @empty
                      <h1>data kosonggg</h1>
                  @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-2 bg-white p-4 mt-8">
            <h1 class="font-semibold text-2xl">Laporan Akademik</h1>
            <table class="w-full leading-normal mt-6 border-2">
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
                    </tr>
                </thead>
                <tbody>
                  @forelse ($dataAkademik as $a)
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
                            <span aria-hidden="true" class="absolute inset-0 {{ $a->status == 'Aktif' ? 'bg-green-200' : 'bg-yellow-200'}} rounded-full opacity-50">
                            </span>
                            <span class="relative">
                                {{ $a->status }}
                            </span>
                          </span>
                        </td>
                        </tr>
                  @empty
                      <h1>data kosonggg</h1>
                  @endforelse
                </tbody>
            </table>
        </div>
        @if ($data->first()->status_in_family == 'Penghafal al Quran')
            <div class="border-2 bg-white p-4 mt-8">
                <h1 class="font-semibold text-2xl">Laporan Kegiatan (PPA)</h1>
                <table class="w-full leading-normal mt-6 border-2">
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
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($dataKegiatanPPA as $p)
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
                                <span aria-hidden="true" class="absolute inset-0 {{ $p->status == 'Aktif' ? 'bg-green-200' : 'bg-yellow-200'}} rounded-full opacity-50">
                                </span>
                                <span class="relative">
                                    {{ $p->status }}
                                </span>
                            </span>
                            </td>
                        </tr>
                    @empty
                        <h1>data kosonggg</h1>
                    @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <div class="border-2 bg-white p-4 mt-8">
                <h1 class="font-semibold text-2xl">Laporan Kegiatan (Reguler)</h1>
                <table class="w-full leading-normal mt-6 border-2">
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
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($dataKegiatan as $k)
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
                            <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                <span aria-hidden="true" class="absolute inset-0 {{ $k->status == 'Aktif' ? 'bg-green-200' : 'bg-yellow-200'}} rounded-full opacity-50">
                                </span>
                                <span class="relative">
                                    {{ $k->status }}
                                </span>
                            </span>
                            </td>
                        </tr>
                    @empty
                        <h1>data kosonggg</h1>
                    @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
{{-- <div class="w-full grid grid-rows-2 grid-flow-col gap-8">
    <section class="col-span-2 bg-white border-2 shadow-sm p-10 rounded-md grid grid-cols-3">
        <div class="flex flex-col items-start gap-4">
            <img src="{{ asset($data->first()->photo) }}" alt="" class="h-32 w-28 rounded-xl border-2 flex">
        </div>
        <div class="col-span-2 w-2/3 border-2">
            <div>
                <h1 class="text-2xl font-semibold">{{ $data->first()->name }}</h1>
            </div>
            <div class="grid grid-cols-2 mt-6">
                <div class="">
                    <h1>Status</h1>
                    <h1 class="font-semibold">{{ $data->first()->status_in_family }}</h1>
                </div>
                <div class="">
                    <h1>Nama Wali</h1>
                    <h1 class="font-semibold">{{ $data->first()->parent_name }}</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="row-span-2 col-span-2 bg-white border-2 shadow-sm p-10 rounded-md grid grid-cols-2">
        <div class="">
            <h1>Jenis Kelamin</h1>
            <h1 class="font-semibold">{{ $data->first()->gender }}</h1>
        </div>
        <div class="">
            <h1>Tempat, Tanggal Lahir</h1>
            <h1 class="font-semibold">{{ $data->first()->birth_place }}, {{ $data->first()->birth_date }}</h1>
        </div>
        <div class="my-8">
            <h1>Sekolah</h1>
            <h1 class="font-semibold">{{ $data->first()->school }}</h1>
        </div>
        <div class="my-8    ">
            <h1>Alamat</h1>
            <h1 class="font-semibold">{{ $data->first()->address }}, {{ $data->first()->city_address }}</h1>
        </div>
        <div class="">
            <h1>Kelas</h1>
            <h1 class="font-semibold">{{ $data->first()->class }}</h1>
        </div>
        <div class="">
            <h1>Aktif Sejak</h1>
            <h1 class="font-semibold">{{ $data->first()->created_at->format('d M Y') }}</h1>
        </div>
    </section>
    <section class="row-span-3 bg-white border-2 shadow-sm p-10 rounded-md">
        <div class="">
            <h1>File Raport</h1>
            <img src="{{ asset($data ? $data->first()->file_raport : 'images/images 1.png' ) }}" alt="" class="h-40 w-2/3 rounded-md">
        </div>
        <div class="flex justify-between mb-8">
            <h1>File Raport</h1>
            <a href="#" class="font-semibold">Lihat</a>
        </div>
        <div class="flex justify-between mb-8">
            <h1>File Raport</h1>
            <a href="#" class="font-semibold">Lihat</a>
        </div>
    </section>
</div> --}}
@endsection