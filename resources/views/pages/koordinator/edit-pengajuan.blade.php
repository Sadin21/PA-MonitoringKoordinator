@extends('layout-koordinator')

@section('title', 'About | Dashboard Koordinator')
@section('content')
<section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
    <h1 class="text-2xl font-semibold">Data Diri Anak Asuh</h1>
    <p>Perbarui akun dan data dirimu</p>
</section>
<section class="grid grid-cols-5 gap-8 mt-10">
    <div class="border-2 bg-white p-4 h-96">
        <img src="{{ asset($data->first()->photo) }}" alt="" class="w-full h-52">
        <div class="text-center mt-6">
            <h1>Status Pendaftaran</h1>
            <span class="relative inline-block px-3 py-1 font-semibold mt-4">
                @if ($data->first()->regis_status == 'Pengajuan' || $data->first()->regis_status == 'Diterima Koordinator') 
                  <span aria-hidden="true" class="absolute inset-0 bg-yellow-600 rounded-full ">
                  </span>
                  <span class="relative">
                      {{ $data->first()->regis_status }}
                  </span>
                @elseif($data->first()->regis_status == 'Diterima')
                  <span aria-hidden="true" class="absolute inset-0 bg-green-600 rounded-full ">
                  </span>
                  <span class="relative">
                      {{ $data->first()->regis_status }}
                  </span>
                @elseif ($data->first()->regis_status == 'Perlu Revisi')
                  <span aria-hidden="true" class="absolute inset-0 bg-red-600 rounded-full ">
                  </span>
                  <span class="relative">
                      {{ $data->first()->regis_status }}
                  </span>
                @endif
              </span>
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
                                {{ $data->first()->birth_date }}, {{ $data->first()->birth_date }}
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
            <form class="mt-10" action="{{ route('koordinator.update-pengajuan', $data->first()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if ($data->first()->regis_status == 'Diterima')
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h1 class="pb-4">Status</h1>
                        <div class=" relative pb-4"> 
                            <select
                            class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="regis_status">
                                <option value="Diterima" {{ $data->first()->regis_status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                            </select>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h1 class="pb-4">Keterangan</h1>
                            <div class="relative pb-4">
                                <textarea id="user-info-email" name="note_status" class="rounded-lg border-1 flex-1 appearance-none w-full border border-gray-300 py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="note_status" rows="4">{{ $data->first()->note_status }}</textarea>
                            </div>                            
                        </div>
                        <div>
                            <h1 class="pb-4">Status</h1>
                            <div class=" relative pb-4"> 
                                <select
                                class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="regis_status">
                                    <option value="Pengajuan" {{ $data->first()->regis_status == 'Pengajuan' ? 'selected' : '' }}>Pengajuan</option>
                                    <option value="Diterima Koordinator" {{ $data->first()->regis_status == 'Diterima Koordinator' ? 'selected' : '' }}>Diterima Koordinator</option>
                                    <option value="Perlu Revisi" {{ $data->first()->regis_status == 'Perlu Revisi' ? 'selected' : '' }}>Perlu Revisi</option>
                                </select>
                            </div>
                            <div class="">
                                <button type="submit" class="py-2 w-24 mt-4 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                                    Submit
                                </button>
                            </div> 
                        </div>
                    </div>
                @endif
                </form>
        </div>
</section>
{{-- <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md mt-10">
  
</section> --}}
@endsection