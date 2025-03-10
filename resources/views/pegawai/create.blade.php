<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Pegawai') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="nip" class="block font-medium text-white">NIP</label>
                            <input type="text" name="nip" required class="w-full border p-2 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block font-medium text-white">Nama</label>
                            <input type="text" name="nama" required class="w-full border p-2 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="tempat_lahir" class="block font-medium text-white">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="w-full border p-2 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_lahir" class="block font-medium text-white">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded">
                        </div>
                        <div class="col-span-2 mb-4">
                            <label for="alamat" class="block font-medium text-white">Alamat</label>
                            <textarea name="alamat" class="w-full border p-2 rounded"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="jenis_kelamin" class="block font-medium text-white">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full border p-2 rounded">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="golongan" class="block font-medium text-white">Golongan</label>
                            <input type="text" name="golongan" class="w-full border p-2 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="eselon" class="block font-medium text-white">Eselon</label>
                            <input type="text" name="eselon" class="w-full border p-2 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="jabatan" class="block font-medium text-white">Jabatan</label>
                            <input type="text" name="jabatan" class="w-full border p-2 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="tempat_tugas" class="block font-medium text-white">Tempat Tugas</label>
                            <input type="text" name="tempat_tugas" class="w-full border p-2 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="agama" class="block font-medium text-white">Agama</label>
                            <select name="agama" class="w-full border p-2 rounded">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="unit_kerja" class="block font-medium text-white">Unit Kerja</label>
                            <input type="text" name="unit_kerja" class="w-full border p-2 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="no_hp" class="block font-medium text-white">No HP</label>
                            <input type="text" name="no_hp" class="w-full border p-2 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="npwp" class="block font-medium text-white">NPWP</label>
                            <input type="text" name="npwp" class="w-full border p-2 rounded">
                        </div>
                        <div class="col-span-2 mb-4">
                            <label for="foto" class="block font-medium text-white">Foto</label>
                            <input type="file" name="foto" class="w-full border p-2 rounded">
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
