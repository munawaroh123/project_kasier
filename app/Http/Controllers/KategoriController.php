<?php

namespace App\Http\Controllers;

use App\Exports\KategoriExport;
use App\Imports\KategoriImport;
use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['kategori'] = kategori::all();
    
            return view('kategori.index')->with($data);
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
    public function store(StoreKategoriRequest $request)
    {
        Kategori::create($request->all());

        return redirect('kategori')->with('success', 'Input data kategori berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
              $kategori->update($request->all());
        return redirect('kategori')->with('success','Data kategori berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try{
            DB::beginTransaction();
            $kategori->delete();
            DB::commit();
            return redirect('kategori')->with('success','Data kategori berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }
    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new KategoriExport(), $date.'_kategori.xlsx');
    }
    public function importData() {
        Excel::import(new KategoriImport, request()->file('import'));   
        return redirect('kategori')->with('success', 'Data berhasil di import');
    }
}
