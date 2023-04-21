<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekap;

class Rekap_Controller extends Controller
{
    public function index()
    {
     
        $rekap = Rekap::all();
        return view('rekap.index', compact('rekap'));
    }

    public function create()
    {
        
        return view('rekap.create');
    }

    public function store(Request $request)
    {
        
        $rekap = new Rekap;
       
        $rekap->pks = $request->pks; 
        $rekap->no_do = $request->no_do; 
        $rekap->kontrak_no = $request->kontrak_no; 
        $rekap->bongkar = $request->bongkar; 
        $rekap->save();
        $rekap->tanggal_muat = $request->tanggal_muat; 
        $rekap->tanggal_bongkar = $request->tanggal_bongkar; 
        $rekap->nama_sopir = $request->nama_sopir; 
        $rekap->id_uang_jalan = $request->id_uang_jalan; 
        $rekap->id_kendaraan = $request->id_kendaraan; 
        $rekap->id_rekap = $request->id_rekap; 
        $rekap->kirim_kebun = $request->kirim_kebun; 
        $rekap->terima_bulking = $request->terima_bulking; 

        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
       
        $rekap = Rekap::find($id);
        return view("rekap.edit", compact('rekap'));
    }

    public function update(Request $request, $id)
    {
        
        $rekap = Rekap::findOrFail($id);
    
        $rekap->pks = $request->pks; 
        $rekap->no_do = $request->no_do; 
        $rekap->kontrak_no = $request->kontrak_no; 
        $rekap->bongkar = $request->bongkar; 
        $rekap->save();
        $rekap->tanggal_muat = $request->tanggal_muat; 
        $rekap->tanggal_bongkar = $request->tanggal_bongkar; 
        $rekap->nama_sopir = $request->nama_sopir; 
        $rekap->id_uang_jalan = $request->id_uang_jalan; 
        $rekap->id_kendaraan = $request->id_kendaraan; 
        $rekap->id_rekap = $request->id_rekap; 
        $rekap->kirim_kebun = $request->kirim_kebun; 
        $rekap->terima_bulking = $request->terima_bulking; 

        $request->session()->flash("info", "Data rekap berhasil diupdate!");
        return redirect()->route("rekap.index");
    }

    public function destroy(Request $request, $id)
    {
        $rekap = Rekap::find($id);
        $rekap->delete();

        $request->session()->flash("info", "Data rekap berhasil dihapus!");
        return redirect()->back();
    }
}
