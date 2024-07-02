<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view('backend.v_kategori.index', [
            'judul' => 'Data Kategori',
            'sub' => 'Data Kategori',
            'index' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promo = Promo::orderBy('nama_promo', 'asc')->get();
        return view('backend.v_kategori.create', [
            'judul' => 'Tambah Kategori',
            'sub' => 'Tambah Kategori',
            'promo' => $promo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        // dd($request);
        $validatedData = $request->validate([
            'id_promo' => 'required',
            'nama_kategori' => 'required|max:255',
            'jenis_kategori' => 'required|max:255',
        ]);
        Promo::where('id', $request->id_promo);
        Kategori::create($validatedData);
        return redirect('/kategori');
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
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('backend.v_kategori.edit', [
            'judul' => 'Data Kategori',
            'sub' => 'Ubah Kategori',
            'edit' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_kategori' => 'required|max:255',
            'jenis_kategori' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        Kategori::where('id', $id)->update($validatedData);
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect('/kategori');
    }

    public function getPromo($id)
    {
        $promo = Promo::find($id);
        return response()->json($promo);
    }
}
