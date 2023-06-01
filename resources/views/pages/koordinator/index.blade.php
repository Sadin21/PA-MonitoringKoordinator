@extends('layout-koordinator')

@section('title', 'Dashboard Koordinator')
@section('content')
<section class="pt-14 grid grid-cols-3 gap-8">
    @forelse ($dataChildren as $d)
      <div>
        <div class="p-4 bg-white shadow-lg rounded-2xl">
          <div class="flex flex-row items-start gap-4">
              <img src="{{ url("$d->photo") }}" class="rounded-lg w-28 h-28"/>
              <div class="flex flex-col justify-between w-full h-28">
                  <div>
                      <p class="text-xl font-medium text-gray-800">
                          {{ $d->name  }}
                      </p>
                      <p class="text-xs text-gray-400">
                         {{ $d->regis_status  }}
                      </p>
                      {{-- <p class="text-xs text-gray-400">
                        nama wali {{ $d->parent_name  }}
                     </p> --}}
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
      @empty
          <h1>data kosong</h1>
    @endforelse
  </section>
@endsection