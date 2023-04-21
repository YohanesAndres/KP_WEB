<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muat_bongkar;

class Muat_bongkar_Controller extends Controller
{
    public function index()
    {
     
        $muat_bongkar = Muat_bongkar::all();
        return view('muat_bongkar.index', compact('muat_bongkar'));
    }

    public function create()
    {
        
        return view('muat_bongkar.create');
    }

    public function store(Request $request)
    {
        
        $muat_bongkar = new Muat_bongkar;
       
        $muat_bongkar->uang_jalan = $request->uang_jalan; 
        $muat_bongkar->muatBongkar = $request->muatBongkar; 
        $muat_bongkar->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
       
        $muat_bongkar = Muat_bongkar::find($id);
        return view("muat_bongkar.edit", compact('muat_bongkar'));
    }

    public function update(Request $request, $id)
    {
        
        $muat_bongkar = Muat_bongkar::findOrFail($id);
    
        $muat_bongkar->uang_jalan = $request->uang_jalan; 
        $muat_bongkar->muatBongkar = $request->muatBongkar; 
        $muat_bongkar->save();

        $request->session()->flash("info", "Data muat_bongkar berhasil diupdate!");
        return redirect()->route("muat_bongkar.index");
    }

    public function destroy(Request $request, $id)
    {
        $muat_bongkar = Muat_bongkar::find($id);
        $muat_bongkar->delete();

        $request->session()->flash("info", "Data muat_bongkar berhasil dihapus!");
        return redirect()->back();
    }
}
