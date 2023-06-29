<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekap_fuso;
use App\Models\Rekap_fuso_detail;
use App\Models\Uang_jalan;
use App\Models\Data_tonase;
use App\Models\Kas_uj;
use App\Models\Update_mobil;
use App\Models\Kendaraan;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kas_uj = Kas_uj::all();
        $rekap_fusoDetail = Rekap_fuso_detail::all();
        $hasil = Rekap_fuso_detail::all();
        $update_mobil = update_mobil::where(function ($query) {
            $query->orWhereNull('tanggal_bongkar');
        })
        ->get();
        $kendaraan = Kendaraan::all();
        $users = User::where('role', 'Sopir')->get();
        $uang_jalan=uang_jalan::latest()->limit(20)->get();
        return view('dashboard.index', compact('kas_uj', 'rekap_fusoDetail','update_mobil','kendaraan','uang_jalan','users','hasil'));
    }

    public function indexAdmin()
    {
        $kas_uj = Kas_uj::all();
        $rekap_fusoDetail = Rekap_fuso_detail::all();
        $update_mobil = update_mobil::where(function ($query) {
            $query->orWhereNull('tanggal_bongkar');
        })
        ->get();
        $users = User::where('role', 'Sopir')->get();
        $kendaraan = Kendaraan::all();
        $uang_jalan=uang_jalan::latest()->limit(20)->get();
        return view('dashboard.indexAdmin', compact('kas_uj', 'rekap_fusoDetail','update_mobil','kendaraan','uang_jalan','users'));
    }
}
