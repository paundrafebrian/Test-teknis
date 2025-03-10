<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pegawai') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        .table-container {
            overflow-x: auto;
            /* Aktifkan horizontal scroll */
            max-width: 100%;
            /* Sesuaikan dengan parent container */
            white-space: nowrap;
            /* Hindari pemisahan teks */
        }

        table {
            width: 100%;
            min-width: 1200px;
            /* Atur minimal lebar tabel agar bisa di-scroll */
        }
    </style>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Form Pencarian & Tombol Tambah Pegawai dalam satu baris -->
                <div class="flex justify-between items-center mb-4">
                    <!-- Form Pencarian -->
                    <input type="text" id="search" placeholder="Cari Pegawai..." class="px-4 py-2 border rounded w-1/3"
                        onkeyup="searchPegawai()"> <!-- AJAX Search -->


                    {{-- tombol print --}}
                    <a href="{{ route('pegawai.cetakPDF') }}" class="bg-red-500 text-white px-4 py-2 rounded">
                        <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                    </a>


                    <!-- Tombol Tambah Pegawai -->
                    <a href="{{ route('pegawai.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        + Tambah Pegawai
                    </a>

                </div>

                <div class="table-container">
                    <table class="min-w-full bg-white dark:bg-gray-800 border">
                        <thead>
                            <tr class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Foto</th>
                                <th class="border px-4 py-2">NIP</th>
                                <th class="border px-4 py-2">Nama</th>
                                <th class="border px-4 py-2">Tempat Lahir</th>
                                <th class="border px-4 py-2">Alamat</th>
                                <th class="border px-4 py-2">Tanggal lahir</th>
                                <th class="border px-4 py-2">Jenis Kelamin (L/P)</th>
                                <th class="border px-4 py-2">Golongan</th>
                                <th class="border px-4 py-2">Eselon</th>
                                <th class="border px-4 py-2">Jabatan</th>
                                <th class="border px-4 py-2">Tempat Tugas</th>
                                <th class="border px-4 py-2">Agama</th>
                                <th class="border px-4 py-2">Unit Kerja</th>
                                <th class="border px-4 py-2">No HP</th>
                                <th class="border px-4 py-2">NPWP</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="pegawai-list">
                            @foreach($pegawais as $pegawai)
                            <tr>
                                <td class="border px-4 py-2 text-white">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">
                                    <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="Foto Pegawai"
                                        class="w-12 h-12 rounded-full">
                                </td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->nip }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->nama }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->tempat_lahir }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->alamat }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->tanggal_lahir }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->jenis_kelamin }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->golongan }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->eselon }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->jabatan }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->tempat_tugas }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->agama }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->unit_kerja }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->no_hp }}</td>
                                <td class="border px-4 py-2 text-white">{{ $pegawai->npwp }}</td>
                                <td class="border px-4 py-2 text-white">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('pegawai.edit', $pegawai->id) }}"
                                            class="bg-yellow-500 text-white px-3 py-1 rounded inline-block">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST"
                                            onsubmit="return confirmDelete(event);">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScript AJAX untuk Pencarian -->
    <script>
        function searchPegawai() {
            let query = document.getElementById('search').value;
            fetch("{{ route('pegawai.index') }}?search=" + query)
                .then(response => response.text())
                .then(data => {
                    let parser = new DOMParser();
                    let doc = parser.parseFromString(data, "text/html");
                    document.getElementById('pegawai-list').innerHTML = doc.getElementById('pegawai-list').innerHTML;
                });
        }
        function confirmDelete(event) {
            event.preventDefault();
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                event.target.closest('form').submit();
            }
        }
    </script>

</x-app-layout>
