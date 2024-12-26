<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Menampilkan halaman utama
    public function index()
    {
        return view('home.home');
    }

    // Menampilkan halaman login untuk admin
    public function showAdminLoginForm()
    {
        return view('home.login');
    }
}
