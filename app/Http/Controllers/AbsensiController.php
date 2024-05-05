<?php

namespace App\Http\Controllers;


use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;
use App\Imports\AbsensiImport;
use App\Pdf\AbsensiPdf;
use Illuminate\Support\Facades\Storage;
use PDOException;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['absensi'] = absensi::all();
    
            return view('absensi.index')->with($data);
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
    public function store(StoreAbsensiRequest $request)
    {
        Absensi::create($request->all());

        return redirect('absensi')->with('success', 'Input data absensi berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        $absensi->update($request->all());
        return redirect('absensi')->with('success','Data absensi berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        try{
            DB::beginTransaction();
            $absensi->delete();
            DB::commit();
            return redirect('absensi')->with('success','Data absensi berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }
    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new AbsensiExport, $date.'_absensi.xlsx');
    }
    public function importData() {
        Excel::import(new AbsensiImport, request()->file('import'));   
        return redirect('absensi')->with('success', 'Data berhasil di import');
    }
}
