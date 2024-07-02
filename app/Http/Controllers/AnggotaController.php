<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::orderBy('id', 'desc')->get();
        return view('backend.v_anggota.index', [
            'judul' => 'Anggota',
            'sub' => 'Data Anggota',
            'index' => $anggota
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = User::where('role', '2')->orderBy('nama', 'asc')->get();
        $user = User::where('role', '2')
            ->where('status', 0)
            ->orderBy('nama', 'asc')
            ->get();
        return view('backend.v_anggota.create', [
            'judul' => 'Anggota',
            'sub' => 'Tambah Anggota',
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
            'gander' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|max:255',
            'kode_pos' => 'required|min:5|max:5',
        ]);
        // Update status user menjadi 1
        User::where('id', $request->user_id)->update(['status' => 1]);
        Anggota::create($validatedData);
        return redirect('/anggota');
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
        $anggota = Anggota::find($id);
        return view('backend.v_anggota.edit', [
            'judul' => 'Anggota',
            'sub' => 'Ubah Anggota',
            'edit' => $anggota
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama' => 'required|max:100',
            'hp' => 'required|min:10|max:13',
        ];
        $validatedData = $request->validate($rules);
        Anggota::where('id', $id)->update($validatedData);
        return redirect('/anggota');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        User::where('id', $anggota->user_id)->update(['status' => 0]);
        $anggota->delete();
        return redirect('/anggota');
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}
