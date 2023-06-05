@extends('layout-koordinator')

@section('title', 'Pengajuan | Dashboard Koordinator')
@section('content')
<section class="w-full bg-white border-2 shadow-sm p-10 rounded-md mt-2">
  <h1 class="text-2xl font-semibold">Informasi Akun</h1>
  <p>Perbarui akun dan data dirimu</p>
  <form class="mt-10" action="{{ route('koordinator.store-register') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="grid grid-cols-2 gap-8">
          <div>
              <div class="mb-4 relative ">
                  <label for="" class="">Username</label>
                  <input type="text" id="contact-form-name" name="name" class=" rounded-lg border-2 flex-1 appearance-none border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-transparent" placeholder="name"/>
              </div>
              <div class="mb-4 relative ">
                <label for="" class="">Email</label>
                <input type="email" id="contact-form-name" name="email" class=" rounded-lg border-2 flex-1 appearance-none border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-transparent" placeholder="email"/>
            </div>
          </div>
          <div>
            <div class="mb-4 relative ">
                <label for="" class="">Password</label>
                <input type="password" id="contact-form-name" name="password" class=" rounded-lg border-2 flex-1 appearance-none border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-transparent" placeholder="password"/>
            </div>
            <div class="mb-4 relative ">
              <label for="" class="">Role</label>
              <input type="text" id="contact-form-name" class=" rounded-lg border-2 flex-1 appearance-none border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-transparent" value="Children"/>
          </div>
        </div>
      </div>
      <button type="submit" class="w-2/5 mt-10 text-white bg-[#EC994B] font-medium rounded-lg text-md px-5 py-3 text-center mr-2 my-4">Register</button>
  </form>
</section>
@endsection