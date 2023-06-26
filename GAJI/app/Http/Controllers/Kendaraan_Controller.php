<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Namasopir;
use App\Models\Kategori;
use Illuminate\Validation\Rule;

class Kendaraan_Controller extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::with('namasopir', 'kategori')->get();
    
        return view('kendaraan.index', compact('kendaraan'));
    }

    public function create()
    {
        $tablekategoriData = Kategori::all();
        $tablenamasopirData = Namasopir::all();

        return view('kendaraan.create', [
            'tablekategoriData' => $tablekategoriData,
            'tablenamasopirData' => $tablenamasopirData,
        ]);
    }

    public function getKategori($id)
    {
        $kendaraan = Kendaraan::find($id);
        $kategori = $kendaraan->kategori;

        return response()->json([
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'plat' => 'required|unique:kendaraan,plat',
            'tonase' => 'required',
            'id_namasopir' => 'required',
            'kategori' => 'required',
        ],
        [
            'plat.required' => 'Plat tidak boleh kosong !', 
            'plat.unique' => 'Plat sudah ada, harap masukkan plat yang berbeda !',
            'tonase.required' => 'Tonase tidak boleh kosong !',
            'id_namasopir.required' => 'Silahkan pilih nama sopir !',
            'kategori.required' => 'Kategori tidak boleh kosong !',
        ]);
        
        $kendaraan = new Kendaraan;
       
        $kendaraan->plat = $request->plat; 
        $kendaraan->tonase = $request->tonase; 
        $kendaraan->id_namasopir = $request->id_namasopir; 
        $kendaraan->kategori = $request->kategori; 
        $kendaraan->save();

        $request->session()->flash("info", "Data Kendaraan berhasil ditambahkan");
        return redirect()->route("kendaraan.create");

    }

    public function edit(Request $request, $id)
    {
       
        $kendaraan = Kendaraan::find($id);
        $tablekategoriData = Kategori::all();
        $tablenamasopirData = Namasopir::all();

        return view('kendaraan.edit', [
            'kendaraan' => $kendaraan,
            'tablekategoriData' => $tablekategoriData,
            'tablenamasopirData' => $tablenamasopirData,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'plat' => [
                'sometimes',
                'required',
                Rule::unique('kendaraan', 'plat')->ignore($request->id),
            ],
        
            'tonase' => 'required',
            'id_namasopir' => 'required',
            'kategori' => 'required',
        ],
        [
            'plat.required' => 'Plat tidak boleh kosong !', 
            'plat.unique' => 'Plat sudah ada, harap masukkan plat yang berbeda !',
            'tonase.required' => 'Tonase tidak boleh kosong !',
            'id_namasopir.required' => 'Silahkan pilih nama sopir !',
            'kategori.required' => 'Kategori tidak boleh kosong !',
        ]);
        
        $kendaraan = Kendaraan::findOrFail($id);
    
        $kendaraan->plat = $request->plat; 
        $kendaraan->tonase = $request->tonase; 
        $kendaraan->id_namasopir = $request->id_namasopir; 
        $kendaraan->kategori = $request->kategori; 
        $kendaraan->save();

        $request->session()->flash("info", "Data kendaraan berhasil diupdate!");
        return redirect()->route("kendaraan.index");
    }

    public function delete(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->delete();

        $request->session()->flash("info", "Data kendaraan berhasil dihapus!");
        return redirect()->back();
    }
}
