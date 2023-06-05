@extends('layout-anak')

@section('title', 'Create Kegiatan | Dashboard Anak Asuh')
@section('content')
<div>
    <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
        <h1 class="text-2xl font-semibold">Buat Laporan Kegiatan</h1>
        <p>Tambahkan data laporan baru</p>
        <form action="{{ route('child.store-kegiatan') }}" method="POST" class="container bg-white w-full grid grid-cols-2 gap-8 mt-10"  enctype="multipart/form-data">
            @csrf
            <div>
                <h1 class="pb-4">Sholat 5 waktu</h1>
                <div class=" relative pb-4">
                    <input type="text" name="five_time_pray" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ old('five_time_pray') }}>
                    @error('five_time_pray')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Sholat di Masjid</h1>
                <div class=" relative pb-4">
                    <input type="text" name="pray_in_mosque" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ old('pray_in_mosque') }}>
                    @error('pray_in_mosque')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Sholat Tepat Waktu</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="pray_ontime" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="pray_ontime"/>
                    @error('pray_ontime')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Sholat Sunah Rawatib</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="pray_rawatib" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="pray_rawatib"/>
                    @error('pray_rawatib')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Sholat Subah Tahiyatul Masjid</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="pray_tahiyatul" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="pray_tahiyatul"/>
                    @error('pray_tahiyatul')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Sholat Sunah Tahajud</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="pray_tahajud" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="pray_tahajud"/>
                    @error('pray_tahajud')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Sholat Sunah Dhuha</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="pray_dhuha" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="pray_dhuha"/>
                    @error('pray_dhuha')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Sholat Sunah Fajar</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="pray_fajr" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="pray_fajr"/>
                    @error('pray_fajr')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Sholat Sunah Hajad</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="pray_hajad" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="pray_hajad"/>
                    @error('pray_hajad')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Membaca Al - Quran</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="read_quran" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="read_quran"/>
                    @error('read_quran')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="">
                <h1 class="pb-4">Menghafal Al - Quran</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="memorize_quran" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="memorize_quran"/>
                    @error('memorize_quran')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Total Hafalan</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="amount_memorize_quran" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="amount_memorize_quran"/>
                    @error('amount_memorize_quran')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Puasa Sunah</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="fast_sunnah" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="fast_sunnah"/>
                    @error('fast_sunnah')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Infaq / Sedekah</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="infaq_sedekah" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="infaq_sedekah"/>
                    @error('infaq_sedekah')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Membantu Orang Tua</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="help_parent" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="help_parent"/>
                    @error('help_parent')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Belajar Mandiri</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="self_study" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="self_study"/>
                    @error('self_study')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Belajar Berlekompok</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="team_study" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="team_study"/>
                    @error('team_study')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Membantu Teman</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="help_friend" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="help_friend"/>
                    @error('help_friend')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Mengaji Dengan Ustadz</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="pray_quran_with_ustadz" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="pray_quran_with_ustadz"/>
                    @error('pray_quran_with_ustadz')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
                <h1 class="pb-4">Keterangan</h1>
                <div class=" relative pb-4">
                    <input type="text" id="user-info-email" name="description" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="description"/>
                    @error('description')
                    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="py-3 w-24 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-4">
                Submit
            </button>
        </form>
    </section>
</div>
@endsection