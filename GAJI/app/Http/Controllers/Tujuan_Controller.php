<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tujuan;

class Tujuan_Controller extends Controller
{
    public function index()
    {
     
        $tujuan = tujuan::all();
        return view('tujuan.index', compact('tujuan'));
    }

    public function create()
    {
        return view('tujuan.create');
    }

    public function store(Request $request)
    {
        
        $tujuan = new tujuan;
       
        $tujuan->tujuan = $request->tujuan; 
        $tujuan->save();

        $request->session()->flash("info", "Data Tujuan berhasil ditambahkan");
        return redirect()->route("tujuan.create");

    }

    public function edit(Request $request, $id)
    {
       
        $tujuan = tujuan::find($id);
        return view("tujuan.edit", compact('tujuan'));
    }

    public function update(Request $request, $id)
    {
        
        $tujuan = tujuan::findOrFail($id);
    
        $tujuan->tujuan = $request->tujuan; 
        $tujuan->save();

        $request->session()->flash("info", "Data tujuan berhasil diupdate!");
        return redirect()->route("tujuan.index");
    }

    public function delete(Request $request, $id)
    {
        $tujuan = tujuan::find($id);
        $tujuan->delete();

        $request->session()->flash("info", "Data tujuan berhasil dihapus!");
        return redirect()->back();
    }
}
