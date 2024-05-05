<?php

namespace App\Http\Controllers;

use App\Exports\MejaExport;
use App\Imports\MejaImport;
use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PDOException;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['meja'] = meja::all();
    
            return view('meja.index')->with($data);
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
    public function store(StoreMejaRequest $request)
    {
        meja::create($request->all());

        return redirect('meja')->with('success', 'Input data kategori berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, Meja $meja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        try{
            
            DB::beginTransaction();
            $meja->delete();
            DB::commit();
            return redirect('meja')->with('success','Data meja berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }
    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new MejaExport, $date.'_meja.xlsx');
    }
    public function importData() {
        Excel::import(new MejaImport, request()->file('import'));   
        return redirect('meja')->with('success', 'Data berhasil di import');
    }
}
