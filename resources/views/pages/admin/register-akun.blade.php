@extends('layout-admin')

@section('title', 'Pengajuan | Dashboard Admin')
@section('content')
<section class="w-full bg-white border-2 shadow-sm p-10 rounded-md mt-2">
  <h1 class="text-2xl font-semibold">Register Akun Koordinator</h1>
  <p>Buat Akun Koordinator Baru</p>
  <form class="mt-10" action="{{ route('admin.store-register') }}" method="POST" enctype="multipart/form-data">
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
              {{-- <input type="text" id="contact-form-name" name="roles_id" class=" rounded-lg border-2 flex-1 appearance-none border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-800 focus:border-transparent" value="2" placeholder="Koordinator"/> --}}
              <div class=" relative pb-4"> 
                <select
                class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="role_id">
                    <option value="2">Koordinator</option>
                </select>
            </div>
        </div>
          </div>
        </div>
      </div>
      <button type="submit" class="w-2/5 mt-10 text-white bg-[#EC994B] font-medium rounded-lg text-md px-5 py-3 text-center mr-2 my-4">Register</button>
  </form>
</section>
@endsection