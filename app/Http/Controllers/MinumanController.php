<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minuman;
use App\Helpers\ImageHelper;

class MinumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minuman = Minuman::orderBy('updated_at', 'desc')->get();
        return view('backend.v_minuman.index', [
            'judul' => 'Minuman',
            'sub' => 'Data Minuman',
            'index' => $minuman
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_minuman.create', [
            'judul' => 'Data Minuman',
            'sub' => 'Tambah Minuman',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_minuman' => 'required|max:255',
            'deskripsi_minuman' => 'required',
            'harga_minuman' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ], $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ]);

        // menggunkan ImageHelper
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $directory = 'storage/img-minuman/'; // Atur direktori yang diinginkan
            $width = 400; // Atur lebar gambar
            $height = 400; // $height = null (jika tinggi otomatis)
            $fileName = ImageHelper::uploadAndResize($file, $directory, $width, $height); // Menggunakan ImageHelper untuk upload dan resize gambar
            $validatedData['foto'] = $fileName;
        }

        
        Minuman::create($validatedData, $messages);
        return redirect('/minuman')->with('success', 'Data berhasil tersimpan');
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
        $minuman = Minuman::findOrFail($id);
        return view('backend.v_minuman.edit', [
            'judul' => 'Data Minuman',
            'sub' => 'Edit Minuman',
            'edit' => $minuman
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //ddd($request);
        $minuman = Minuman::findOrFail($id);
        $rules = [
            'nama_minuman' => 'required|max:255',
            'deskripsi_minuman' => 'required',
            'harga_minuman' => 'required',
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
            if ($minuman->foto) {
                $oldImagePath = public_path('storage/img-minuman/') . $minuman->foto;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('foto');
            $directory = 'storage/img-minuman/'; // Atur direktori yang diinginkan
            $width = 400; // Atur lebar gambar
            $height = 400; // $height = null (jika tinggi otomatis)
            $fileName = ImageHelper::uploadAndResize($file, $directory, $width, $height); // Menggunakan ImageHelper untuk upload dan resize gambar
            $validatedData['foto'] = $fileName;
        }

        $minuman->update($validatedData);
        return redirect('/minuman')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $minuman = minuman::findOrFail($id);
        if ($minuman->foto) {
            $oldImagePath = public_path('storage/img-minuman/') . $minuman->foto;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $minuman->delete();
        return redirect('/minuman')->with('msgSuccess', 'Data berhasil dihapus');
    }
}
