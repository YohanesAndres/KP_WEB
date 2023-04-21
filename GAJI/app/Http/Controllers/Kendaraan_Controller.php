<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;

class Kendaraan_Controller extends Controller
{
    public function index()
    {
     
        $kendaraan = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraan'));
    }

    public function create()
    {
        
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        
        $kendaraan = new Kendaraan;
       
        $kendaraan->plat = $request->plat; 
        $kendaraan->tonase = $request->tonase; 
        $kendaraan->id_namasopir = $request->id_namasopir; 
        $kendaraan->id_kategori = $request->id_kategori; 
        $kendaraan->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
       
        $kendaraan = Kendaraan::find($id);
        return view("kendaraan.edit", compact('kendaraan'));
    }

    public function update(Request $request, $id)
    {
        
        $kendaraan = Kendaraan::findOrFail($id);
    
        $kendaraan->plat = $request->plat; 
        $kendaraan->tonase = $request->tonase; 
        $kendaraan->id_namasopir = $request->id_namasopir; 
        $kendaraan->id_kategori = $request->id_kategori; 
        $kendaraan->save();

        $request->session()->flash("info", "Data kendaraan berhasil diupdate!");
        return redirect()->route("kendaraan.index");
    }

    public function destroy(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->delete();

        $request->session()->flash("info", "Data kendaraan berhasil dihapus!");
        return redirect()->back();
    }
}
