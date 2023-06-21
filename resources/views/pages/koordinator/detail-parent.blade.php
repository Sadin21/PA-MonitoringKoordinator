@extends('layout-koordinator')

@section('title', 'Data Wali | Dashboard Koordinator')
@section('content')
<div>
  <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
      <h1 class="text-2xl font-semibold">Detail Wali Terdaftar</h1>
      <div class="flex gap-4">
          <a  href="{{ route('koordinator.data-wali') }}" type="button" class="py-2 w-40 bg-[#006934] text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-10">
              Kembali
          </a>
      </div>
  </section>
  <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md mt-10 grid grid-cols-2">
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
                  Tempat, Tanggal Lahir
              </td>
              <td class="p-4 font-bold">
                  {{$data->first()->birth_place}}, {{$data->first()->birth_date}}
              </td>
            </tr>
            <tr class="text-gray-700">
              <td class="p-4">
                  Status Perkawinan
              </td>
              <td class="p-4 font-bold">
                  {{$data->first()->marital}}
              </td>
            </tr>
            <tr class="text-gray-700">
              <td class="p-4">
                  Pendidikan Terakhir
              </td>
              <td class="p-4 font-bold">
                  {{$data->first()->tertiary_education}}
              </td>
          </tr>
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
                  Pekerjaan
              </td>
              <td class="p-4 font-bold">
                  {{$data->first()->job}}
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
          <tr class="text-gray-700">
            <td class="p-4">
                Gaji
            </td>
            <td class="p-4 font-bold">
                {{$data->first()->salary}}
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
                    Status Rumah
                </td>
                <td class="p-4 font-bold">
                    {{$data->first()->home_status}}
                </td>
            </tr>
            <tr class="text-gray-700">
              <td class="p-4">
                  Jumlah Tanggungan
              </td>
              <td class="p-4 font-bold">
                  {{$data->first()->number_of_souls}}
              </td>
            </tr>
            <tr class="text-gray-700">
              <td class="p-4">
                  Kategori Jiwa
              </td>
              <td class="p-4 font-bold">
                  {{$data->first()->category_of_souls}}
              </td>
            </tr>
            <tr class="text-gray-700">
              <td class="p-4 align-top">
                  File KTP
              </td>
              <td class="p-4 font-bold">
                  <img src="{{ asset($data->first()->file_ktp) }}" class="h-44" alt="">
              </td>
            </tr>
            <tr class="text-gray-700">
              <td class="p-4 align-top">
                  File KK
              </td>
              <td class="p-4 font-bold">
                  <img src="{{ asset($data->first()->file_kk) }}" class="h-44" alt="">
              </td>
            </tr>
        </tbody>
      </table>
    </div>
  </section>
</div>
@endsection