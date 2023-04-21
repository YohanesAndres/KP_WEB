<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_tonase;

class Data_tonase_Controller extends Controller
{
    public function index()
    {
     
        $data_tonase = Data_tonase::all();
        return view('data_tonase.index', compact('data_tonase'));
    }

    public function create()
    {
        
        return view('data_tonase.create');
    }

    public function store(Request $request)
    {
        
        $data_tonase = new Data_tonase;
       
        $data_tonase->no_spk = $request->no_spk; 
        $data_tonase->no_do = $request->no_do; 
        $data_tonase->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
       
        $data_tonase = Data_tonase::find($id);
        return view(".data_tonase.edit", compact('data_tonase'));
    }

    public function update(Request $request, $id)
    {
        
        $data_tonase = Data_tonase::findOrFail($id);
    
        $data_tonase->no_spk = $request->no_spk; 
        $data_tonase->no_do = $request->no_do; 
       
        $data_tonase->save();

        $request->session()->flash("info", "Data data_tonase berhasil diupdate!");
        return redirect()->route("data_tonase.index");
    }

    public function destroy(Request $request, $id)
    {
        $data_tonase = Data_tonase::find($id);
        $data_tonase->delete();

        $request->session()->flash("info", "Data data_tonase berhasil dihapus!");
        return redirect()->back();
    }
}
