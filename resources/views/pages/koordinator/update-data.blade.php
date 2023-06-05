@extends('layout-koordinator')

@section('title', 'Create Data | Dashboard Koordinator')
@section('content')
    <div>
        <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md mt-10">
            <h1 class="text-2xl font-semibold">Update Data Diri</h1>
            <p>Perbarui akun dan data dirimu</p>
            <form class="mt-10" action="{{ route('koordinator.update-data', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <div class="mb-4 relative ">
                            <label for="" class="">Nama</label>
                            <input type="text" id="contact-form-name" name="name" class=" rounded-lg border-2 flex-1 appearance-none border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-transparent" placeholder="name" value="{{ $data->name }}"/>
                        </div>
                        <div class="mb-4 relative flex flex-col">
                            <label for="" class="">Alamat</label>
                            <textarea type="text" rows="4" cols="54" class="form-control border-2 rounded-lg border-gray-300 bg-white text-gray-700 p-4" name="address">{{ $data->address }}</textarea>
                        </div>
                    </div>
                    <div>
                        <div class="mb-8 relative ">
                            <label for="" class="">Nomor Telepon</label>
                            <input type="text" id="contact-form-name" name="phone" class=" rounded-lg border-2 flex-1 appearance-none border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-transparent" placeholder="phone" value="{{ $data->phone }}"/>
                        </div>
                        <div class="mb-4 relative ">
                            <label for="" class="">Foto Profil</label>
                            <input type="file" id="contact-form-name" name="photo" class=" rounded-lg border-2 flex-1 appearance-none border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-transparent" placeholder="photo"/>
                        </div>
                    </div>
                </div>
                <button type="submit" class="w-2/5 text-white bg-[#006934] font-medium rounded-lg text-md px-5 py-3 text-center mr-2 my-4">Update</button>
            </form>
        </section>
    </div>
@endsection