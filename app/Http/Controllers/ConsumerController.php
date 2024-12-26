<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function index()
    {
        // Ambil data yang relevan untuk dashboard konsumen (misalnya, daftar menu)
        $foods = \App\Models\Food::all(); // Jika ada model Food
        return view('consumer.dashboard', compact('foods'));
    }
}
