@extends('layout-koordinator')

@section('title', 'About | Dashboard Koordinator')
@section('content')

@if (Auth()->user()->coordinator == null) 
    <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
        <h1 class="text-2xl font-semibold">Data Anda Kosong</h1>
        <p>Lengkapi akun dan data dirimu</p>
        <a  href="{{ route('koordinator.create-data') }}" type="button" class="py-2 w-40 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
            Profil
        </a>
    </section>
@else
    <div class="grid grid-cols-5 gap-8">
        <div class="border-2 bg-white p-4 h-60">
            <img src="{{ asset(Auth()->user()->coordinator->photo) }}" alt="" class="w-full h-52">
            <div class="text-center mt-6">
                <p class="font-bold">
                </p>
            </div>
        </div>
        <div class="col-span-4">
            {{-- <div class="border-2 bg-white p-4 grid grid-cols-2">
                <div>
                    <table class="table p-4 bg-white w-full">
                        <tbody>
                            <tr class="text-gray-700">
                                <td class="p-4">
                                    Nama
                                </td>
                                <td class="p-4 font-bold">
                                    {{Auth()->user()->coordinator->name}}
                                </td>
                            </tr>
                            <tr class="text-gray-700">
                                <td class="p-4">
                                    Nomor HP
                                </td>
                                <td class="p-4 font-bold">
                                    {{Auth()->user()->coordinator->phone}}
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
                                    Alamat 
                                </td>
                                <td class="p-4 font-bold">
                                    {{Auth()->user()->coordinator->address}}
                                </td>
                            </tr>
                            <tr class="text-gray-700">
                                <td class="p-4">
                                    Aktif Sejak
                                </td>
                                <td class="p-4 font-bold">
                                    {{Auth()->user()->coordinator->created_at ? Auth()->user()->coordinator->created_at->format('d M Y') : 'Kosong'}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> --}}
            <div>
                <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
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
        </div>
    </div>
@endif

@endsection