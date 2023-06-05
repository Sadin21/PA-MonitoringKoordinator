@extends('layout-koordinator')

@section('title', 'Update Kegiatan | Dashboard Koordinator')
@section('content')
<section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
    <h1 class="text-2xl font-semibold">Laporan Kegiatan Anak Asuh Reguler</h1>
    <p>Perbarui data</p>
</section>
<section class="grid grid-cols-5 gap-8 mt-10">
    <div class="border-2 bg-white p-4 h-72">
        <img src="{{ asset($data->first()->photo) }}" alt="" class="w-full h-52">
        <div class="text-center mt-6">
            <h1>{{ $data->first()->child_name }}</h1>
        </div>
    </div>
    <div class="col-span-4">
        <div class="border-2 bg-white p-4 grid grid-cols-2">
            <div>
                <table class="table p-4 bg-white w-full">
                    <tbody>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Sholat 5 Waktu
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->five_time_pray }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Sholat Tepat Waktu
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->pray_ontime }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Sholat Sunnah Tahiyatul Masjid
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->pray_tahiyatul }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Sholat Sunnah Tahajud
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->pray_tahajud }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Sholat Sunnah Dhuha
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->pray_dhuha }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Sholat Sunnah Fajar
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->pray_fajr }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Sholat Sunnah Hajad
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->pray_hajad }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Membaca Al - Quran
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->read_quran }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Menghafal Al - Quran
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->memorize_quran }}
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
                                Total Hafalan
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->amount_memorze_quran }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Puasa Sunnah
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->fast_sunnah }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Infaq / Sedekah
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->infaq_sedekah }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Membantu Orang Tua
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->help_parent }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Belajar Mandiri
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->self_study }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Belajar Kelompok
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->team_study }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Membantu Teman
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->help_friend }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Mengaji Bersama Ustadz
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->pray_quran_with_ustadz }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Deskripsi
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="border-2 bg-white p-4 mt-8">
            <form action="{{ route('koordinator.update-kegiatan', $data->first()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h1 class="pb-4">Status</h1>
                        <div class=" relative pb-4">
                            <select
                            class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="status">
                                <option value="Pengajuan" {{ $data->first()->status == 'Pengajuan' ? 'selected' : '' }}>Pengajuan</option>
                                <option value="Diterima Koordinator" {{ $data->first()->status == 'Diterima Koordinator' ? 'selected' : '' }}>Diterima Koordinator</option>
                                <option value="Perlu Revisi" {{ $data->first()->status == 'Perlu Revisi' ? 'selected' : '' }}>Perlu Revisi</option>
                            </select>
                            @error('status')
                            <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                                <p>
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                      <button type="submit" class="py-2 w-24 mt-10 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                          Submit
                      </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection