<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use App\Imports\PelangganImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDOException;
use App\Models\Jenis;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['pelanggan'] = pelanggan::all();
    
            return view('pelanggan.index')->with($data);
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
    public function store(StorePelangganRequest $request)
    {
        Pelanggan::create($request->all());

        return redirect('pelanggan')->with('success', 'Input data pelanggan berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());
        return redirect('pelanggan')->with('success','Data pelanggan berhasil di edit');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        try{
            DB::beginTransaction();
            $pelanggan->delete();
            DB::commit();
            return redirect('pelanggan')->with('success','Data pelanggan berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }
    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new PelangganExport, $date.'_pelanggan.xlsx');
    }
    public function importData() {
        Excel::import(new PelangganImport, request()->file('import'));   
        return redirect('pelanggan')->with('success', 'Data berhasil di import');
    }
}
