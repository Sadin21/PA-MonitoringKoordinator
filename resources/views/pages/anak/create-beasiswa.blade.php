@extends('layout-anak')

@section('title', 'Create Beasiswa | Dashboard Anak Asuh')
@section('content')
<div>
    <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
        <h1 class="text-2xl font-semibold">Buat Laporan Beasiswa</h1>
        <p>Tambahkan data laporan baru</p>
        <form action="{{ route('child.store-beasiswa') }}" method="POST" class="container bg-white w-full grid grid-cols-2 gap-8 mt-10"  enctype="multipart/form-data">
            @csrf
            <div>
                <h1 class="pb-4">Nominal</h1>
                <div class=" relative pb-4">
                    <input type="text" name="nominal" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ old('nominal') }}>
                    @error('nominal')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Tanggal</h1>
                <div class=" relative pb-4">
                    <input type="date" name="date" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ old('date') }}>
                    @error('date')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="">
                <h1 class="pb-4">Bukti / Nota</h1>
                <div class=" relative pb-4">
                    <input type="file" id="user-info-email" name="file" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="pekerjaan"/>
                    @error('file')
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