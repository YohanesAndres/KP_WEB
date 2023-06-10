@extends('layout.dashboard')
@section('content')
@php
$hasil=0;
foreach ($kas_uj as $kas_ujData) {
$hasil += $kas_ujData->jumlah_uang;
}


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
                <div>Fee Perusahaan</div>
                <div class="subb2">{{ number_format(ceil($fee), 0, ",", "." ) }}</div>
            </div>
        </div>
        
        <div class="sub-content">
            <div class="lingkaran border-ungu">
                <img class="sour" src="locate.png" alt="">
            </div>
            <div class="subb">
                <div>Update Mobil</div>
                <div class="subb2">{{count($update_mobil)}}</div>
            </div>
        </div>

        <div class="sub-content">
            <div class="lingkaran border-red">
                <img class="sour" src="truk.png" alt="">
            </div>
            <div class="subb">
                <div>Kendaraan</div>
                <div class="subb2">{{count($kendaraan)}}</div>
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
    <th scope="col">Plat </th>
    <th scope="col">Kategori </th>
    <!-- <th scope="col">Barcode</th> -->
    <th scope="col">Muat Bongkar </th>
    <th scope="col">Tujuan </th>
    <th scope="col">Uang Jalan </th>
    <th scope="col">Tanggal Bongkar </th>
    <th scope="col">Keterangan</th>
  </tr>
</thead>
<tbody>
    @foreach($uang_jalan as $key => $uang_jalanData)
  <tr>
      <td>{{ ++$key }}</td>
          <td>{{ date('Y-m-d',strtotime($uang_jalanData->tanggal)) }}</td>
          <td>{{ $uang_jalanData->kendaraan->plat }}</td>
          <td>{{ $uang_jalanData->kendaraan->kategori->nama }}</td>
          <!-- <td>{{ $uang_jalanData->barcode }}</td> -->
          <td>{{ $uang_jalanData->muatbongkar->muatBongkar }}</td>
          <td>{{ $uang_jalanData->muatbongkar->tujuan->tujuan }}</td>
          <td>{{ number_format($uang_jalanData->uang_Jalan,0,",","."); }}</td>
          <td>
            @if ($uang_jalanData->update_mobil->status == 'selesai')
              {{ $uang_jalanData->update_mobil->tanggal_bongkar ?? '' }}
            @endif
          <td>{{ $uang_jalanData->keterangan }}</td>
  </tr>
  @endforeach
</tbody>
</table>
</div>
    </div>
    </div>

@endsection