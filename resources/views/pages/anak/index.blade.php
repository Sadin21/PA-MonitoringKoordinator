@extends('layout-anak')

@section('title', 'Dashboard Anak Asuh')
@section('content')
  @if (Auth()->user()->children == null)
  <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
    <h1 class="text-2xl font-semibold">Data Anda Kosong</h1>
    <p>Lengkapi akun dan data dirimu</p>
    <a  href="{{ route('child.about') }}" type="button" class="py-2 w-40 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
        Profil
    </a>
  </section>
  @else
  <section class="grid grid-cols-2 gap-8">
      <div class="py-4 px-8 w-full bg-white shadow-md rounded-md">
        <h1 class="font-medium text-xl">Laporan Terima Uang</h1>
        <p>Upload bukti notamu</p>
        <a type="submit" class="py-2 w-24 mt-10 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
          Submit
          </a>
      </div>
      <div class="py-4 px-8 w-full bg-white shadow-md rounded-md">
        <h1 class="font-medium text-xl">Laporan Tugas Mingguan</h1>
        <p>Upload tugasmu</p>
        <button type="submit" class="py-2 w-24 mt-10 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
          Submit
        </button>
      </div>
      <div class="py-4 px-8 w-full bg-white shadow-md rounded-md">
          <h1 class="font-medium text-xl">Laporan Tugas Mingguan</h1>
          <p>Upload tugasmu</p>
          <button type="submit" class="py-2 w-24 mt-10 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
            Submit
          </button>
        </div>
    </section>
  @endif  
@endsection