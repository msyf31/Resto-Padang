<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Customer;
use App\Models\User;
use PDF;

class DetailPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailpesanan = DetailPesanan::orderBy('id', 'desc')->get();
        return view('backend.v_detailpesanan.index', [
            'judul' => 'Detail Pesanan',
            'sub' => 'Data Detail Pesanan',
            'index' => $detailpesanan
        ]);
    }

    public function unduhPDF()
    {
        $detailpesanan = DetailPesanan::orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('backend.v_detailpesanan.document',[
            'unduhPDF' => $detailpesanan,
            'title' => 'Detail Pesanan',
        ]);
        return $pdf->download('Struk-Pembayaran.pdf');
    }

    // public function unduhPDF()
    // {
    //     $data = ['title' => 'Struk Pembayaran'];
    //     $pdf = PDF::loadView('backend.v_detailpesanan.document', $data);
    //     return $pdf->download('Struk-Pembayaran.pdf');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pesanan = Pesanan::orderBy('id', 'asc')->get();
        return view('backend.v_detailpesanan.create', [
            'judul' => 'Data Detail Pesanan',
            'sub' => 'Tambah Detail Pesanan',
            'pesanan' => $pesanan
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
            'pesanan_id' => 'required',
            'status' => 'required',
        ]);
        DetailPesanan::create($validatedData);
        return redirect('/detailpesanan');
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
        $detailpesanan = DetailPesanan::find($id);
        return view('backend.v_DetailPesanan.edit', [
            'judul' => 'Data Detail Pesanan',
            'sub' => 'Ubah Detail Pesanan',
            'edit' => $detailpesanan
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
        DetailPesanan::where('id', $id)->update($validatedData);
        return redirect('/detailpesanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailpesanan = DetailPesanan::findOrFail($id);
        $detailpesanan->delete();
        return redirect('/detailpesanan');
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
    
    public function getPesanan($id)
    {
        $pesanan = Pesanan::find($id);
        return response()->json($pesanan);
    }
}
