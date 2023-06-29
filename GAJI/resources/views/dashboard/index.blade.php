@extends('layout.dashboard')
@section('content')
@php
$hasil=0;
foreach ($kas_uj as $kas_ujData) {
$hasil += $kas_ujData->jumlah_uang;
}

$jumlahSopir = $users ? count($users) : 0;


$fee = 0;
foreach ($rekap_fusoDetail as $rekap_fuso_detailData) {
    $uangjalans = ($rekap_fuso_detailData->UangJalan->uang_Jalan);
    if ($uangjalans < 0){
        $fee += 0;
    }
    elseif ($uangjalans < 200000) {
        $fee += 8 * ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);
    }
    elseif ($uangjalans >= 200001 && $uangjalans <= 1000000) {
        $fee += 15 * ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);
    }
    elseif ($uangjalans >= 1000001 && $uangjalans <= 2999999) {
        $fee += 24 * ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);;
    }
    else {
        $fee += 30 * ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);;
    }
}
@endphp
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

<div class="header">
        <div> Hello,Welcome Here</div>
        <div style="padding-right:25px; display:flex;flex-direction: column;
    align-items: center;">
            <div>{{Auth::user()->name}}</div>
            <div>{{Auth::user()->role}}</div>
        </div>
    </div>

    <div style="margin-left:-35px">
    <div class="content-dash">
        <div class="sub-content"> 
            <div class="lingkaran border-green">
                <img class="sour" src="Profit.png" alt="">
            </div>
            <div class="subb">
                <div>Jumlah Sopir</div>
                <div class="subb2">{{ $jumlahSopir }}</div>
            </div>
        </div>
        
        <div class="sub-content">
            <div class="lingkaran border-ungu">
                <img class="sour" src="locate.png" alt="">
            </div>
            <div class="subb">
                <div>Kendaraan Digunakan</div>
                <div class="subb2">{{count($update_mobil)}}</div>
            </div>
        </div>

        <div class="sub-content"> 
            <div class="lingkaran border-green">
                <img class="sour" src="Profit.png" alt="">
            </div>
            <div class="subb">
                <div>Fee Perusahaan</div>
                <div class="subb2">{{ number_format(ceil($fee), 0, ",", "." ) }}</div>
            </div>
        </div>

        <div class="sub-content">
            <div class="lingkaran border-blue ">
                <img class="sour" src="money.png" alt="">
            </div>
            <div class="subb">
                <div>Sisa Kas Uang Jalan</div>
                <div class="subb2">{{number_format($hasil,0,",",".");}}</div>
            </div>
        </div>
    </div>

    <div class="content1">
    <div class="bgtbl-container" style="margin-top:10px; margin-bottom:20px; background-color:white; width:980px; height:400px; overflow-x:hidden">
    <table id="tabel-data" class="table table-striped table-bordered " width="100%" cellspacing="0">

<thead>
  <tr>
  <th scope="col">No</th>
    <th scope="col">Tanggal Muat</th>
    <th scope="col">Tanggal Bongkar</th>
    <th scope="col">Plat Kendaraan</th>
    <th scope="col">Nama Sopir</th>
    <th scope="col">Tujuan</th>
    <th scope="col">PKS</th>
    <th scope="col">Bongkar</th>
    <th scope="col">Fee Perusahaan</th>
  </tr>
</thead>
<tbody>
    @foreach($rekap_fusoDetail as $key => $hasilData)
  <tr>
      <td>{{ ++$key }}</td>
        <td>{{ date('Y-m-d',strtotime($hasilData->UangJalan->tanggal)) }}</td>
        <td>
            @if ($hasilData->UangJalan->update_mobil->status == 'selesai')
                {{ $hasilData->UangJalan->update_mobil->tanggal_bongkar ?? '' }}
            @endif
        </td>
        <td>{{ $hasilData->UangJalan->kendaraan->plat }}</td>
        <td>{{ $hasilData->UangJalan->kendaraan->namasopir->name }}</td>
        <td>{{ $hasilData->UangJalan->muatbongkar->tujuan->tujuan }}</td>
        <td>{{ $hasilData->quantity_muat_pks_bruto - $hasilData->quantity_muat_pks_tarra }}</td>
        <td>{{ $hasilData->quantity_bongkar_bruto - $hasilData->quantity_bongkar_tarra }}</td>
        <td>
            @php
                $fee = 0;
                $uangjalans = ($hasilData->UangJalan->uang_Jalan);
                if ($uangjalans < 0){
                    $fee = 0;
                }
                elseif ($uangjalans < 200000) {
                    $fee = 8 * ($hasilData->quantity_bongkar_bruto - $hasilData->quantity_bongkar_tarra);
                }
                elseif ($uangjalans >= 200001 && $uangjalans <= 1000000) {
                    $fee = 15 * ($hasilData->quantity_bongkar_bruto - $hasilData->quantity_bongkar_tarra);
                }
                elseif ($uangjalans >= 1000001 && $uangjalans <= 2999999) {
                    $fee = 24 * ($hasilData->quantity_bongkar_bruto - $hasilData->quantity_bongkar_tarra);;
                }
                else {
                    $fee = 30 * ($hasilData->quantity_bongkar_bruto - $hasilData->quantity_bongkar_tarra);;
                }
            @endphp
            {{ number_format($fee, 0, ",", "." ) }}
        </td>
  </tr>
  @endforeach
</tbody>
</table>
</div>
    </div>
    </div>

@endsection