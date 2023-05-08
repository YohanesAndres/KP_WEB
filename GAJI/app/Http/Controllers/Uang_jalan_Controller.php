<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uang_jalan;
use App\Models\Kendaraan;
use App\Models\Namasopir;
use App\Models\Kategori;
use App\Models\Muat_bongkar;

class Uang_jalan_Controller extends Controller
{
    public function index()
    {
     
        $uang_jalan = Uang_jalan::all();
        return view('uang_jalan.index', compact('uang_jalan'));
    }

    public function create()
    {
        
        $tablekendaraanData = Kendaraan::all();
        $tablemuatbongkarData = Muat_bongkar::all();

        return view('uang_jalan.create', [
            'tablekendaraanData' => $tablekendaraanData,
            'tablemuatbongkarData' => $tablemuatbongkarData,
        ]);
    }

    public function store(Request $request)
    {
        
        $uang_jalan = new Uang_jalan;
       
        $uang_jalan->tanggal = $request->tanggal; 
        $uang_jalan->id_kendaraan = $request->id_kendaraan; 
        $uang_jalan->barcode = $request->barcode; 
        $uang_jalan->id_muat_bongkar = $request->id_muat_bongkar; 
        $uang_jalan->keterangan = $request->keterangan; 
        $uang_jalan->save();
        return redirect('/uang_jalan')->with('info', 'Data sopir berhasil disimpan');
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
        
        $uang_jalan =Uang_jalan::findOrFail($id);
    
        $uang_jalan->tanggal = $request->tanggal; 
        $uang_jalan->id_kendaraan = $request->id_kendaraan; 
        $uang_jalan->barcode = $request->barcode; 
        $uang_jalan->id_muat_bongkar = $request->id_muat_bongkar; 
        $uang_jalan->keterangan = $request->keterangan;  
        $uang_jalan->save();

        $request->session()->flash("info", "Data uang_jalan berhasil diupdate!");
        return redirect()->route("uang_jalan.index");
    }

    public function delete(Request $request, $id)
    {
        $uang_jalan = Uang_jalan::find($id);
        $uang_jalan->delete();

        $request->session()->flash("info", "Data uang_jalan berhasil dihapus!");
        return redirect()->back();
    }
}
