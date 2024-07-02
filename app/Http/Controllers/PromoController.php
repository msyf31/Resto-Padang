<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promo = Promo::orderBy('id', 'desc')->get();
        return view('backend.v_promo.index', [
            'judul' => 'Promo',
            'sub' => 'Data Promo',
            'index' => $promo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_promo.create', [
            'judul' => 'Data Promo',
            'sub' => 'Tambah Promo'
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
            'nama_promo' => 'required|max:255',
            'diskon_promo' => 'required',
            'deskripsi_promo' => 'required',
        ]);
        Promo::create($validatedData);
        return redirect('/promo');
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
        $promo = Promo::find($id);
        return view('backend.v_Promo.edit', [
            'judul' => 'Data Promo',
            'sub' => 'Ubah Promo',
            'edit' => $promo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_promo' => 'required|max:255',
            'diskon_promo' => 'required',
            'deskripsi_promo' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Promo::where('id', $id)->update($validatedData);
        return redirect('/promo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promo = Promo::findOrFail($id);
        $promo->delete();
        return redirect('/promo');
    }
}
