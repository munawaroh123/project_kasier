<?php

namespace App\Http\Controllers;

use App\Exports\StokExport;
use App\Imports\StokImport;
use App\Models\Stok;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PDOException;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['stok'] = stok::all();
    // v yg ada banyak data 
            return view('stok.index')->with($data);
            }
            catch(QueryException | Exception | PDOException $error){
                return "terjadi kesalahan" .$error->getMessage();
    
            }
    }

    /**
  
     * Store a newly created resource in storage.
     */
    public function store(StoreStokRequest $request)
    {
        Stok::create($request->all());

        return redirect('stok')->with('success', 'Input data stok berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStokRequest $request, Stok $stok)
    {
        $stok->update($request->all());
        return redirect('stok')->with('success','Data stok berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $jeni)
    {
        try{
            DB::beginTransaction();
            $jeni->delete();
            DB::commit();
            return redirect('stok')->with('success','Data stok berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }

    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new StokExport, $date.'_stok.xlsx');
    }
    public function importData() {
        Excel::import(new StokImport, request()->file('import'));   
        return redirect('stok')->with('success', 'Data berhasil di import');
    }
}
