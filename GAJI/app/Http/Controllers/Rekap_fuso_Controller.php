<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekap_fuso;
use App\Models\Rekap_fuso_detail;
use App\Models\uang_jalan;

class Rekap_fuso_Controller extends Controller
{
    public function index()
    {
     
        $rekap_fuso = Rekap_fuso::all();
        $rekap_fusoDetail = Rekap_fuso_detail::all();
        return view('rekap_fuso.index', compact('rekap_fuso', 'rekap_fusoDetail'));
    }

    public function create()
    {
        
        return view('rekap_fuso.create');
    }

    public function createDetail()
    {
        
        return view('rekap_fuso_detail.create');
    }

    public function store(Request $request)
    {
        
        $rekap_fuso = new Rekap_fuso;
       
        $rekap_fuso->alamat = $request->alamat; 
        $rekap_fuso->muat_cpo = $request->muat_cpo; 
        $rekap_fuso->tujuan_bongkar = $request->tujuan_bongkar; 

        // $data_sebulan = uang_jalan::where('tujuan')

        $rekap_fuso->no_spk_tanggal = $request->no_spk_tanggal; 
        $rekap_fuso->no_kontrak_tanggal = $request->no_kontrak_tanggal; 
        $rekap_fuso->no_tanggal_do_besar = $request->no_tanggal_do_besar; 
        $rekap_fuso->quantity_do_ton = $request->quantity_do_ton; 
        $rekap_fuso->save();


        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function storeDetail(Request $request)
    {
        
        $rekap_fusoDetail = new Rekap_fuso_detail;

        $rekap_fuso->tanggal_muat = $request->tanggal_muat; 
        $rekap_fuso->tanggal_bongkar = $request->tanggal_bongkar; 
        $rekap_fuso->no_do = $request->no_do; 
        $rekap_fuso->id_kendaraan = $request->id_kendaraan; 
        $rekap->id_rekap_fuso = $request->id_rekap_fuso; 
        $rekap_fuso->nama_sopir = $request->nama_sopir; 
        $rekap_fuso->estimasi_tonase = $request->estimasi_tonase; 
        $rekap_fuso->id_uang_jalan = $request->id_uang_jalan;
        $rekap_fuso->quantity_muat_pks_bruto = $request->quantity_muat_pks_bruto; 
        $rekap_fuso->quantity_muat_pks_tarra = $request->quantity_muat_pks_tarra; 
        $rekap_fuso->quantity_bongkar_bruto = $request->quantity_bongkar_bruto; 
        $rekap_fuso->quantity_bongkar_tarra = $request->quantity_bongkar_tarra; 
        $rekap_fuso->mutu_pks_ffa_alb = $request->mutu_pks_ffa_alb; 
        $rekap_fuso->mutu_pks_ka = $request->mutu_pks_ka; 
        $rekap_fuso->mutu_bongkar_ffa_alb = $request->mutu_bongkar_ffa_alb;
        $rekap_fuso->mutu_bongkar_ka = $request->mutu_bongkar_ka;
        $rekap_fuso->save();
        
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
       
        $rekap_fuso = Rekap_fuso::find($id);
        return view("rekap_fuso.edit", compact('rekap_fuso'));
    }

    public function update(Request $request, $id)
    {
        
        $rekap_fuso =Rekap_fuso::findOrFail($id);
    
        $rekap_fuso->alamat = $request->alamat; 
        $rekap_fuso->muat_cpo = $request->muat_cpo; 
        $rekap_fuso->tujuan_bongkar = $request->tujuan_bongkar; 
        $rekap_fuso->no_spk_tanggal = $request->no_spk_tanggal; 
        $rekap_fuso->no_kontrak_tanggal = $request->no_kontrak_tanggal; 
        $rekap_fuso->no_tanggal_do_besar = $request->no_tanggal_do_besar; 
        $rekap_fuso->quantity_do_ton = $request->quantity_do_ton; 
        $rekap_fuso->save();
        $rekap_fuso->tanggal_muat = $request->tanggal_muat; 
        $rekap_fuso->tanggal_bongkar = $request->tanggal_bongkar; 
        $rekap_fuso->no_do = $request->no_do; 
        $rekap_fuso->id_kendaraan = $request->id_kendaraan; 
        $rekap->id_rekap_fuso = $request->id_rekap_fuso; 
        $rekap_fuso->nama_sopir = $request->nama_sopir; 
        $rekap_fuso->estimasi_tonase = $request->estimasi_tonase; 
        $rekap_fuso->id_uang_jalan = $request->id_uang_jalan;
        $rekap_fuso->quantity_muat_pks_bruto = $request->quantity_muat_pks_bruto; 
        $rekap_fuso->quantity_muat_pks_tarra = $request->quantity_muat_pks_tarra; 
        $rekap_fuso->quantity_bongkar_bruto = $request->quantity_bongkar_bruto; 
        $rekap_fuso->quantity_bongkar_tarra = $request->quantity_bongkar_tarra; 
        $rekap_fuso->mutu_pks_ffa_alb = $request->mutu_pks_ffa_alb; 
        $rekap_fuso->mutu_pks_ka = $request->mutu_pks_ka; 
        $rekap_fuso->mutu_bongkar_ffa_alb = $request->mutu_bongkar_ffa_alb;
        $rekap_fuso->mutu_bongkar_ka = $request->mutu_bongkar_ka;
        $request->session()->flash("info", "Data rekap_fuso berhasil diupdate!");
        return redirect()->route("rekap_fuso.index");
    }

    public function delete(Request $request, $id)
    {
        $rekap_fuso = Rekap_fuso::find($id);
        $rekap_fuso->delete();

        $request->session()->flash("info", "Data rekap_fuso berhasil dihapus!");
        return redirect()->back();
    }
}
