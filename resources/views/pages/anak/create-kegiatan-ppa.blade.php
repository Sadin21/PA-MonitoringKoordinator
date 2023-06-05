@extends('layout-anak')

@section('title', 'Create Kegiatan | Dashboard Anak Asuh')
@section('content')
<div>
    <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
        <h1 class="text-2xl font-semibold">Buat Laporan Kegiatan</h1>
        <p>Tambahkan data laporan baru</p>
        <form action="{{ route('child.store-kegiatan-ppa') }}" method="POST" class="container bg-white w-full grid grid-cols-2 gap-8 mt-10"  enctype="multipart/form-data">
            @csrf
            <div>
                <h1 class="pb-4">Nama Surat</h1>
                <div class=" relative pb-4">
                    <input type="text" name="surah_name" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ old('surah_name') }}>
                    @error('surah_name')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Jumlah Ayat</h1>
                <div class=" relative pb-4">
                    <input type="text" name="amount_ayah" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ old('amount_ayah') }}>
                    @error('amount_ayah')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="">
                <h1 class="pb-4">Deskripsi</h1>
                <div class=" relative pb-4">
                    <input type="text" name="description" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ old('description') }}>
                    @error('description')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Link Youtube</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="youtube_link" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="youtube_link"/>
                    @error('youtube_link')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="py-3 w-24 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-4">
                Submit
            </button>
        </form>
    </section>
</div>
@endsection