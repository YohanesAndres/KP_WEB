<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uang_jalan;

class Uang_jalan_Controller extends Controller
{
    public function index()
    {
     
        $uang_jalan = Uang_jalan::all();
        return view('uang_jalan.index', compact('uang_jalan'));
    }

    public function create()
    {
        
        return view('uang_jalan.create');
    }

    public function store(Request $request)
    {
        
        $uang_jalan = new Uang_jalan;
       
        $uang_jalan->tanggal = $request->tanggal; 
        $uang_jalan->id_kendaraan = $request->id_kendaraan; 
        $uang_jalan->barcode = $request->barcode; 
        $uang_jalan->id_muat_bongkar = $request->id_muat_bongkar; 
        $uang_jalan->jumlah_uang_jalan = $request->jumlah_uang_jalan; 
        $uang_jalan->cek = $request->cek; 
        $uang_jalan->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
       
        $uang_jalan = Uang_jalan::find($id);
        return view("uang_jalan.edit", compact('uang_jalan'));
    }

    public function update(Request $request, $id)
    {
        
        $uang_jalan =Uang_jalan::findOrFail($id);
    
        $uang_jalan->tanggal = $request->tanggal; 
        $uang_jalan->id_kendaraan = $request->id_kendaraan; 
        $uang_jalan->barcode = $request->barcode; 
        $uang_jalan->id_muat_bongkar = $request->id_muat_bongkar; 
        $uang_jalan->jumlah_uang_jalan = $request->jumlah_uang_jalan; 
        $uang_jalan->cek = $request->cek;  
        $uang_jalan->save();

        $request->session()->flash("info", "Data uang_jalan berhasil diupdate!");
        return redirect()->route("uang_jalan.index");
    }

    public function destroy(Request $request, $id)
    {
        $uang_jalan = Uang_jalan::find($id);
        $uang_jalan->delete();

        $request->session()->flash("info", "Data uang_jalan berhasil dihapus!");
        return redirect()->back();
    }
}
