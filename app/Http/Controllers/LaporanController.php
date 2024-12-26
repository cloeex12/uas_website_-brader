<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Data filter menu
        $menuList = ['Nasi Goreng', 'Mie Ayam', 'Ayam Goreng']; // Data menu
        $bulanList = ['Januari', 'Februari', 'Maret', 'April']; // Data bulan
        
        // Filter data berdasarkan input
        $menu = $request->input('menu');
        $bulan = $request->input('bulan');

        // Data laporan contoh
        $laporan = [
            (object)[
                'nama_menu' => 'Nasi Goreng',
                'bulan' => 'Januari',
                'jumlah_terjual' => 50,
                'pendapatan' => 500000
            ],
            (object)[
                'nama_menu' => 'Mie Ayam',
                'bulan' => 'Februari',
                'jumlah_terjual' => 30,
                'pendapatan' => 300000
            ]
        ];

        // Filter data laporan
        if ($menu) {
            $laporan = array_filter($laporan, fn($data) => $data->nama_menu === $menu);
        }
        if ($bulan) {
            $laporan = array_filter($laporan, fn($data) => $data->bulan === $bulan);
        }

        // Kirim data ke view
        return view('laporan.index', compact('menuList', 'bulanList', 'laporan'));
    }
}
