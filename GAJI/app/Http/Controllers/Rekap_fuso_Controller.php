<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Rekap_fuso;
use App\Models\Rekap_fuso_detail;
use App\Models\Uang_jalan;
use App\Models\Data_tonase;
use App\Models\Update_mobil;

class Rekap_fuso_Controller extends Controller
{
    public function index()
    {
        $sopirId = auth()->user()->id; // Mendapatkan ID sopir yang sedang login
    
        $rekap_fuso = Rekap_fuso::all();
        $rekap_fusoDetail = Rekap_fuso_detail::all();
        
        return view('rekap_fuso.index', compact('rekap_fuso', 'rekap_fusoDetail'));
    }

    public function hasil()
    {
        $hasil = Rekap_fuso_detail::all();
        
        return view('hasil.index', compact('hasil'));
    }

    public function hasilSopir()
    {
        $sopirId = auth()->user()->id; // Mendapatkan ID sopir yang sedang login
        $hasil = Rekap_fuso_detail::whereHas('UangJalan.kendaraan.namasopir', function ($query) use ($sopirId) {
            $query->where('users.id', $sopirId);
        })->get();
        
        return view('hasil.indexSopir', compact('hasil'));
    }

    public function create()
    {
        // Mendapatkan ID nomor DO yang sudah dipilih sebelumnya
        $selectedDoIds = Rekap_fuso::pluck('id_dataTonase')->toArray();
        // Memfilter nomor DO yang belum dipilih
        $tableDatatonase = Data_tonase::whereNotIn('id', $selectedDoIds)->get();
        return view('rekap_fuso.create', [
            'tableDatatonase' => $tableDatatonase,
        ]);
    }

    public function createDetail()
    {
        $rekap_fuso_id = $_GET['rekap_fuso_id'] ?? null;
        $selectedUangJalanIds = Rekap_fuso_detail::pluck('id_uang_jalan')->toArray();
        $rekap_fuso = Rekap_fuso::find($rekap_fuso_id);
        $tableUangJalan = Uang_jalan::all();
        $update_mobil= update_mobil::where('tanggal_bongkar','<>','')->with('uangjalan')->whereNotIn('id', $selectedUangJalanIds)->get();
        return view('rekap_fuso_detail.create',[
            'tableUangJalan' => $tableUangJalan,
            'rekap_fuso_id' => $rekap_fuso_id,
            'update_mobil' =>$update_mobil,
            'rekap_fuso' =>$rekap_fuso,
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'id_dataTonase' => 'required',
            'no_kontrak' => 'required|unique:rekap_fuso,no_kontrak,idExcept',
        ],
        [
            'no_kontrak.unique' => 'NO Kontrak sudah ada di database !',
            'no_kontrak.required' => 'Data tidak boleh kosong !',
            'id_dataTonase.required' => 'Silahkan pilih No DO !',
        ]);
        
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
        $validatedData = $request->validate([
            'id_uang_jalan' => 'required',
            'quantity_muat_pks_bruto' => 'required',
            'quantity_muat_pks_tarra' => 'required',
            'quantity_bongkar_bruto' => 'required',
            'quantity_bongkar_tarra' => 'required',
            'mutu_pks_ffa_alb' => 'required',
            'mutu_pks_ka' => 'required',
            'mutu_bongkar_ffa_alb' => 'required',
            'mutu_bongkar_ka' => 'required',
        ],
        [
            'id_uang_jalan.required' => 'Silahkan pilih tanggal muat !',
            'quantity_muat_pks_bruto.required' => 'Data tidak boleh kosong !',
            'quantity_muat_pks_tarra.required' => 'Data tidak boleh kosong !',
            'quantity_bongkar_bruto.required' => 'Data tidak boleh kosong !',
            'quantity_bongkar_tarra.required' => 'Data tidak boleh kosong !',
            'mutu_pks_ffa_alb.required' => 'Data tidak boleh kosong !',
            'mutu_pks_ka.required' => 'Data tidak boleh kosong !',
            'mutu_bongkar_ffa_alb.required' => 'Data tidak boleh kosong !',
            'mutu_bongkar_ka.required' => 'Data tidak boleh kosong !',
        ]);
        
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
        $selectedDoIds = Rekap_fuso::pluck('id_dataTonase')->toArray();
        $rekap_fuso = Rekap_fuso::find($id);

        $tableDatatonase = Data_tonase::whereNotIn('id', $selectedDoIds);

        if ($rekap_fuso->id_dataTonase) {
            $tableDatatonase->orWhere('id', $rekap_fuso->id_dataTonase);
        }

        $tableDatatonase = $tableDatatonase->get();

        return view("rekap_fuso.edit", compact('rekap_fuso'), [
            'tableDatatonase' => $tableDatatonase,
        ]);
    }

    public function editDetail(Request $request, $id)
    {
        $rekap_fuso_id = $_GET['rekap_fuso_id'] ?? null;
        $selectedUangJalanIds = Rekap_fuso_detail::pluck('id_uang_jalan')->toArray();
        $rekap_fuso = Rekap_fuso::find($rekap_fuso_id);
        $tableUangJalan = Uang_jalan::all();
        $rekap_fusoDetail = Rekap_fuso_detail::find($id);
        $update_mobil= update_mobil::where('tanggal_bongkar','<>','')->with('uangjalan')->whereNotIn('id', $selectedUangJalanIds);
        if ($rekap_fusoDetail->id_uang_jalan) {
            $update_mobil->orWhere('id', $rekap_fusoDetail->id_uang_jalan);
        }

        $update_mobil = $update_mobil->get();

        return view("rekap_fuso_detail.edit", compact('rekap_fusoDetail'), [
            'tableUangJalan' => $tableUangJalan,
            'update_mobil' =>$update_mobil,
            'rekap_fuso' =>$rekap_fuso,
            'rekap_fuso_id' => $rekap_fuso_id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'id_dataTonase' => 'required',
            'no_kontrak' => 'required|unique:rekap_fuso,no_kontrak,'.$id,
        ],
        [
            'no_kontrak.unique' => 'NO Kontrak sudah ada di database !',
            'no_kontrak.required' => 'Data tidak boleh kosong !',
            'id_dataTonase.required' => 'Silahkan pilih No DO !',
        ]);
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
        $validatedData = $request->validate([
            'id_uang_jalan' => 'required',
            'quantity_muat_pks_bruto' => 'required',
            'quantity_muat_pks_tarra' => 'required',
            'quantity_bongkar_bruto' => 'required',
            'quantity_bongkar_tarra' => 'required',
            'mutu_pks_ffa_alb' => 'required',
            'mutu_pks_ka' => 'required',
            'mutu_bongkar_ffa_alb' => 'required',
            'mutu_bongkar_ka' => 'required',
        ],
        [
            'id_uang_jalan.required' => 'Silahkan pilih tanggal muat !',
            'quantity_muat_pks_bruto.required' => 'Data tidak boleh kosong !',
            'quantity_muat_pks_tarra.required' => 'Data tidak boleh kosong !',
            'quantity_bongkar_bruto.required' => 'Data tidak boleh kosong !',
            'quantity_bongkar_tarra.required' => 'Data tidak boleh kosong !',
            'mutu_pks_ffa_alb.required' => 'Data tidak boleh kosong !',
            'mutu_pks_ka.required' => 'Data tidak boleh kosong !',
            'mutu_bongkar_ffa_alb.required' => 'Data tidak boleh kosong !',
            'mutu_bongkar_ka.required' => 'Data tidak boleh kosong !',
        ]);
    
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
