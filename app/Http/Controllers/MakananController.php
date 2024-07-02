<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Helpers\ImageHelper;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makanan = Makanan::orderBy('updated_at', 'desc')->get();
        return view('backend.v_makanan.index', [
            'judul' => 'Makanan',
            'sub' => 'Data Makanan',
            'index' => $makanan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_makanan.create', [
            'judul' => 'Data Makanan',
            'sub' => 'Tambah Makanan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_makanan' => 'required|max:255',
            'deskripsi_makanan' => 'required',
            'harga_makanan' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ], $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ]);

        // menggunkan ImageHelper
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $directory = 'storage/img-makanan/'; // Atur direktori yang diinginkan
            $width = 400; // Atur lebar gambar
            $height = 400; // $height = null (jika tinggi otomatis)
            $fileName = ImageHelper::uploadAndResize($file, $directory, $width, $height); // Menggunakan ImageHelper untuk upload dan resize gambar
            $validatedData['foto'] = $fileName;
        }

        
        Makanan::create($validatedData, $messages);
        return redirect('/makanan')->with('success', 'Data berhasil tersimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $makanan = Makanan::findOrFail($id);
        return view('backend.v_makanan.edit', [
            'judul' => 'Data Makanan',
            'sub' => 'Edit Makanan',
            'edit' => $makanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //ddd($request);
        $makanan = Makanan::findOrFail($id);
        $rules = [
            'nama_makanan' => 'required|max:255',
            'deskripsi_makanan' => 'required',
            'harga_makanan' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ];
        $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ];

        $validatedData = $request->validate($rules, $messages);

        // menggunkan ImageHelper
        if ($request->file('foto')) {
            //hapus gambar lama
            if ($makanan->foto) {
                $oldImagePath = public_path('storage/img-makanan/') . $makanan->foto;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('foto');
            $directory = 'storage/img-makanan/'; // Atur direktori yang diinginkan
            $width = 400; // Atur lebar gambar
            $height = 400; // $height = null (jika tinggi otomatis)
            $fileName = ImageHelper::uploadAndResize($file, $directory, $width, $height); // Menggunakan ImageHelper untuk upload dan resize gambar
            $validatedData['foto'] = $fileName;
        }

        $makanan->update($validatedData);
        return redirect('/makanan')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $makanan = makanan::findOrFail($id);
        if ($makanan->foto) {
            $oldImagePath = public_path('storage/img-makanan/') . $makanan->foto;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $makanan->delete();
        return redirect('/makanan')->with('msgSuccess', 'Data berhasil dihapus');
    }
}
