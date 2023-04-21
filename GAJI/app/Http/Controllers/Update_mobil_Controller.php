<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Update_mobil;

class Update_mobil_Controller extends Controller
{
    public function index()
    {
     
        $update_mobil = Update_mobil::all();
        return view('update_mobil.index', compact('update_mobil'));
    }

    public function create()
    {
        
        return view('update_mobil.create');
    }

    public function store(Request $request)
    {
        
        $update_mobil = new Update_mobil;
       
        $update_mobil->tanggal = $request->tanggal; 
        $update_mobil->status = $request->status; 
        $update_mobil->id_kendaraan = $request->id_kendaraan; 
        $update_mobil->keterangan = $request->keterangan; 
        $update_mobil->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
       
        $update_mobil = Update_mobil::find($id);
        return view("update_mobil.edit", compact('update_mobil'));
    }

    public function update(Request $request, $id)
    {
        
        $update_mobil =Update_mobil::findOrFail($id);
    
        $update_mobil->tanggal = $request->tanggal; 
        $update_mobil->status = $request->status; 
        $update_mobil->id_kendaraan = $request->id_kendaraan; 
        $update_mobil->keterangan = $request->keterangan; 
        $update_mobil->save();
        $request->session()->flash("info", "Data update_mobil berhasil diupdate!");
        return redirect()->route("update_mobil.index");
    }

    public function destroy(Request $request, $id)
    {
        $update_mobil = Update_mobil::find($id);
        $update_mobil->delete();

        $request->session()->flash("info", "Data update_mobil berhasil dihapus!");
        return redirect()->back();
    }
}
