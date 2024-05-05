<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use App\Http\Requests\StoreProduktRequest;
use App\Http\Requests\UpdateProduktRequest;
use App\Models\Jenis;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProduktExport;
use App\Imports\ProduktImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDOException;

class ProduktController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['produkt'] = Produkt::all();
            $data['produkt'] = Produkt::all()->pluck('nama_produkt', 'nama_supplier', 'harga_beli', 'harga_jual', 'stok', 'id');
    
            return view('produkt.index')->with($data);
            }
            catch(QueryException | Exception | PDOException $error){
                return "terjadi kesalahan" .$error->getMessage();
        }
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
    public function store(StoreProduktRequest $request)
    { 
        //  dd($request); 
        // masukan semua file dari request form modal ke dalam variable data
        $data['nama_produkt'] = $request->nama_produkt;
        $data['nama_supplier'] = $request->nama_supplier;
        $data['harga_beli'] = $request->harga_beli;
        $data['harga_jual'] = $request->harga_jual;
        $data['stok'] = $request->stok;

        // jalankan perintah create data
        Produkt::create($data);
        return redirect('produkt')->with('success', 'Data produkt berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produkt $produkt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produkt $produkt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduktRequest $request, Produkt $produkt)
    {
        $produkt->update($request->all());
        return redirect('produkt')->with('success','Data produkt berhasil di edit');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produkt $produkt)
    {
        try{
            DB::beginTransaction();
            $produkt->delete();
            DB::commit();
            return redirect('produkt')->with('success','Data produkt berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }

    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new ProduktExport, $date.'__produkt.xlsx');
    }

    public function importData () {
        Excel::import( new ProduktImport, request()->file('import'));

        return redirect(request()->segment(1).'/produkt')->with('success', 'Import data produkt berhasil!!');
    }

}
