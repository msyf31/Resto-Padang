<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Customer;
use App\Models\User;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::orderBy('id', 'desc')->get();
        return view('backend.v_pesanan.index', [
            'judul' => 'Pesanan',
            'sub' => 'Data Pesanan',
            'index' => $pesanan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = User::where('role', '2')->orderBy('nama', 'asc')->get();
        $produk = Produk::orderBy('harga_produk', 'asc')->get();
        // $customer = Customer::orderBy('user_id', 'asc')->get();
        $user = User::orderBy('nama', 'asc')->get();
        return view('backend.v_pesanan.create', [
            'judul' => 'Pesanan',
            'sub' => 'Tambah Pesanan',
            'produk' => $produk,
            // 'customer' => $customer,
            'user' => $user
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
            'user_id' => 'required',
            'produk_id' => 'required',
            'status' => 'required',
        ]);
        // Update status user menjadi 1
        Produk::where('id', $request->produk_id);
        Pesanan::create($validatedData);
        return redirect('/pesanan');
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
        $pesanan = Pesanan::find($id);
        return view('backend.v_pesanan.edit', [
            'judul' => 'Pesanan',
            'sub' => 'Ubah Pesanan',
            'edit' => $pesanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'status' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Pesanan::where('id', $id)->update($validatedData);
        return redirect('/pesanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        Produk::where('id', $pesanan->produk_id);
        $pesanan->delete();
        return redirect('/pesanan');
    }

    public function getProduk($id)
    {
        $produk = Produk::find($id);
        return response()->json($produk);
    }
    
    public function getCustomer($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}
