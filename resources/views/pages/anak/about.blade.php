@extends('layout-anak')

@section('title', 'About | Dashboard Anak Asuh')
@section('content')

@if (Auth()->user()->children == null)
<div class="grid grid-cols-2 gap-8">
  <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
      <h1 class="text-2xl font-semibold">Periksa Data Wali</h1>
      <p>Cek data wali atau buat data baru</p>
      <div class="flex gap-4">
          <a  href="{{ route('child.create-parent') }}" type="button" class="py-2 w-40 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
              Create Wali
          </a>
          @if (Auth()->user()->children == null)
            <a  href="{{ route('child.show-parent') }}" type="button" class="py-2 w-40 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
                Data Wali
            </a>
          @endif
      </div>
  </section>
  <div>
    <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
        <h1 class="text-2xl font-semibold">lengkapi Data Pengajuan Dirimu</h1>
        <p>Perbarui akun dan data dirimu</p>
        <div class="flex gap-4">
            @if (Auth()->user()->children == null)
              <a  href="{{ route('child.create-child') }}" type="button" class="py-2 w-40 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
                  Create Data Diri
              </a>
            @endif
        </div>
    </section>
</div>
@else
<div class="grid grid-cols-5 gap-8">
  <div>
    <div class="border-2 bg-white p-4">
        <img src="{{ asset($data->first()->photo) }}" alt="" class="w-full h-52">
        <div class="text-center mt-4">
          @if ($data->first()->regis_status != 'Diterima')
            <h1>Status Pengajuan</h1>
            <span class="relative inline-block px-3 py-1 font-semibold mt-2">
              @if ($data->first()->regis_status == 'Pengajuan' || $data->first()->regis_status == 'Diterima Koordinator') 
                <span aria-hidden="true" class="absolute inset-0 bg-yellow-600 rounded-full ">
                </span>
                <span class="relative">
                    {{ $data->first()->regis_status }}
                </span>
              @elseif ($data->first()->regis_status == 'Perlu Revisi')
                <span aria-hidden="true" class="absolute inset-0 bg-red-600 rounded-full ">
                </span>
                <span class="relative">
                    {{ $data->first()->regis_status }}
                </span>
                @endif
            </span>
            @else
            <h1>Aktif sejak</h1>
            <p class="font-bold">
                {{ $data->first()->updated_at->format('d M Y') }}
            </p>
            @endif
            <a href="{{ route('child.edit-child', $data->first()->id) }}" type="submit" class="py-2 w-24 mt-4 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                Update
            </a>
        </div>
    </div>
    @if ($data->first()->regis_status != 'Diterima')
        <div class="border-2 bg-white p-4 mt-8">
            <div class="text-center mt-4">
                <h1 clas="font-bold">Catatan</h1>
                <div class=" relative pb-4 mt-4">
                    <textarea type="text" id="user-info-email" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" rows="4" />{{ $data->first()->note_status }}</textarea>
                </div>
            </div>
        </div>
    @endif
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
                              {{ $data->first()->name }}
                          </td>
                      </tr>
                      <tr class="text-gray-700">
                          <td class="p-4">
                              Status
                          </td>
                          <td class="p-4 font-bold">
                              {{ $data->first()->status_in_family }}
                          </td>
                      </tr>
                      <tr class="text-gray-700">
                          <td class="p-4">
                              Jenis Kelamin
                          </td>
                          <td class="p-4 font-bold">
                              {{ $data->first()->gender }}
                          </td>
                      </tr>
                      <tr class="text-gray-700">
                          <td class="p-4">
                              Tempat, Tanggal Lahir
                          </td>
                          <td class="p-4 font-bold">
                              {{ $data->first()->birth_place }}, {{ $data->first()->birth_date }}
                          </td>
                      </tr>
                      <tr class="text-gray-700">
                        <td class="p-4">
                            Alamat
                        </td>
                        <td class="p-4 font-bold">
                            {{ $data->first()->address }}, {{ $data->first()->city_address }}
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
                              Nama Wali
                          </td>
                          <td class="p-4 font-bold">
                              {{ $data->first()->parent_name }}
                          </td>
                      </tr>
                      <tr class="text-gray-700">
                        <td class="p-4">
                            Nama Koordinator
                        </td>
                        <td class="p-4 font-bold">
                            {{ $data->first()->koor_name }}
                        </td>
                    </tr>
                      <tr class="text-gray-700">
                          <td class="p-4">
                              Sekolah
                          </td>
                          <td class="p-4 font-bold">
                              {{ $data->first()->school }}
                          </td>
                      </tr>
                      <tr class="text-gray-700">
                          <td class="p-4">
                              Kelas
                          </td>
                          <td class="p-4 font-bold">
                              {{ $data->first()->class }} {{ $data->first()->grade }}
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
      <div class="border-2 bg-white p-4 grid grid-cols-2 mt-8">
          <table class="table py-4 bg-white w-full">
              <tbody>
                  <tr class="text-gray-700 mb-4 flex items-start justify-between">
                      <td class="p-4">
                          File Raport
                      </td>
                      <td class="p-4 font-bold">
                          <img src="{{ asset($data->first()->file_raport) }}" alt="" class="w-72 h-44">
                      </td>
                  </tr>
                  <tr class="text-gray-700 mb-4 flex items-start justify-between">
                      <td class="p-4">
                          File SKTM
                      </td>
                      <td class="p-4 font-bold">
                          <img src="{{ asset($data->first()->file_sktm) }}" alt="" class="w-72 h-44">
                      </td>
                  </tr>
              </tbody>
          </table>
          <table class="table py-4 bg-white w-full">
              <tbody>
                  <tr class="text-gray-700 mb-4 flex items-start justify-between">
                      <td class="p-4">
                          Foto Depan Rumah
                      </td>
                      <td class="p-4 font-bold">
                          <img src="{{ asset($data->first()->photo_front_home) }}" alt="" class="w-72 h-44">
                      </td>
                  </tr>
                  <tr class="text-gray-700 mb-4 flex items-start justify-between">
                      <td class="p-4">
                          Foto Ruang Tamu
                      </td>
                      <td class="p-4 font-bold">
                          <img src="{{ asset($data->first()->photo_sitting_room) }}" alt="" class="w-72 h-44">
                      </td>
                  </tr>
                  <tr class="text-gray-700 mb-4 flex items-start justify-between">
                      <td class="p-4">
                          Foto Dapur
                      </td>
                      <td class="p-4 font-bold">
                          <img src="{{ asset($data->first()->photo_kitchen) }}" alt="" class="w-72 h-44">
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</div>
{{-- <div>
  <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
      <h1 class="text-2xl font-semibold">Informasi Akun</h1>
      <p>Perbarui akun dan data dirimu</p>
      <div class="flex gap-4">
          <a  href="{{ route('child.create-parent') }}" type="button" class="py-2 w-40 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
              Create Wali
          </a>
          @if (Auth()->user()->children == null)
            <a  href="{{ route('child.create-child') }}" type="button" class="py-2 w-40 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
                Create Data Diri
            </a>
          @endif
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
            @forelse ($dataParent as $d)
              <tr>
                  <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                      <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="#" class="relative block">
                                <img src="{{ url("/assets/images/{$d->photo}") }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                            </a>
                        </div>
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
                    <a href="{{ route('child.edit-parent', $d->id) }}" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                      </svg>
                    </a>
                    <form onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('child.delete-parent', $d->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="py-2 w-14 px-4 flex justify-center items-center  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                          <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>                              
                      </button>
                    </form>
                </td>
              </tr>
            @empty
                <h1>data kosonggg</h1>
            @endforelse
          </tbody>
      </table>
  </section>
  <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md mt-10">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                    Nama
                </th>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                    Nama Orang Tua
                </th>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                    Status
                </th>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200 w-20">
                    Aksi
              </th>
            </tr>
        </thead>
        <tbody>
          @forelse ($me as $m)
            <tr>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <div class="flex items-center">
                      <div class="flex-shrink-0">
                          <a href="#" class="relative block">
                              <img src="{{ url("{$m->photo}") }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                          </a>
                      </div>
                        <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $m->name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                  <p class="text-gray-900 whitespace-no-wrap">
                      {{ $m->parent_name }}
                  </p>
              </td>
              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                  <span aria-hidden="true" class="absolute inset-0 {{ $m->regis_status == 'Aktif' ? 'bg-green-200' : 'bg-yellow-200'}} rounded-full opacity-50">
                  </span>
                  <span class="relative">
                      {{ $m->regis_status }}
                  </span>
                </span>
              </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 flex gap-4">
                  <a href="{{ route('child.edit-child', $m->id) }}" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                  </a>
                  <form onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('child.delete-child', $m->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="py-2 w-14 px-4 flex justify-center items-center  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>                              
                    </button>
                  </form>
              </td>
            </tr>
          @empty
              <h1>data kosonggg</h1>
          @endforelse
        </tbody>
    </table>
</section>
</div> --}}
@endif

@endsection