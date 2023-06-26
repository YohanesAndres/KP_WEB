<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Namasopir;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $validation = $request->validate([
            'nama_sopir' => 'required',
            'idSopir' => 'required',
            'alamat' => 'required',
            'NIK' => 'required',
            'foto' => 'required|image|max:2048', // Aturan validasi untuk foto
        ],
        [
            'nama_sopir.required' => 'Nama tidak boleh kosong !',
            'idSopir.required' => 'ID tidak boleh kosong !',
            'alamat.required' => 'Alamat tidak boleh kosong !',
            'NIK.required' => 'NIK tidak boleh kosong !',
            'foto.required' => 'Foto tidak boleh kosong!',
            'foto.image' => 'File harus berupa gambar!',
            'foto.max' => 'Ukuran file foto maksimal 2MB!',
        ]);

        $ext = $request->foto->getClientOriginalExtension();
        $nama_file = $request->idSopir.'-'.time().".".$ext;
        $path = $request->foto->storeAs("public",$nama_file);
    
        $namasopir = new Namasopir;
        $namasopir->idSopir = $request->idSopir; 
        $namasopir->nama_sopir = $request->nama_sopir; 
        $namasopir->alamat = $request->alamat; 
        $namasopir->NIK = $request->NIK; 
        $namasopir->foto = $nama_file; // Menyimpan nama file foto ke dalam kolom 'foto'
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
        $validation = $request->validate([
            'nama_sopir' => 'required',
            'idSopir' => 'required',
            'alamat' => 'required',
            'NIK' => 'required',
            'foto' => 'image|max:2048', // Aturan validasi untuk foto saat update
        ],
        [
            'nama_sopir.required' => 'Nama tidak boleh kosong!',
            'idSopir.required' => 'ID tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'NIK.required' => 'NIK tidak boleh kosong!',
            'foto.image' => 'File harus berupa gambar!',
            'foto.max' => 'Ukuran file foto maksimal 2MB!',
        ]);

        $ext = $request->foto->getClientOriginalExtension();
        $nama_file = $request->idSopir.'-'.time().".".$ext;
        $path = $request->foto->storeAs("public",$nama_file);

        $namasopir = Namasopir::findOrFail($id);
        $namasopir->idSopir = $request->idSopir; 
        $namasopir->nama_sopir = $request->nama_sopir; 
        $namasopir->alamat = $request->alamat; 
        $namasopir->NIK = $request->NIK; 
        $namasopir->foto = $nama_file; // Menyimpan nama file foto ke dalam kolom 'foto'
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
