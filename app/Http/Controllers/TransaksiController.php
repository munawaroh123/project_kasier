<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\DetailTransaksi;
use App\Models\Jenis;
use App\Models\Menu;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransaksiController extends Controller
 {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['jenis'] = Jenis::with(['menu'])->get();
        // dd($data['jenis']);

        return view('transaksi.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        try {
            DB::beginTransaction();
            // dd($request->all());
            //metode yang disediakan oleh Laravel untuk melakukan operasi database dalam transaksi
            $last_id = Transaksi::where('tanggal', date('Y-m-d'))->orderBy('created_at', 'desc')->select('id')->first();
            $noTrans = $last_id == null ? date('Ymd') . '0001' : date('Ymd') . sprintf('%04d', substr($last_id->id, 8, 4) + 1);
            $insertTransaksi = Transaksi::create([
                'id_pelanggan' => $request->id_pelanggan,
                'id' => $noTrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => "cash",
                'keterangan' => '',
            ]);
            // dd($insertTransaksi);
            if (!$insertTransaksi->exists) return 'error';

            foreach ($request->orderedList as $detail) {
                $menu = Menu::find($detail['menu_id']);
                $menu->stok = $menu->stok - $detail['qty'];
                $menu->save();
                
                DetailTransaksi::create([
                    'id_transaksi' => $noTrans,
                    'id_menu' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty'],
                ]);
            }
            DB::commit();
            //mengirim data yang ada di laravel ke sql
            return response()->json(['status' => true, 'message' => 'Pemesanan Berhasil!', 'nota' => $noTrans]);
        } catch (Exception | QueryException | PDOException $e) {
            DB::rollback();
            //mengambilkan data tap gagal
            return response()->json(['status' => false, 'message' => 'Pemesanan Gagal', $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }


public function faktur($noFaktur)
    {
        try {
            $data['transaksi'] = Transaksi::where('id', $noFaktur)->with(['detailTransaksi' => function ($query) {
                $query->with('menu');
            }])->first();

            return view('transaksi.nota')->with($data);
        } catch (Exception | QueryException | PDOException $e) {
            return response()->json(['status' => false, 'messsage' => "gada!", "error" => $e->getMessage()]);
        }
    }
}

