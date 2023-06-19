@extends('layout-auth')

@section('title', 'Login | Dashboard')
@section('content')
    <div class="h-screen flex flex-col items-center justify-center text-center">
        <div class=" w-4/5 md:w-1/3">
            <h1 class="hidden md:block text-3xl font-bold text-[#013E1F]">Selamat Datang</h1>
            <p class="hidden md:block mt-3">Aplikasi Monitoring Donasi Untuk Pengurus dan Koordinator <br> di Yayasan Peduli Yatim PENS.</p>
            <div class="bg-white p-6 md:p-12 rounded-xl mt-10 text-start">
                <h1 class="text-2xl font-bold text-[#013E1F] text-center md:text-left mb-10 md:mb-0">login</h1>
                <p class="mt-2 mb-4 hidden md:block">Masukkan email terdaftar</p>
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="mb-4 relative ">
                        <label for="" class="">Email</label>
                        <input type="email" id="contact-form-name" name="email" class=" rounded-lg border-2 flex-1 appearance-none border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-transparent" placeholder="Email"/>
                    </div>
                    <div class="mb-8 relative ">
                        <label for="" class="">Password</label>
                        <input type="password" id="contact-form-name" name="password" class=" rounded-lg border-2 flex-1 appearance-none border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-transparent" placeholder="Password"/>
                    </div>
                    <button type="submit" class="w-full text-white bg-[#EC994B] font-medium rounded-lg text-md px-5 py-3 text-center mr-2 mb-2">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection