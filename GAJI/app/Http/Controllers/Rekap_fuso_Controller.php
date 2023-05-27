<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekap_fuso;
use App\Models\Rekap_fuso_detail;
use App\Models\Uang_jalan;
use App\Models\Data_tonase;

class Rekap_fuso_Controller extends Controller
{
    public function index()
    {
     
        $rekap_fuso = Rekap_fuso::all();
        $rekap_fusoDetail = Rekap_fuso_detail::all();
        
        return view('rekap_fuso.index', compact('rekap_fuso', 'rekap_fusoDetail'));
    }

    public function hasil()
    {
     
        $hasil = Rekap_fuso_detail::all();
        
        return view('hasil.index', compact('hasil'));
    }

    public function create()
    {
        $tableDatatonase = Data_tonase::all();
        return view('rekap_fuso.create', [
            'tableDatatonase' => $tableDatatonase,
        ]);
    }

    public function createDetail()
    {
        $rekap_fuso_id = $_GET['rekap_fuso_id'] ?? null;
        $tableUangJalan = Uang_jalan::all();
        return view('rekap_fuso_detail.create',[
            'tableUangJalan' => $tableUangJalan,
            'rekap_fuso_id' => $rekap_fuso_id,
        ]);
    }

    public function store(Request $request)
    {
        
        $rekap_fuso = new Rekap_fuso;
       
        $rekap_fuso->alamat = $request->alamat; 
        $rekap_fuso->id_dataTonase = $request->id_dataTonase;
        $rekap_fuso->no_kontrak = $request->no_kontrak;  
        // $data_sebulan = uang_jalan::where('tujuan')
        $rekap_fuso->save();


        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function storeDetail(Request $request)
    {
        
        $rekap_fusoDetail = new Rekap_fuso_detail;
        
        $rekap_fusoDetail->rekap_fuso_id = $request->rekap_fuso_id;
        $rekap_fusoDetail->id_uang_jalan = $request->id_uang_jalan;
        $rekap_fusoDetail->quantity_muat_pks_bruto = $request->quantity_muat_pks_bruto; 
        $rekap_fusoDetail->quantity_muat_pks_tarra = $request->quantity_muat_pks_tarra; 
        $rekap_fusoDetail->quantity_bongkar_bruto = $request->quantity_bongkar_bruto; 
        $rekap_fusoDetail->quantity_bongkar_tarra = $request->quantity_bongkar_tarra; 
        $rekap_fusoDetail->mutu_pks_ffa_alb = $request->mutu_pks_ffa_alb; 
        $rekap_fusoDetail->mutu_pks_ka = $request->mutu_pks_ka; 
        $rekap_fusoDetail->mutu_bongkar_ffa_alb = $request->mutu_bongkar_ffa_alb;
        $rekap_fusoDetail->mutu_bongkar_ka = $request->mutu_bongkar_ka;
        $rekap_fusoDetail->save();
        
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $tableDatatonase = Data_tonase::all();
        $rekap_fuso = Rekap_fuso::find($id);
        return view("rekap_fuso.edit", compact('rekap_fuso'), [
            'tableDatatonase' => $tableDatatonase,
        ]);
    }

    public function editDetail(Request $request, $id)
    {
        $tableUangJalan = Uang_jalan::all();
        $rekap_fusoDetail = Rekap_fuso_detail::find($id);
        return view("rekap_fuso_detail.edit", compact('rekap_fusoDetail'), [
            'tableUangJalan' => $tableUangJalan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $rekap_fuso =Rekap_fuso::findOrFail($id);
    
        $rekap_fuso->alamat = $request->alamat; 
        $rekap_fuso->id_dataTonase = $request->id_dataTonase;
        $rekap_fuso->no_kontrak = $request->no_kontrak;  
        // $data_sebulan = uang_jalan::where('tujuan')
        $rekap_fuso->save();
        $request->session()->flash("info", "Data rekap_fuso berhasil diupdate!");
        return redirect()->route("rekap_fuso.index");
    }

    public function updateDetail(Request $request, $id)
    {
    
        $rekap_fusoDetail = Rekap_fuso_detail::findOrFail($id);
        
        $rekap_fusoDetail->id_uang_jalan = $request->id_uang_jalan;
        $rekap_fusoDetail->quantity_muat_pks_bruto = $request->quantity_muat_pks_bruto; 
        $rekap_fusoDetail->quantity_muat_pks_tarra = $request->quantity_muat_pks_tarra; 
        $rekap_fusoDetail->quantity_bongkar_bruto = $request->quantity_bongkar_bruto; 
        $rekap_fusoDetail->quantity_bongkar_tarra = $request->quantity_bongkar_tarra; 
        $rekap_fusoDetail->mutu_pks_ffa_alb = $request->mutu_pks_ffa_alb; 
        $rekap_fusoDetail->mutu_pks_ka = $request->mutu_pks_ka; 
        $rekap_fusoDetail->mutu_bongkar_ffa_alb = $request->mutu_bongkar_ffa_alb;
        $rekap_fusoDetail->mutu_bongkar_ka = $request->mutu_bongkar_ka;
        $rekap_fusoDetail->save();
        $request->session()->flash("info", "Data rekap_fuso_detail berhasil diupdate!");
        return redirect()->route("rekap_fuso.index");
    }

    public function delete(Request $request, $id)
    {
        $rekap_fuso = Rekap_fuso::find($id);
        $rekap_fuso->delete();

        $request->session()->flash("info", "Data rekap_fuso berhasil dihapus!");
        return redirect()->back();
    }

    public function deleteDetail(Request $request, $id)
    {
        $rekap_fuso_detail = Rekap_fuso_detail::find($id);
        $rekap_fuso_detail->delete();

        $request->session()->flash("info", "Data rekap_fuso berhasil dihapus!");
        return redirect()->back();
    }
}
