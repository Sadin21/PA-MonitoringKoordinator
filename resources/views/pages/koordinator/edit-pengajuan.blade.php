@extends('layout-koordinator')

@section('title', 'About | Dashboard Koordinator')
@section('content')
<section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
    <h1 class="text-2xl font-semibold">Data Diri Anak Asuh</h1>
    <p>Perbarui akun dan data dirimu</p>
    {{-- <div class="flex gap-4">
        <a  href="{{ route('child.create-parent') }}" type="button" class="py-2 w-40 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
            Create Wali
        </a>
        <a  href="{{ route('child.create-child') }}" type="button" class="py-2 w-40 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
            Create Data Diri
        </a>
    </div> --}}
</section>
<section class="w-full bg-white border-2 shadow-sm p-10 rounded-md mt-10">
  <form class="mt-10" action="{{ route('koordinator.update-pengajuan', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 gap-8">
        <div>
            <h1 class="pb-4">Nama</h1>
            <div class=" relative pb-4">
                <input type="text" name="name" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ old('name', $data->name) }}>
                @error('name')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
        </div>
        <div class="">
          <button type="submit" class="py-2 w-24 mt-10 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
              Submit
          </button>
        </div>
    </div>
</form>
</section>
@endsection