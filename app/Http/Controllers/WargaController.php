<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    //
    public function index()
    {
        return view('warga'); // Pastikan ada view 'warga.blade.php'
    }
}
