<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_tonase;
use App\Models\Muat_bongkar;
use App\Models\tujuan;

class Data_tonase_Controller extends Controller
{
    public function index()
    {
     
        $data_tonase = Data_tonase::all();
        return view('data_tonase.index', compact('data_tonase'));
    }

    public function create()
    {

        $tujuanData = tujuan::all();

        return view('data_tonase.create', [
            'tujuanData' => $tujuanData
        ]);
    }

    public function getTonase($id)
    {
        $data_tonase = Data_tonase::with('tujuan')->where('id',$id)->first();

        return response()->json([
            'Tonase' => $data_tonase
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'no_spk' => 'required',
            'no_do' => 'required',
            'tonase_actual' => 'required',
            'id_tujuan' => 'required',
        ],
        [
            'no_spk.required' => 'Data tidak boleh kosong !', 
            'no_do.required' => 'Data tidak boleh kosong !',
            'tonase_actual.required' => 'Data tidak boleh kosong !',
            'id_tujuan.required' => 'Silahkan pilih tujuan !',
        ]);
        
        $data_tonase = new Data_tonase;
       
        $data_tonase->no_spk = $request->no_spk; 
        $data_tonase->no_do = $request->no_do; 
        $data_tonase->tonase_actual = $request->tonase_actual; 
        $data_tonase->id_tujuan = $request->id_tujuan; 
        $data_tonase->save();
        $request->session()->flash("info", "Data Tonase berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {

        $tujuanData = tujuan::all();
        $data_tonase = data_tonase::find($id);

        return view('data_tonase.edit', [
            'data_tonase' => $data_tonase,
            'tujuanData' => $tujuanData,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'no_spk' => 'required',
            'no_do' => 'required',
            'tonase_actual' => 'required',
            'id_tujuan' => 'required',
        ],
        [
            'no_spk.required' => 'Data tidak boleh kosong !', 
            'no_do.required' => 'Data tidak boleh kosong !',
            'tonase_actual.required' => 'Data tidak boleh kosong !',
            'id_tujuan.required' => 'Silahkan pilih tujuan !',
        ]);
        
        $data_tonase = Data_tonase::findOrFail($id);
    
        $data_tonase->no_spk = $request->no_spk; 
        $data_tonase->no_do = $request->no_do; 
        $data_tonase->tonase_actual = $request->tonase_actual; 
        $data_tonase->id_tujuan = $request->id_tujuan; 
       
        $data_tonase->save();

        $request->session()->flash("info", "Data data_tonase berhasil diupdate!");
        return redirect()->route("data_tonase.index");
    }

    public function delete(Request $request, $id)
    {
        $data_tonase = Data_tonase::find($id);
        $data_tonase->delete();

        $request->session()->flash("info", "Data data_tonase berhasil dihapus!");
        return redirect()->back();
    }
}
