<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\menu;
use App\Models\pelanggan;
use App\Models\pemesanan;
use App\Models\transaksi;
use App\Models\transaksiterbaru;
use App\Models\stok;
use Illuminate\Http\Request;

class grafikController extends Controller
{
    public function index()
    {
        $menu = menu::get();
        $data['count_menu'] = $menu->count();
        $data['menu'] = $menu;

        $pelanggan = pelanggan::get();
        $data['count_pelanggan'] = $pelanggan->count();

        $transaksi = transaksi::get();
        $data['count_transaksi'] = $transaksi->count();

        $stok = stok::get();
        $data['count_stok'] = $menu->sum('stok');

        $transaksi = Transaksi::get();
       $data['total_transaksi'] = $transaksi->sum('total_harga');


       $data['latest_transaksi'] = Transaksi::orderBy('tanggal', 'desc')->limit(5)->get();



        //tampilkan 10 data pelanggan terakhir
        $data['pelanggan'] = pelanggan::limit(5)->orderBy('created_at', 'desc')->get();

        $data['detail_transaksi'] = Detailtransaksi::limit(5)->orderBy('created_at', 'desc')->get();

        $data['stok'] = Stok::limit(5)->orderBy('jumlah', 'asc')->get();


        return view('templates.grafik')->with($data);
    }
}