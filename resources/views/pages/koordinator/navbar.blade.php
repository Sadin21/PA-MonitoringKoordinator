<div>
    <nav class="bg-white md:py-1 md:px-32 md:border-b-1>
        <div class="mx-auto max-w-7xl">
            <div class="flex items-center justify-between h-16">
                <div class=" flex items-center md:w-full">
                    <div class="hidden md:flex md:w-full md:justify-between ">
                        <div class="flex items-baseline ml-10 space-x-4">
                            <a href="{{ route('koordinator.index') }}" class="text-gray-800  px-3 py-2 rounded-md text-sm font-normal">
                                Anak Asuh
                            </a>
                            <a href="{{ route('koordinator.pengajuan') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-normal">
                                Pengajuan
                            </a>
                            <a  class="text-gray-800  px-3 py-2 rounded-md text-sm font-normal">
                                Laporan
                            </a>
                            <a href="{{ route('koordinator.about') }}" class="text-gray-800  px-3 py-2 rounded-md text-sm font-normal">
                                Profil
                            </a>
                        </div>
                        <div class="flex items-end">
                            <div class="gap-4 flex items-center">
                                {{-- <img src="{{ asset(Auth()->user()->coordinator ? Auth()->user()->coordinator->photo : 'images/images 1.png' ) }}" alt="" class="h-12 w-12 rounded-md"> --}}
                                {{-- <h1 class="">{{ Auth()->user()->coordinator ? Auth()->user()->coordinator->name : "kosong"   }}</h1> --}}
                                <a href="{{ route('logout') }}" type="button" class="py-2 w-24 bg-green-600 hover:bg-green-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="flex items-center ml-4 md:ml-6">
                    </div>
                </div>
                <div class="flex -mr-2 md:hidden">
                    <button class="text-gray-800 dark:text-white hover:text-gray-300 inline-flex items-center justify-center p-2 rounded-md focus:outline-none">
                        <svg width="20" height="20" fill="currentColor" class="w-8 h-8" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                    Home
                </a>
                <a class="text-gray-800 dark:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                    Gallery
                </a>
                <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                    Content
                </a>
                <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="/#">
                    Contact
                </a>
            </div>
        </div>
    </nav>
  </div>
  <section class="bg-white px-44 w-full py-5 shadow-md flex items-center gap-4">
    <img src="{{ asset(Auth()->user()->coordinator ? Auth()->user()->coordinator->photo : 'images/images 1.png' ) }}" class="rounded-lg w-12 h-14"/>
    <h1 class="font-semibold text-2xl">{{ auth()->user()->name }}</h1>
  </section>