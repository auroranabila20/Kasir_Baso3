<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all(); 

        confirmDelete(
            'Hapus Data',
            'Apakah anda yakin ingin menghapus data ini?',
            'Hapus',
            'Batal'
        );

        return view('kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $id = $request->id;

        // Validasi
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori,' . $id,
            'deskripsi'     => 'required|max:100|min:10'
        ], [
            'nama_kategori.required' => 'Nama Kategori harus diisi',
            'nama_kategori.unique'   => 'Nama Kategori sudah ada',
            'deskripsi.required'     => 'Deskripsi harus diisi',
            'deskripsi.max'          => 'Deskripsi maksimal 100 karakter',
            'deskripsi.min'          => 'Deskripsi minimal 10 karakter',
        ]);

        // Simpan data kategori
        Kategori::updateOrCreate(
            ['id' => $id],
            [
                'nama_kategori' => $request->nama_kategori,
                'slug'          => Str::slug($request->nama_kategori),
                'deskripsi'     => $request->deskripsi,
            ]
        );

        toast()->success('Data berhasil disimpan');

        return redirect()->route('master-data.kategori.index');
    }

    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        toast()->success('Data berhasil dihapus');

        return redirect()->route('master-data.kategori.index');
    }
}
