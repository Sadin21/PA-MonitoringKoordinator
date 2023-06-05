@extends('layout-koordinator')

@section('title', 'Update Akademik | Dashboard Koordinator')
@section('content')
<section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
    <h1 class="text-2xl font-semibold">Laporan Akademik Anak Asuh</h1>
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
                                Nilai Tertingi
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->maxScore }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Nilai Terendah
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->minScore }}
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
                                Nilai Rata-Rata
                            </td>
                            <td class="p-4 font-bold">
                                {{ $data->first()->meanScore }}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4 flex">
                                Bukti
                            </td>
                            <td class="p-4 font-bold">
                                <img src="{{ asset($data->first()->file) }}" alt="" class="w-72 h-44 border-2">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="border-2 bg-white p-4 mt-8">
            <form action="{{ route('koordinator.update-akademik', $data->first()->id) }}" method="POST" enctype="multipart/form-data">
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