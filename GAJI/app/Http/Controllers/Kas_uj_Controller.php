<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kas_uj;

class Kas_uj_Controller extends Controller
{
    public function index()
    {
     
        $kas_uj = Kas_uj::all();
        return view('kas_uj.index', compact('kas_uj'));
    }

    public function create()
    {
        
        return view('kas_uj.create');
    }

    public function store(Request $request)
    {
        
        $kas_uj = new Kas_uj;
       
        $kas_uj->tanggal = $request->tanggal; 
        $kas_uj->jumlah_uang = $request->jumlah_uang; 
        $kas_uj->expenses = $request->expenses; 
        $kas_uj->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
       
        $kas_uj = Kas_uj::find($id);
        return view("kas_uj.edit", compact('kas_uj'));
    }

    public function update(Request $request, $id)
    {
        
        $kas_uj = Kas_uj::findOrFail($id);
    
        $kas_uj->tanggal = $request->tanggal; 
        $kas_uj->jumlah_uang = $request->jumlah_uang; 
        $kas_uj->expenses = $request->expenses; 
        $kas_uj->save();

        $request->session()->flash("info", "Data kas_uj berhasil diupdate!");
        return redirect()->route("kas_uj.index");
    }

    public function destroy(Request $request, $id)
    {
        $kas_uj = Kas_uj::find($id);
        $kas_uj->delete();

        $request->session()->flash("info", "Data kas_uj berhasil dihapus!");
        return redirect()->back();
    }
}
