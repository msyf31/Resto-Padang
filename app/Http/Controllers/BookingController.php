<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::orderBy('id', 'desc')->get();
        return view('backend.v_booking.index', [
            'judul' => 'Booking',
            'sub' => 'Data Booking',
            'index' => $booking
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_booking.create', [
            'judul' => 'Data Booking',
            'sub' => 'Tambah Booking'
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
            'jam_booking' => 'required|max:255',
            'tanggal_booking' => 'required',
            'pembayaran_booking' => 'required',
        ]);
        Booking::create($validatedData);
        return redirect('/booking');
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
        $booking = Booking::find($id);
        return view('backend.v_Booking.edit', [
            'judul' => 'Data Booking',
            'sub' => 'Ubah Booking',
            'edit' => $booking
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'jam_booking' => 'required|max:255',
            'tanggal_booking' => 'required',
            'pembayaran_booking' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Booking::where('id', $id)->update($validatedData);
        return redirect('/booking');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect('/booking');
    }
}
