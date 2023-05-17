<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Update_mobil;
use App\Models\Uang_jalan;
use App\Models\Kendaraan;

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


    public function edit(Request $request, $id)
    {
       
        $update_mobil = Update_mobil::find($id);
        return view("update_mobil.edit", compact('update_mobil'));
    }

    public function update(Request $request, $id)
    {
        
        $update_mobil =Update_mobil::findOrFail($id);
        if ($request->status=="selesai") {
            $uang_jalan=uang_jalan::find($update_mobil->id_uang_jalan);
            $kendaraan=kendaraan::find($uang_jalan->id_kendaraan);
            $kendaraan->selesai =1;
            #dd($kendaraan);
            $kendaraan->save();
        }
        
        $update_mobil->status = $request->status; 
        $update_mobil->keterangan = $request->keterangan; 
        $update_mobil->save();
        $request->session()->flash("info", "Data update_mobil berhasil diupdate!");
        return redirect()->route("update_mobil.index");
    }

    public function delete(Request $request, $id)
    {
        $update_mobil = Update_mobil::find($id);
        $update_mobil->delete();

        $request->session()->flash("info", "Data update_mobil berhasil dihapus!");
        return redirect()->back();
    }
}
