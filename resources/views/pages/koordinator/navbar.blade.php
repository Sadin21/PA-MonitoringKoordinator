<div>
    <nav class="bg-white md:py-4 md:px-32 md:border-b-1">
        <div class="mx-auto max-w-7xl">
            <div class="flex items-center justify-between h-16">
                <div class=" flex items-center md:w-full">
                    <div class="hidden md:flex md:w-full md:justify-between md:items-center">
                        <img src="{{ asset('images/logo.png' ) }}" alt="" class="h-12 w-12 rounded-md">
                        <div class="flex items-baseline ml-10 space-x-4">
                            <a href="{{ route('koordinator.index') }}" class="{{ request()->routeIs('koordinator.index') ? 'font-bold text-[#006934]' : 'font-normal' }} text-gray-800 px-3 py-2 rounded-md text-sm hover:text-[#006934] hover:font-bold">
                                Anak Asuh
                            </a>
                            <a href="{{ route('koordinator.pengajuan') }}" class="{{ request()->routeIs('koordinator.pengajuan') ? 'font-bold text-[#006934]' : 'font-normal' }} text-gray-800 px-3 py-2 rounded-md text-sm hover:text-[#006934] hover:font-bold">
                                Pengajuan Anak Asuh
                            </a>
                            <a href="{{ route('koordinator.beasiswa') }}" class="{{ request()->routeIs('koordinator.beasiswa') ? 'font-bold text-[#006934]' : 'font-normal' }} text-gray-800  px-3 py-2 rounded-md text-sm hover:text-[#006934] hover:font-bold">
                                Laporan Beasiswa
                            </a>
                            <a href="{{ route('koordinator.akademik') }}" class="{{ request()->routeIs('koordinator.akademik') ? 'font-bold text-[#006934]' : 'font-normal' }} text-gray-800  px-3 py-2 rounded-md text-sm hover:text-[#006934] hover:font-bold">
                                Laporan Akademik
                            </a>
                            <a href="{{ route('koordinator.kegiatan') }}" class="{{ request()->routeIs('koordinator.kegiatan') ? 'font-bold text-[#006934]' : 'font-normal' }} text-gray-800  px-3 py-2 rounded-md text-sm hover:text-[#006934] hover:font-bold">
                                Laporan Kegiatan Regular
                            </a>
                            <a href="{{ route('koordinator.kegiatan-ppa') }}" class="{{ request()->routeIs('koordinator.kegiatan-ppa') ? 'font-bold text-[#006934]' : 'font-normal' }} text-gray-800  px-3 py-2 rounded-md text-sm hover:text-[#006934] hover:font-bold">
                                Laporan Kegiatan PPA
                            </a>
                        </div>
                        <div class="relative inline-block text-left">
                            <div>
                                <button type="button" id="about" class="  flex items-center justify-center w-full rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50" id="options-menu">
                                    <img src="{{ asset(Auth()->user()->coordinator ? Auth()->user()->coordinator->photo : 'images/images 1.png' ) }}" alt="" class="h-12 w-12 rounded-md">
                                </button>
                            </div>
                            <div id="about-menu" class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5" style="display: none">
                                <div class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    <a href="{{ route('koordinator.about') }}" type="button" class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                        <span class="flex flex-col">
                                            <span>
                                                Profil
                                            </span>
                                        </span>
                                    </a>
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-md text-gray-700 hover:bg-[#006934] hover:text-white" role="menuitem">
                                        <span class="flex flex-col">
                                            <span>
                                                Logout
                                            </span>
                                        </span>
                                    </a>
                                </div>
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
  {{-- <section class="bg-white px-44 w-full py-5 shadow-md flex items-center gap-4">
    <img src="{{ asset('images/logo.png' ) }}" alt="" class="h-12 w-12 rounded-md">
    <h1 class="font-semibold text-2xl">Dashboard Koordinator</h1>
  </section> --}}