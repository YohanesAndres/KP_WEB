<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekap_detail;

class Rekap_Controller extends Controller
{
    public function index()
    {
     
        $rekap = Rekap_detail::all();
        return view('rekap.index', compact('rekap'));
    }

    public function create()
    {
        
        return view('rekap.create');
    }

    public function store(Request $request)
    {
        
        $rekap_detail = new Rekap_detail;
        $rekap_detail->tanggal_muat = $request->tanggal_muat; 
        $rekap_detail->tanggal_bongkar = $request->tanggal_bongkar; 
        $rekap_detail->nama_sopir = $request->nama_sopir; 
        $rekap_detail->id_uang_jalan = $request->id_uang_jalan; 
        $rekap_detail->id_kendaraan = $request->id_kendaraan; 
        $rekap_detail->id_rekap = $request->id_rekap; 
        $rekap_detail->kirim_kebun = $request->kirim_kebun; 
        $rekap_detail->terima_bulking = $request->terima_bulking; 
        $rekap_detail->save();

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
        
        $rekap_detail = Rekap::findOrFail($id);
        $rekap_detail->tanggal_muat = $request->tanggal_muat; 
        $rekap_detail->tanggal_bongkar = $request->tanggal_bongkar; 
        $rekap_detail->nama_sopir = $request->nama_sopir; 
        $rekap_detail->id_uang_jalan = $request->id_uang_jalan; 
        $rekap_detail->id_kendaraan = $request->id_kendaraan; 
        $rekap_detail->id_rekap = $request->id_rekap; 
        $rekap_detail->kirim_kebun = $request->kirim_kebun; 
        $rekap_detail->terima_bulking = $request->terima_bulking; 
        $rekap_detail->save();

        $request->session()->flash("info", "Data rekap berhasil diupdate!");
        return redirect()->route("rekap.index");
    }

    public function delete(Request $request, $id)
    {
        $rekap_detail = Rekap_detail::find($id);
        $rekap_detail->delete();

        $request->session()->flash("info", "Data rekap berhasil dihapus!");
        return redirect()->back();
    }
}
