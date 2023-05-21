<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muat_bongkar;
use App\Models\tujuan;

class Muat_bongkar_Controller extends Controller
{
    public function index()
    {
        $muat_bongkar = Muat_bongkar::all();
        return view('muat_bongkar.index', compact('muat_bongkar'));
    }

    public function create()
    {
        $tabletujuanData = tujuan::all();

        return view('muat_bongkar.create', [
            'tabletujuanData' => $tabletujuanData
        ]);
    }

    public function getUangjalan($id)
    {
        $muat_bongkar = Muat_bongkar::find($id);

        return response()->json([
            'UangJalan' => $muat_bongkar
        ]);
    }

    public function getTujuan($id)
    {
        $muat_bongkar = Muat_bongkar::find($id);

        return response()->json([
            'Tujuan' => $muat_bongkar
        ]);
    }

    public function store(Request $request)
    {
        
        $muat_bongkar = new Muat_bongkar;
       
        $muat_bongkar->uang_jalan = $request->uang_jalan; 
        $muat_bongkar->muatBongkar = $request->muatBongkar; 
        $muat_bongkar->id_tujuan = $request->id_tujuan;
        $muat_bongkar->save();
        return redirect('/muat_bongkar')->with('info', 'Data sopir berhasil disimpan');
    }

    public function edit(Request $request, $id)
    {
       
        $muat_bongkar = Muat_bongkar::find($id);
        $tabletujuanData = tujuan::all();
        return view("muat_bongkar.edit", compact('muat_bongkar'), [
            'tabletujuanData' => $tabletujuanData
        ]);
    }

    public function update(Request $request, $id)
    {
        
        $muat_bongkar = Muat_bongkar::findOrFail($id);
    
        $muat_bongkar->uang_jalan = $request->uang_jalan; 
        $muat_bongkar->muatBongkar = $request->muatBongkar; 
        $muat_bongkar->id_tujuan = $request->id_tujuan; 
        $muat_bongkar->save();

        $request->session()->flash("info", "Data muat_bongkar berhasil diupdate!");
        return redirect()->route("muat_bongkar.index");
    }

    public function delete(Request $request, $id)
    {
        $muat_bongkar = Muat_bongkar::find($id);
        $muat_bongkar->delete();

        $request->session()->flash("info", "Data muat_bongkar berhasil dihapus!");
        return redirect()->back();
    }
}
