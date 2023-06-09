<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uang_jalan;
use App\Models\Kendaraan;
use App\Models\Namasopir;
use App\Models\Kategori;
use App\Models\Muat_bongkar;
use App\Models\Update_mobil;
use DB;

class Uang_jalan_Controller extends Controller
{
    public function index()
    {
        
        $uang_jalan = Uang_jalan::all();
        return view('uang_jalan.index', compact('uang_jalan'));
    }

    public function create()
    {
        
        $tablekendaraanData = Kendaraan::where('selesai','=',1)->get();
        $tablemuatbongkarData = Muat_bongkar::all();
        #$tableuangjalan= Uang_jalan::where('tanggal','=',)

        return view('uang_jalan.create', [
            'tablekendaraanData' => $tablekendaraanData,
            'tablemuatbongkarData' => $tablemuatbongkarData,
        ]);
        
    }

    public function getDatajalan($id)
    {
        $uangJalan = update_mobil::with(['uangjalan.kendaraan.namasopir', 'uangjalan.muatbongkar'])
        ->findOrFail($id);
    
       
        return response()->json([
            'Datajalan' => $uangJalan,
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'tanggal' => 'required',
            'nomorUJ' => 'required|unique:uang_jalan,nomorUJ,idExcept',
            'id_kendaraan' => 'required',
            'id_muat_bongkar' => 'required',
        ],
        [
            'tanggal.required' => 'Tanggal tidak boleh kosong !', 
            'nomorUJ.required' => 'ID tidak boleh kosong !', 
            'nomorUJ.unique' => 'ID sudah terdaftar !', 
            'id_kendaraan.required' => 'Silahkan pilih plat !',
            'id_muat_bongkar.required' => 'Silahkan pilih Muat bongkar !',
            // 'nomorUJ.min' => 'ID harus memiliki minimal 6 karakter !', 
        ]);

        $uang_jalan = new Uang_jalan;
        #$increment = DB::select("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'db_kp' AND TABLE_NAME = 'uang_jalan'")[0]->AUTO_INCREMENT;
        $increment = DB::select("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA ='". env('DB_DATABASE') . "' AND TABLE_NAME ='" . $uang_jalan->getTable() . "'")[0]->AUTO_INCREMENT;
        $uang_jalan->tanggal = $request->tanggal; 
        $uang_jalan->nomorUJ = $request->nomorUJ; 
        $uang_jalan->id_kendaraan = $request->id_kendaraan; 
        // $uang_jalan->barcode = $request->barcode; 
        $uang_jalan->id_muat_bongkar = $request->id_muat_bongkar; 
        $uang_jalan->uang_Jalan = $request->uang_Jalan; 
        $uang_jalan->keterangan = $request->keterangan; 
        $uang_jalan->save();
        $update_mobil=new Update_mobil; 
        $update_mobil->id_uang_jalan=$increment;
        $update_mobil->status = "sedang dijalan"; 
        $update_mobil->keterangan = $request->keterangan; 
        $update_mobil->save();
        $kendaraan= kendaraan::find($request->id_kendaraan);
        $kendaraan->selesai=0;
        $kendaraan->save();

        $request->session()->flash("info", "Data Uang Jalan berhasil ditambahkan");
        return redirect()->route("uang_jalan.create");

    }

    public function edit(Request $request, $id)
    {
        $tablekendaraanData = Kendaraan::all();
        $tablemuatbongkarData = Muat_bongkar::all();
        $uang_jalan = Uang_jalan::find($id);

        return view('uang_jalan.edit', [
            'uang_jalan' => $uang_jalan,
            'tablekendaraanData' => $tablekendaraanData,
            'tablemuatbongkarData' => $tablemuatbongkarData,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'tanggal' => 'required',
            'id_kendaraan' => 'required',
            'id_muat_bongkar' => 'required',
            'nomorUJ' => 'required|unique:uang_jalan,nomorUJ,'.$id,
        ],
        [
            'tanggal.required' => 'Tanggal tidak boleh kosong !', 
            'id_kendaraan.required' => 'Silahkan pilih plat !',
            'id_muat_bongkar.required' => 'Silahkan pilih Muat bongkar !',
            'nomorUJ.required' => 'ID tidak boleh kosong !', 
            'nomorUJ.unique' => 'ID sudah terdaftar !', 
            // 'nomorUJ.min' => 'ID harus memiliki minimal 6 karakter !', 
        ]);
        
        $uang_jalan =Uang_jalan::findOrFail($id);
    
        $uang_jalan->nomorUJ = $request->nomorUJ; 
        $uang_jalan->tanggal = $request->tanggal; 
        $uang_jalan->id_kendaraan = $request->id_kendaraan; 
        // $uang_jalan->barcode = $request->barcode; 
        $uang_jalan->id_muat_bongkar = $request->id_muat_bongkar; 
        $uang_jalan->uang_Jalan = $request->uang_Jalan; 
        $uang_jalan->keterangan = $request->keterangan;  
        $uang_jalan->save();

        $request->session()->flash("info", "Data uang_jalan berhasil diupdate!");
        return redirect()->route("uang_jalan.index");
        
    }

    public function delete(Request $request, $id)
    {
        $uang_jalan = Uang_jalan::find($id);
        $uang_jalan->delete();
        $kendaraan= kendaraan::find($uang_jalan->id_kendaraan);
        $kendaraan->selesai=1;
        $kendaraan->save();

        $request->session()->flash("info", "Data uang_jalan berhasil dihapus!");
        return redirect()->back();
    }
}
