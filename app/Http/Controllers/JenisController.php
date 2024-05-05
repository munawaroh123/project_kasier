<?php

namespace App\Http\Controllers;

use App\Exports\JenisExport;
use App\Imports\JenisImport;
use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PDOException;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['jenis'] = jenis::all();
    // v yg ada banyak data 
            return view('jenis.index')->with($data);
            }
            catch(QueryException | Exception | PDOException $error){
                return "terjadi kesalahan" .$error->getMessage();
    
            }
    }

    /**
  
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisRequest $request)
    {
        Jenis::create($request->all());

        return redirect('jenis')->with('success', 'Input data jenis berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJenisRequest $request, Jenis $jeni)
    {
        $jeni->update($request->all());
        return redirect('jenis')->with('success','Data jenis berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        try{
            DB::beginTransaction();
            $jeni->delete();
            DB::commit();
            return redirect('jenis')->with('success','Data jenis berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }

    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new JenisExport, $date.'_jenis.xlsx');
    }
    public function importData() {
        Excel::import(new JenisImport, request()->file('import'));   
        return redirect('jenis')->with('success', 'Data berhasil di import');
    }
}
//baris kode yang punya nama dan bisa di panggil