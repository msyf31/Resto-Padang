<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Produk;
use App\Models\Customer;
use App\Models\Pesanan;
use App\Models\User;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ulasan = Ulasan::orderBy('id', 'desc')->get();
        return view('backend.v_ulasan.index', [
            'judul' => 'Ulasan',
            'sub' => 'Data Ulasan',
            'index' => $ulasan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = User::where('role', '2')->orderBy('nama', 'asc')->get();
        // $produk = Produk::orderBy('harga_produk', 'asc')->get();
        // $customer = Customer::orderBy('user_id', 'asc')->get();
        // $user = User::orderBy('nama', 'asc')->get();
        $pesanan = Pesanan::orderBy('id', 'asc')->get();
        return view('backend.v_ulasan.create', [
            'judul' => 'Ulasan',
            'sub' => 'Tambah Ulasan',
            'pesanan' => $pesanan,
            // 'customer' => $customer,
            // 'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // ddd($request);
        $validatedData = $request->validate([
            'pesanan_id' => 'required',
            // 'produk_id' => 'required',
            'ulasan' => 'required',
            'rating' => 'required',
        ]);
        // Update status user menjadi 1
        Produk::where('id', $request->produk_id);
        Ulasan::create($validatedData);
        return redirect('/ulasan');
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
        $ulasan = Ulasan::find($id);
        return view('backend.v_ulasan.edit', [
            'judul' => 'Ulasan',
            'sub' => 'Ubah Ulasan',
            'edit' => $ulasan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'ulasan' => 'required',
            'rating' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Ulasan::where('id', $id)->update($validatedData);
        return redirect('/ulasan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ulasan = Ulasan::findOrFail($id);
        Produk::where('id', $ulasan->pesanan_id);
        $ulasan->delete();
        return redirect('/ulasan');
    }

    public function getProduk($id)
    {
        $produk = Produk::find($id);
        return response()->json($produk);
    }
    
    public function getPesanan($id)
    {
        $pesanan = Pesanan::find($id);
        return response()->json($pesanan);
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}
