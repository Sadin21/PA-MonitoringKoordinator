@extends('layout-admin')

@section('title', 'Dashboard Admin')
@section('content')
<section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
    <h1 class="text-2xl font-semibold">Selamat Datang, {{ Auth()->user()->name }}</h1>
    <p>Buat akun koordinator dan kelola data anak asuh</p>
    <div class="flex gap-6">
        <a  href="{{ route('admin.register') }}" type="button" class="py-2 px-4 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
            Registrasi Koordinator
        </a>
        <a  href="{{ route('admin.riwayat-akun') }}" type="button" class="py-2 px-4 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
            Riwayat Akun
        </a>
    </div>
</section>
<div class="border-2 rounded-md p-10 mt-10">
    <h1 class="text-xl font-semibold mb-10">Daftar Koordinator Aktif</h1>
    <section class="grid grid-cols-3 gap-8">
        @forelse ($dataKoor as $k)
        <div>
            <div class="py-4 px-8 bg-white border-2 shadow-sm rounded-md">
            <div class="flex flex-row items-center gap-4">
                <img src="{{ url("$k->photo") }}" class="rounded-full w-20 h-20"/>
                <div class="flex flex-col justify-center w-full h-28">
                    <div>
                        <p class="text-xl font-semibold text-gray-800">
                            {{ $k->name  }}
                        </p>
                        <p class="text-xs text-gray-800">
                            {{ $k->address  }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between gap-4 mt-6">
                <a href="{{ route('admin.detail-koor', $k->id) }}" type="button" class="w-1/2 px-4 py-2 text-base bg-white border text-center rounded-lg text-grey-500 hover:bg-[#EC994B]">
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
</div>
@endsection