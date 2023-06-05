@extends('layout-anak')

@section('title', 'Create My Data | Dashboard Anak Asuh')
@section('content')
<div>
    <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
        <h1 class="text-2xl font-semibold">Buat Data Diri</h1>
        <p>Tambahkan data dirimu</p>
        <form class="mt-10" action="{{ route('child.store-child') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h1 class="pb-4">Nama</h1>
                    <div class=" relative pb-4">
                        <input type="text" name="name" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ old('name') }}>
                        @error('name')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Jenis Kelamin</h1>
                    <div class=" relative pb-4">
                        <select
                        data-te-select-init
                        data-te-select-placeholder="Example placeholder"
                        class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="gender">
                            <option value="">Pilih Kelamin</option>
                            <option value="Laki - laki">Laki - laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('tertiary_education')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Tempat Lahir</h1>
                    <div class=" relative pb-4">
                        <input type="text" name="birth_place" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Tempat Lahir"  value={{ old('birth_place') }}>
                        @error('birth_place')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Tanggal Lahir</h1>
                    <div class=" relative pb-4">
                        <input type="date" name="birth_date" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Tanggal Lahir"  value={{ old('birth_date') }}>
                        @error('birth_date')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Status Anak</h1>
                    <div class=" relative pb-4">
                        <select
                        data-te-select-init
                        data-te-select-placeholder="Example placeholder"
                        class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="status_in_family" value="{{ old('status_in_family') }}">
                            <option value="">Pilih Status</option>
                            <option value="Yatim">Yatim</option>
                            <option value="Dhuafa">Dhuafa</option>
                            <option value="Terlantar">Terlantar</option>
                            <option value="Penghafal al Quran">Penghafal al Quran</option>
                        </select>
                        @error('tertiary_education')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Jenjang Pendidikan</h1>
                    <div class=" relative pb-4">
                        <select
                        data-te-select-init
                        data-te-select-placeholder="Example placeholder"
                        class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="grade">
                            <option value="">Pilih Jenjang</option>
                            <option value="< TK"> < TK</option>
                            <option value="SD">SD</option>
                            <option value="SMP / Sederajat">SMP / Sederajat</option>
                            <option value="SMA / Sederajat">SMA</option>
                        </select>
                        @error('tertiary_education')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Kota</h1>
                    <div class=" relative pb-4">
                        <input type="text" name="city_address" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="city address" value={{ old('city_address') }}>
                        @error('city_address')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Alamat</h1>
                    <div class=" relative pb-4">
                        <textarea type="text" rows="6" name="address" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="address">{{ old('address') }}</textarea>
                        @error('address')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Nama Orang Tua</h1>
                    <div class=" relative pb-4">
                        <select
                        data-te-select-init
                        data-te-select-placeholder="Example placeholder"
                        class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="parent_id">
                            <option value="">Pilih Orang Tua</option>
                            @foreach ($dataParent as $d)
                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                        @error('tertiary_education')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <h1 class="pb-4">Kelas</h1>
                    <div class=" relative pb-4">
                        <input type="text" name="class" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Kelas"  value={{ old('class') }}>
                        @error('class')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Sekolah</h1>
                    <div class=" relative pb-4">
                        <input type="text" name="school" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Sekolah"  value={{ old('school') }}>
                        @error('school')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Hubungan dengan wali</h1>
                    <div class=" relative pb-4">
                        <select
                        data-te-select-init
                        data-te-select-placeholder="Example placeholder"
                        class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="status_with_parents">
                            <option value="">Pilih Wali</option>
                            <option value="Orang Tua"> Orang Tua</option>
                            <option value="Kakak">Kakak</option>
                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                            <option value="Paman / Bibi">Paman / Bibi</option>
                            <option value="Keluarga Lain">Keluarga Lain</option>
                        </select>
                        @error('tertiary_education')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Foto</h1>
                    <div class=" relative pb-4">
                        <input type="file" name="photo" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Foto"  value={{ old('photo') }}>
                        @error('photo')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">File Rapot</h1>
                    <div class=" relative pb-4">
                        <input type="file" name="file_raport" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Foto"  value={{ old('file_raport') }}>
                        @error('file_raport')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">File SKTM</h1>
                    <div class=" relative pb-4">
                        <input type="file" name="file_sktm" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Foto"  value={{ old('file_sktm') }}>
                        @error('file_sktm')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Foto Ruang Tamu</h1>
                    <div class=" relative pb-4">
                        <input type="file" name="photo_sitting_room" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Foto"  value={{ old('photo_sitting_room') }}>
                        @error('photo_sitting_room')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Foto Depan Rumah</h1>
                    <div class=" relative pb-4">
                        <input type="file" name="photo_front_home" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Foto"  value={{ old('photo_front_home') }}>
                        @error('photo_front_home')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Foto Dapur</h1>
                    <div class=" relative pb-4">
                        <input type="file" name="photo_kitchen" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Foto"  value={{ old('photo_kitchen') }}>
                        @error('photo_kitchen')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                    <h1 class="pb-4">Nama Koordinator</h1>
                    <div class=" relative pb-4">
                        <select
                        data-te-select-init
                        data-te-select-placeholder="Example placeholder"
                        class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="coordinator_id">
                            <option value="">Pilih Koordinator</option>
                            @foreach ($dataKoor as $d)
                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                        @error('tertiary_education')
                        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="py-2 w-24 mt-0 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                Submit
            </button>
        </form>
    </section>
    {{-- @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach --}}
</div>
@endsection