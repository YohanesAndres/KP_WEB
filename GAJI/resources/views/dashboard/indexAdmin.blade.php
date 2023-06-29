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
        <div class="sub-contentadmin"> 
            <div class="lingkaranadmin border-blue">
                <img class="souradmin" src="man.png" alt="">
            </div>
            <div class="subbadmin">
                <div>Jumlah Sopir</div>
                <div class="subb2admin">{{ $jumlahSopir }}</div>
            </div>
        </div>
        
        <div class="sub-contentadmin">
            <div class="lingkaranadmin border-ungu">
                <img class="souradmin" src="locate.png" alt="">
            </div>
            <div class="subbadmin">
                <div>Kendaraan Digunakan</div>
                <div class="subb2admin">{{count($update_mobil)}}</div>
            </div>
        </div>

        <div class="sub-contentadmin">
            <div class="lingkaranadmin border-red">
                <img class="souradmin" src="truk.png" alt="">
            </div>
            <div class="subbadmin">
                <div>Jumlah Kendaraan</div>
                <div class="subb2admin">{{count($kendaraan)}}</div>
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
    <th scope="col">Status </th>
    <th scope="col">Plat </th>
    <th scope="col">Keterangan </th>
  </tr>
</thead>
<tbody>
    @foreach($update_mobil as $key => $uang_jalanData)
  <tr>
      <td>{{ ++$key }}</td>
          <td>{{ date('Y-m-d',strtotime($uang_jalanData->tanggal)) }}</td>
          <td>{{ $uang_jalanData->status }}</td>
          <td>{{ $uang_jalanData->uangjalan->kendaraan->plat }}</td>
          <td>{{ $uang_jalanData->keterangan }}</td>
  </tr>
  @endforeach
</tbody>
</table>
</div>
    </div>
    </div>

@endsection