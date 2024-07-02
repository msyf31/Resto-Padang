<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\DineIn;

class DineInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dinein = DineIn::orderBy('id', 'desc')->get();
        return view('backend.v_dinein.index', [
            'judul' => 'Data DineIn',
            'sub' => 'Data DineIn',
            'index' => $dinein
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::orderBy('nama', 'asc')->get();
        $customer = Customer::orderBy('nama_customer', 'asc')->get();
        return view('backend.v_dinein.create', [
            'judul' => 'Tambah DineIn',
            'sub' => 'Tambah DineIn',
            'user' => $user,
            'customer' => $customer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        // dd($request->all());
        $validatedData = $request->validate([
            'user_id' => 'required',
            'customer_id' => 'required',
            'jam_dinein' => 'required',
            'tanggal_dinein' => 'required',
            'pembayaran_dinein' => 'required',
        ]);
        $validatedData['status'] = 0;
        User::where('id', $request->user_id);
        Customer::where('id', $request->customer_id);
        DineIn::create($validatedData);
        return redirect('/dinein');
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
        $user = User::orderBy('nama', 'asc')->get();
        $customer = Customer::orderBy('nama_customer', 'asc')->get();
        $dinein = DineIn::find($id);
        return view('backend.v_dinein.edit', [
            'judul' => 'Data DineIn',
            'sub' => 'Ubah DineIn',
            'edit' => $dinein,
            'user' => $user,
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'user_id' => 'required',
            'customer_id' => 'required',
            'status' => 'required',
            'jam_dinein' => 'required',
            'tanggal_dinein' => 'required',
            'pembayaran_dinein' => 'required',
        ];
        $validatedData = $request->validate($rules);
        DineIn::where('id', $id)->update($validatedData);
        return redirect('/dinein');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dinein = DineIn::findOrFail($id);
        $dinein->delete();
        return redirect('/dinein');
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}
