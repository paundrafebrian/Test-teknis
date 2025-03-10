<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Pegawai') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nip" class="block font-medium text-white">NIP</label>
                            <input type="text" name="nip" value="{{ old('nip', $pegawai->nip) }}" required
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label for="nama" class="block font-medium text-white">Nama</label>
                            <input type="text" name="nama" value="{{ old('nama', $pegawai->nama) }}" required
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label for="tempat_lahir" class="block font-medium text-white">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $pegawai->tempat_lahir) }}"
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block font-medium text-white">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $pegawai->tanggal_lahir) }}"
                                class="w-full border p-2 rounded">
                        </div>
                        <div class="col-span-2">
                            <label for="alamat" class="block font-medium text-white">Alamat</label>
                            <textarea name="alamat"
                                class="w-full border p-2 rounded">{{ old('alamat', $pegawai->alamat) }}</textarea>
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="block font-medium text-white">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full border p-2 rounded">
                                <option value="L" {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'L' ? 'selected' :
                                    ''
                                    }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'P' ? 'selected' :
                                    ''
                                    }}>Perempuan</option>
                            </select>

                        </div>
                        <div>
                            <label for="golongan" class="block font-medium text-white">Golongan</label>
                            <input type="text" name="golongan" value="{{ old('golongan', $pegawai->golongan) }}"
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label for="eselon" class="block font-medium text-white">Eselon</label>
                            <input type="text" name="eselon" value="{{ old('eselon', $pegawai->eselon) }}"
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label for="jabatan" class="block font-medium text-white">Jabatan</label>
                            <input type="text" name="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}"
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label for="tempat_tugas" class="block font-medium text-white">Tempat Tugas</label>
                            <input type="text" name="tempat_tugas"
                                value="{{ old('tempat_tugas', $pegawai->tempat_tugas) }}"
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label for="agama" class="block font-medium text-white">Agama</label>
                            <select name="agama" class="w-full border p-2 rounded">
                                <option value="Islam" {{ old('agama', $pegawai->agama) == 'Islam' ? 'selected' : ''
                                    }}>Islam
                                </option>
                                <option value="Kristen" {{ old('agama', $pegawai->agama) == 'Kristen' ? 'selected' : ''
                                    }}>Kristen</option>
                                <option value="Katolik" {{ old('agama', $pegawai->agama) == 'Katolik' ? 'selected' : ''
                                    }}>Katolik</option>
                                <option value="Hindu" {{ old('agama', $pegawai->agama) == 'Hindu' ? 'selected' : ''
                                    }}>Hindu
                                </option>
                                <option value="Buddha" {{ old('agama', $pegawai->agama) == 'Buddha' ? 'selected' : ''
                                    }}>Buddha
                                </option>
                                <option value="Konghucu" {{ old('agama', $pegawai->agama) == 'Konghucu' ? 'selected' :
                                    ''
                                    }}>Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label for="unit_kerja" class="block font-medium text-white">Unit Kerja</label>
                            <input type="text" name="unit_kerja" value="{{ old('unit_kerja', $pegawai->unit_kerja) }}"
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label for="no_hp" class="block font-medium text-white">No HP</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp', $pegawai->no_hp) }}"
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label for="npwp" class="block font-medium text-white">NPWP</label>
                            <input type="text" name="npwp" value="{{ old('npwp', $pegawai->npwp) }}"
                                class="w-full border p-2 rounded">
                        </div>
                        <div class="col-span-2">
                            <label for="foto" class="block font-medium text-white">Foto</label>
                            <input type="file" name="foto" class="w-full border p-2 rounded">
                            @if($pegawai->foto)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="Foto Pegawai"
                                    class="img-fluid w-25 rounded">

                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-between mt-4">
                        <!-- Tombol Batal -->
                        <a href="{{ route('pegawai.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                            Batal
                        </a>

                        <!-- Tombol Simpan -->
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
