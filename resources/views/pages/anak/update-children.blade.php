@extends('layout-anak')

@section('title', 'Update My Data | Dashboard Anak Asuh')
@section('content')
<div>
    <section class="w-full bg-white border-2 shadow-sm p-10 rounded-md">
        <h1 class="text-2xl font-semibold">Update Data Diri</h1>
        <p>Perbarui data dirimu</p>
        <form class="mt-10" action="{{ route('child.update-child', $data->first()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h1 class="pb-4">Nama</h1>
                    <div class=" relative pb-4">
                        <input type="text" name="name" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ $data->first()->name }}>
                    </div>
                    <h1 class="pb-4">Jenis Kelamin</h1>
                    <div class=" relative pb-4">
                        <select
                        data-te-select-init
                        data-te-select-placeholder="Example placeholder"
                        class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="gender">
                            <option value="Laki - laki" {{ $data->first()->gender == 'Laki - laki' ? 'selected' : "" }}>Laki - laki</option>
                            <option value="Perempuan" {{ $data->first()->gender == 'Perempuan' ? 'selected' : "" }}>Perempuan</option>
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
                        <input type="text" name="birth_place" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Tempat Lahir"  value={{ $data->first()->birth_place }}>
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
                        <input type="date" name="birth_date" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Tanggal Lahir"  value={{ $data->first()->birth_date }}>
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
                            <option value="Yatim" {{ $data->first()->status_in_family == 'Yatim' ? 'selected' : "" }}>Yatim</option>
                            <option value="Dhuafa" {{ $data->first()->status_in_family == 'Dhuafa' ? 'selected' : "" }}>Dhuafa</option>
                            <option value="Terlantar" {{ $data->first()->status_in_family == 'Terlantar' ? 'selected' : "" }}>Terlantar</option>
                            <option value="Penghafal al Quran" {{ $data->first()->status_in_family == 'Penghafal al Quran' ? 'selected' : "" }}>Penghafal al Quran</option>
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
                            <option value="< TK" {{ $data->first()->grade == '< TK' ? 'selected' : "" }}>< TK</option>
                            <option value="SD" {{ $data->first()->grade == 'SD' ? 'selected' : "" }}>SD</option>
                            <option value="SMP / Sederajat" {{ $data->first()->grade == 'SMP / Sederajat' ? 'selected' : "" }}>SMP / Sederajat</option>
                            <option value="SMA / Sederajat" {{ $data->first()->grade == 'SMA / Sederajat' ? 'selected' : "" }}>SMA / Sederajat</option>
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
                        <input type="text" name="city_address" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="city address" value={{ $data->first()->city_address }}>
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
                        <textarea type="text" rows="6" name="address" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="address">{{ $data->first()->address }}</textarea>
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
                        @foreach ($dataParent as $p)
                            <option value="{{ $p->id }}" {{ $data->first()->parent_id == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
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
                        <input type="text" name="class" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Kelas"  value={{ $data->first()->class }}>
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
                        <input type="text" name="school" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Sekolah"  value={{ $data->first()->school }}>
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
                            <option value="Orang Tua" {{ $data->first()->status_with_parents == 'Orang Tua' ? 'selected' : "" }}>Orang Tua</option>
                            <option value="Kakak" {{ $data->first()->status_with_parents == 'Kakak' ? 'selected' : "" }}>Kakak</option>
                            <option value="Kakek / Nenenk" {{ $data->first()->status_with_parents == 'Kakek / Nenenk' ? 'selected' : "" }}>Kakek / Nenenk</option>
                            <option value="Paman / Bibi" {{ $data->first()->status_with_parents == 'Paman / Bibi' ? 'selected' : "" }}>Paman / Bibi</option>
                            <option value="Orang Tua" {{ $data->first()->status_with_parents == 'Orang Tua' ? 'selected' : "" }}>Orang Tua</option>
                            <option value="Guru Ngaji" {{ $data->first()->status_with_parents == 'Guru Ngaji' ? 'selected' : "" }}>Guru Ngaji</option>
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
                            @foreach ($dataKoor as $k)
                                <option value="{{ $k->id }}" {{ $data->first()->coordinator_id == $k->id ? 'selected' : '' }}>{{ $k->name }}</option>
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