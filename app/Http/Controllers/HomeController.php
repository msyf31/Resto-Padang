<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('backend.v_home.index', [
            'judul' => 'Beranda',
            'sub' =>'Data Home'
        ]);
    }
}
