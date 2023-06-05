@extends('layout-admin')

@section('title', 'Data Koordinator | Dashboard Admin')
@section('content')
<section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
    <h1 class="text-2xl font-semibold">Data Koordinator Aktif</h1>
    {{-- <p>Buat akun koordinator dan kelola data anak asuh</p> --}}
</section>
<div class="grid grid-cols-5 gap-8 mt-10">
    <div class="border-2 bg-white p-4 h-60">
        <img src="{{ asset($data->first()->photo) }}" alt="" class="w-full h-52">
        <div class="text-center mt-6">
            <p class="font-bold">
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
                                {{$data->first()->name}}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Nomor HP
                            </td>
                            <td class="p-4 font-bold">
                                {{$data->first()->phone}}
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
                                {{$data->first()->address}}
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="p-4">
                                Aktif Sejak
                            </td>
                            <td class="p-4 font-bold">
                                {{$data->first()->created_at ? $data->first()->created_at->format('d M Y') : 'Kosong'}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="border-2 rounded-md p-10 mt-8 bg-white">
            <h1 class="text-xl font-semibold mb-10">Daftar Anak Asuh</h1>
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                            Nama Aak Asuh
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                          Status
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                          Sekolah
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200 w-20">
                            Aksi
                      </th>
                    </tr>
                </thead>
                <tbody>
                  @forelse ($data as $d)
                    <tr>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <div class="flex items-center">
                              <div class="flex-shrink-0">
                                  <a href="#" class="relative block">
                                      <img src="{{ url("{$d->child_photo}") }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                  </a>
                              </div>
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $d->child_name }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                          <p class="text-gray-900 whitespace-no-wrap">
                              {{ $d->child_status }}
                          </p>
                      </td>
                      <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $d->child_school }}
                        </p>
                    </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 flex gap-4">
                          <a href="" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                          </a>
                      </td>
                    </tr>
                  @empty
                      <h1>data kosonggg</h1>
                  @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection