<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Namasopir;

class Namasopir_Controller extends Controller
{
    public function index()
    {
     
        $namasopir = Namasopir::all();
        return view('namasopir.index', compact('namasopir'));
    }

    public function create()
    {
        return view('namasopir.create');
    }

    public function store(Request $request)
    {
        
        $namasopir = new Namasopir;
       
        $namasopir->nama_sopir = $request->nama_sopir; 
        $namasopir->save();

        $request->session()->flash("info", "Data Sopir berhasil ditambahkan");
        return redirect()->route("namasopir.create");
        
    }

    public function edit(Request $request, $id)
    {
       
        $namasopir = Namasopir::find($id);
        return view("namasopir.edit", compact('namasopir'));
    }

    public function update(Request $request, $id)
    {
        
        $namasopir = Namasopir::findOrFail($id);
    
        $namasopir->nama_sopir = $request->nama_sopir; 
        $namasopir->save();

        $request->session()->flash("info", "Data namasopir berhasil diupdate!");
        return redirect()->route("namasopir.index");
    }

    public function delete(Request $request, $id)
    {
        $namasopir = Namasopir::find($id);
        $namasopir->delete();

        $request->session()->flash("info", "Data namasopir berhasil dihapus!");
        return redirect()->back();
    }

    
}
