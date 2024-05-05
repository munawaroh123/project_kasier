<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MenuExport;
use App\Imports\MenuImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDOException;
use App\Models\Jenis;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['jenis'] = Jenis::get();
            $data['menu'] = Menu::orderBy('created_at', 'DESC')->get();
    
            return view('menu.index')->with($data);
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
    public function store(StoreMenuRequest $request)
    {
      //  dd($request);
       // mengambil file gambar dari form modal 
       $image = $request->file('image');
       // buat nama file
       $filename = date('Y-m-d') . $image->getClientOriginalName();
       //buat alamat folder untuk penyimpanan file
       $path = 'menu-image/' . $filename;
       // menyimpan file gambar ke dalam storage
       Storage::disk('public')->put($path, file_get_contents($image));

       // masukan semua file dari request form modal ke dalam variable data
       $data['nama_menu'] = $request->nama_menu;
       $data['jenis_id'] = $request->jenis_id;
       $data['harga'] = $request->harga;
       $data['stok'] = $request->stok;
       $data['deskripsi'] = $request->deskripsi;
       $data['image'] = $filename;

       // jalankan perintah create data
       Menu::create($data);
       return redirect('menu')->with('success', 'Data menu berhasil ditambahkan.');
    }

   /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMenuRequest $request, Menu $menu)
    {

        // mengambil file gambar dari form modal 
       $image = $request->file('image');
       if($image){
            //!!Bleum dihapus yang lama
            //
            // buat nama file
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            //buat alamat folder untuk penyimpanan file
            $path = 'menu-image/' . $filename;
            // menyimpan file gambar ke dalam storage
            Storage::disk('public')->put($path, file_get_contents($image));
            $data['image'] = $filename;
        }else{
            $data['image'] = $menu->image;
        }

        $data = $request->all();
        $menu->update($data);
        return redirect('menu')->with('success','Data menu berhasil di edit');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        try{
            DB::beginTransaction();
            $menu->delete();
            DB::commit();
            return redirect('menu')->with('success','Data menu berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }

    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new MenuExport, $date.'_menu.xlsx');
    }

    public function importData() {
        Excel::import(new MenuImport, request()->file('import'));   
        //blueprint untuk menciptakan objek
        return redirect('menu')->with('success', 'Data berhasil di import');
    }
 }
