@extends('layout-anak')

@section('title', 'Data Wali | Dashboard Anak Asuh')
@section('content')
<div>
  <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
      <h1 class="text-2xl font-semibold">Data Wali Terdaftar</h1>
      <p>Perbarui akun dan data dirimu</p>
      <div class="flex gap-4">
        <a  href="{{ route('child.about') }}" type="button" class="py-2 w-40 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
          Kembali
      </a>
      </div>
  </section>
  <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md mt-10">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                    Nama
                </th>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                    Pendidikan Terakhir
                </th>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                    Alamat
                </th>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                    Pekerjaan
                </th>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                  Gaji
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
                        <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $d->name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                  <p class="text-gray-900 whitespace-no-wrap">
                      {{ $d->tertiary_education }}
                  </p>
              </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ $d->address }}
                    </p>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p class="text-gray-900 whitespace-no-wrap">
                      {{ $d->job }}
                    </p>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                  <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                    <span aria-hidden="true" class="absolute inset-0 {{ $d->regis_status == 'Aktif' ? 'bg-green-200' : 'bg-yellow-200'}} rounded-full opacity-50">
                    </span>
                    <span class="relative">
                        {{ $d->salary }}
                    </span>
                  </span>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 flex gap-4">
                  <a href="{{ route('child.detail-parent', $d->id) }}" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                      <path strokeLinecap="round" strokeLinejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    
                  </a>
                  {{-- <form onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('child.delete-parent', $d->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="py-2 w-14 px-4 flex justify-center items-center  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>                              
                    </button>
                  </form> --}}
              </td>
            </tr>
          @empty
              <h1>data kosonggg</h1>
          @endforelse
        </tbody>
    </table>
</section>
</div>
@endsection