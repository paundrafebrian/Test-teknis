<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade\Pdf;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pegawais = Pegawai::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                        ->orWhere('nip', 'like', "%{$search}%");
        })->orderBy('nama', 'asc')->paginate(10); // Menampilkan data dengan pagination

        return view('pegawai.index', compact('pegawais', 'search'));
    }


    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'nullable|in:L,P',
            'golongan' => 'nullable|string|max:255',
            'eselon' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'tempat_tugas' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:255',
            'unit_kerja' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:255',
            'npwp' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Jika ada file foto yang diupload
        if ($request->hasFile('foto')) {
            // Simpan file ke storage/foto_pegawai dan hanya simpan path-nya
            $validated['foto'] = $request->file('foto')->store('foto_pegawai', 'public');
        }

        // Simpan data ke database
        Pegawai::create($validated);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }



    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validatedData = $request->validate([
            'nip' => 'required|string|max:50',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'required|in:L,P',
            'golongan' => 'nullable|string|max:50',
            'eselon' => 'nullable|string|max:50',
            'jabatan' => 'nullable|string|max:100',
            'tempat_tugas' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:50',
            'unit_kerja' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'npwp' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Jika ada file foto baru di-upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pegawai->foto) {
                \Storage::disk('public')->delete($pegawai->foto);
            }

            // Simpan foto baru ke storage/foto_pegawai
            $validatedData['foto'] = $request->file('foto')->store('foto_pegawai', 'public');
        }

        // Update data pegawai
        $pegawai->update($validatedData);

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return redirect()->route('pegawai.index')->with('error', 'Pegawai tidak ditemukan!');
        }

        // Hapus foto jika ada
        if ($pegawai->foto && Storage::exists($pegawai->foto)) {
            Storage::delete($pegawai->foto);
        }

        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }

    public function cetakPDF()
    {
        $pegawais = Pegawai::all(); // Ambil semua data pegawai

        // Render view untuk PDF
        $pdf = Pdf::loadView('pegawai.cetak-pdf', compact('pegawais'))->setPaper('a4', 'landscape');

        // Unduh file PDF
        return $pdf->download('daftar_pegawai.pdf');
    }

}
