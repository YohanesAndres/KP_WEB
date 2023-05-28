<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class Kategori_Controller extends Controller
{
    public function index()
    {
     
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        
        $kategori = new Kategori;
       
        $kategori->nama = $request->nama; 
        $kategori->save();

        $request->session()->flash("info", "Data Kategori berhasil ditambahkan");
        return redirect()->route("kategori.create");
    }

    public function edit(Request $request, $id)
    {
       
        $kategori = Kategori::find($id);
        return view("kategori.edit", compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        
        $kategori = Kategori::findOrFail($id);
    
        $kategori->nama = $request->nama; 
        $kategori->save();

        $request->session()->flash("info", "Data kategori berhasil diupdate!");
        return redirect()->route("kategori.index");
    }

    public function delete(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        $request->session()->flash("info", "Data kategori berhasil dihapus!");
        return redirect()->back();
    }
}
