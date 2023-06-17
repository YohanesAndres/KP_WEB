<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kas_uj;
use DB;

class Kas_uj_Controller extends Controller
{
    public function index()
    {
     
        $kas_uj = Kas_uj::all();
        return view('kas_uj.index', compact('kas_uj'));
    }

    public function create()
    {
        
        return view('kas_uj.create');
    }

    public function create_daribos()
    {
        
        return view('kas_uj.createdaribos');
    }
    public function store_daribos(Request $request)
    {
        $validation = $request->validate([
            'tanggal' => 'required',
            'expenses' => 'required',
            'jumlah_uang' => 'required',
        ],
        [
            'tanggal.required' => 'Tanggal tidak boleh kosong !', 
            'expenses.required' => 'Silahkan pilih expenses !',
            'jumlah_uang.required' => 'Data tidak boleh kosong !',
        ]);
        
        $kas_uj = new Kas_uj;
       
        $kas_uj->tanggal = $request->tanggal; 
        $kas_uj->expenses = $request->expenses; 
        $kas_uj->jumlah_uang = $request->jumlah_uang;
        $kas_uj->dari_bos = 1; 
        $kas_uj->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    
    public function create_credit()
    {
        
        return view('kas_uj.createcredit');
    }
    public function store_credit(Request $request)
    {
        $validation = $request->validate([
            'tanggal' => 'required',
            'expenses' => 'required',
            'jumlah_uang' => 'required',
        ],
        [
            'tanggal.required' => 'Tanggal tidak boleh kosong !', 
            'expenses.required' => 'Silahkan pilih expenses !',
            'jumlah_uang.required' => 'Data tidak boleh kosong !',
        ]);
        
        $kas_uj = new Kas_uj;
       
        $kas_uj->tanggal = $request->tanggal; 
        $kas_uj->expenses = $request->expenses; 
        $kas_uj->jumlah_uang = $request->jumlah_uang;
        $kas_uj->dari_bos = 0; 
        $kas_uj->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }


    public function create_debit()
    {
        
        return view('kas_uj.createdebit');
    }
    public function store_debit(Request $request)
    {
        $validation = $request->validate([
            'tanggal' => 'required',
            'expenses' => 'required',
            'jumlah_uang' => 'required',
        ],
        [
            'tanggal.required' => 'Tanggal tidak boleh kosong !', 
            'expenses.required' => 'Silahkan pilih expenses !',
            'jumlah_uang.required' => 'Data tidak boleh kosong !',
        ]);
        
        $kas_uj = new Kas_uj;
       
        $kas_uj->tanggal = $request->tanggal; 
        $kas_uj->expenses = $request->expenses; 
        $kas_uj->jumlah_uang = $request->jumlah_uang*-1;
        $kas_uj->dari_bos = 0; 
        $kas_uj->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }


    public function store(Request $request)
    {
        $totaluj=DB::table('uang_jalan')->whereDate('tanggal',$request->tanggal)->get();
        $sum = 0;
        foreach ($totaluj as $value) {
            $sum += $value->uang_Jalan;
        }
        $kas_uj = new Kas_uj;
       
        $kas_uj->tanggal = $request->tanggal; 
        $kas_uj->expenses = $request->expenses; 
        $kas_uj->jumlah_uang = $sum*-1;
        $kas_uj->dari_bos = 0; 
        $kas_uj->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
       
        $kas_uj = Kas_uj::find($id);
        return view("kas_uj.edit", compact('kas_uj'));
    }

    public function update(Request $request, $id)
    {
        
        $kas_uj = Kas_uj::findOrFail($id);
    
        $kas_uj->tanggal = $request->tanggal; 
        $kas_uj->expenses = $request->expenses; 
        $kas_uj->jumlah_uang = $request->jumlah_uang; 
        $kas_uj->dari_bos = $request->dari_bos ?? 0; 


        $kas_uj->save();

        $request->session()->flash("info", "Data kas_uj berhasil diupdate!");
        return redirect()->route("kas_uj.index");
    }

    public function delete(Request $request, $id)
    {
        $kas_uj = Kas_uj::find($id);
        $kas_uj->delete();

        $request->session()->flash("info", "Data kas_uj berhasil dihapus!");
        return redirect()->back();
    }
}
