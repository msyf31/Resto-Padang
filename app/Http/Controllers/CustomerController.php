<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Helpers\ImageHelper;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::orderBy('id', 'desc')->get();
        return view('backend.v_customer.index', [
            'judul' => 'Customer',
            'sub' => 'Data Customer',
            'index' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_customer.create', [
            'judul' => 'Customer',
            'sub' => 'Tambah Customer'
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
            'nama_customer' => 'required',
            'email_customer' => 'required|email|unique:customer',
            'hp_customer' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ], $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ]);

        // menggunkan ImageHelper
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $directory = 'storage/img-customer/'; // Atur direktori yang diinginkan
            $width = 400; // Atur lebar gambar
            $height = 400; // $height = null (jika tinggi otomatis)
            $fileName = ImageHelper::uploadAndResize($file, $directory, $width, $height); // Menggunakan ImageHelper untuk upload dan resize gambar
            $validatedData['foto'] = $fileName;
        }
        Customer::create($validatedData, $messages);
        return redirect('/customer');
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
        $customer = Customer::find($id);
        return view('backend.v_customer.edit', [
            'judul' => 'Customer',
            'sub' => 'Ubah Customer',
            'edit' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        $rules = [
            'nama_customer' => 'required',
            'email_customer' => 'required',
            'hp_customer' => 'required',
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
            if ($customer->foto) {
                $oldImagePath = public_path('storage/img-customer/') . $customer->foto;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('foto');
            $directory = 'storage/img-customer/'; // Atur direktori yang diinginkan
            $width = 400; // Atur lebar gambar
            $height = 400; // $height = null (jika tinggi otomatis)
            $fileName = ImageHelper::uploadAndResize($file, $directory, $width, $height); // Menggunakan ImageHelper untuk upload dan resize gambar
            $validatedData['foto'] = $fileName;
        }
        $customer->update($validatedData);
        return redirect('/customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = customer::findOrFail($id);
        if ($customer->foto) {
            $oldImagePath = public_path('storage/img-customer/') . $customer->foto;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $customer->delete();
        return redirect('/customer')->with('msgSuccess', 'Data berhasil dihapus');
    }
}
