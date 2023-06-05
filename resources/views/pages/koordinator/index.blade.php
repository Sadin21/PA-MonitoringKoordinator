@extends('layout-koordinator')

@section('title', 'Dashboard Koordinator')
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
    <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
        <h1 class="text-2xl font-semibold">Selamat Datang, {{ Auth()->user()->name }}</h1>
        <p>Buat pengajuan dan kelola anak asuhmu</p>
        <a  href="{{ route('koordinator.pengajuan') }}" type="button" class="py-2 px-4 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
            Riwayat Pengajuan
        </a>
    </section>
    <section class="pt-10 grid grid-cols-3 gap-8">
        @forelse ($dataChildren as $d)
        <div>
            <div class="py-4 px-8 bg-white border-2 shadow-sm rounded-md">
            <div class="flex flex-row items-center gap-4">
                <img src="{{ url("$d->photo") }}" class="rounded-full w-20 h-20"/>
                <div class="flex flex-col justify-center w-full h-28">
                    <div>
                        <p class="text-xl font-semibold text-gray-800">
                            {{ $d->name  }}
                        </p>
                        <p class="text-xs text-gray-800">
                            {{ $d->status_in_family  }}
                        </p>
                    </div>
                    {{-- <div class="w-full bg-blue-100 rounded-lg dark:bg-white">
                        <div class="flex items-center justify-between text-xs text-gray-400">
                            <p class="flex flex-col">
                                Sekolah
                                <span class="font-bold text-black">
                                    {{ $d->school   }}
                                </span>
                            </p>
                            <p class="flex flex-col">
                                Wali
                                <span class="font-bold text-black">
                                    {{ $d->parent_name   }}
                                </span>
                            </p>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="flex items-center justify-between gap-4 mt-6">
                <a href="{{ route('koordinator.detail-index', $d->id) }}" type="button" class="w-1/2 px-4 py-2 text-base bg-white border text-center rounded-lg text-grey-500 hover:bg-[#EC994B]">
                    Detail
                </a>
                <button type="button" class="w-1/2 px-4 py-2 text-base text-white bg-[#006934] border rounded-lg ">
                    Chat
                </button>
            </div>
            </div>
        </div>
        @empty
            <h1>data kosong</h1>
        @endforelse
    </section>
@endif
  
@endsection
{{-- <div>
            <div class="p-4 bg-white shadow-sm rounded-md h-56">
                <div class="grid grid-cols-5 items-start gap-4">
                    <img src="{{ url("$d->photo") }}" class="rounded-full w-28 h-28"/>
                    <div class="flex flex-col justify-between w-full h-28 col-span-3">
                        <div>
                            <p class="text-xl font-medium text-gray-800">
                                {{ $d->name  }}
                            </p>
                            <p class="text-xs text-gray-400">
                                {{ $d->regis_status  }}
                            </p>
                        </div>
                        <div class="w-full p-2 bg-blue-100 rounded-lg dark:bg-white">
                            <div class="flex items-center justify-between text-xs text-gray-400 dark:text-black">
                                <p class="flex flex-col">
                                    Sekolah
                                    <span class="font-bold text-black">
                                        {{ $d->school   }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-4 mt-6">
                        <a href="" type="button" class="w-1/2 px-4 py-2 text-base bg-white border rounded-lg text-grey-500 hover:bg-gray-200 ">
                            Detail
                        </a>
                        <button type="button" class="w-1/2 px-4 py-2 text-base text-white bg-indigo-500 border rounded-lg hover:bg-indigo-700 ">
                            Chat
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}