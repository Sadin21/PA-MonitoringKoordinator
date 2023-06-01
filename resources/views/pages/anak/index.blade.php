@extends('layout-anak')

@section('title', 'Dashboard Anak Asuh')
@section('content')
<section class="grid grid-cols-2 gap-8">
    <div class="py-4 px-8 w-full bg-white shadow-md rounded-md">
      <h1 class="font-medium text-xl">Laporan Terima Uang</h1>
      <p>Upload bukti notamu</p>
      <a type="submit" class="py-2 w-24 mt-10 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
        Submit
        </a>
    </div>
    <div class="py-4 px-8 w-full bg-white shadow-md rounded-md">
      <h1 class="font-medium text-xl">Laporan Tugas Mingguan</h1>
      <p>Upload tugasmu</p>
      <button type="submit" class="py-2 w-24 mt-10 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
        Submit
      </button>
    </div>
    <div class="py-4 px-8 w-full bg-white shadow-md rounded-md">
        <h1 class="font-medium text-xl">Laporan Tugas Mingguan</h1>
        <p>Upload tugasmu</p>
        <button type="submit" class="py-2 w-24 mt-10 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
          Submit
        </button>
      </div>
  </section>
@endsection