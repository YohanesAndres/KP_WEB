@extends('layout.dashboard')
@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title">
  <a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a>
  <h1 style="display:inline;" class="text-white text-center">Hasil</h1>
</div>

<div class="bgtbl">
  <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal Muat</th>
        <th scope="col">Tanggal Bongkar</th>
        <th scope="col">Plat Kendaraan</th>
        <th scope="col">Nama Sopir</th>
        <th scope="col">PKS</th>
        <th scope="col">NETTO PKS</th>
        <th scope="col">NETTO BONGKAR</th>
        <th scope="col">SUSUT (KG)</th>
        <th scope="col">OVER TOLERANSI</th>
        <th scope="col">SISA SUSUT</th>
        <th scope="col">UPAH (RP/KG)</th>
        <th scope="col">JUMLAH</th>
        <th scope="col">UANG JALAN</th>
        <th scope="col">HASIL</th>
        <th scope="col">FEE</th>
        <!-- <th scope="col">Action</th> -->
      </tr>
    </thead>
    <tbody>
        @php
            $totalTonase = 0;
            $totalNettoPKS = 0;
            $totalNettoBongkar = 0;
            $totalSusut = 0;
            $totalUangJalan = 0;
        @endphp
        @foreach($hasil as $key => $rekap_fuso_detailData)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ date('Y-m-d',strtotime($rekap_fuso_detailData->UangJalan->tanggal)) }}</td>
            <td></td>
            <td>{{ $rekap_fuso_detailData->UangJalan->kendaraan->plat }}</td>
            <td>{{ $rekap_fuso_detailData->UangJalan->namaSopir->nama_sopir }}</td>
            <td>{{ $rekap_fuso_detailData->UangJalan->muatbongkar->tujuan->tujuan }}</td>
            <td>{{ $rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra }}</td>
            <td>{{ $rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra }}</td>
            <td>
                @php
                    $result = ($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra) - ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);
                    if ($result < 0) {
                        $result = 0;
                    }
                @endphp
                {{ $result }}
            </td>
            <td>
                @php
                    $uangjalans = ($rekap_fuso_detailData->UangJalan->uang_Jalan);
                    if ($uangjalans < 0){
                        $uangjalans = 0;
                    }
                    elseif ($uangjalans < 200000) {
                        $uangjalans = 0.002*($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
                    }
                    elseif ($uangjalans >= 200001 && $uangjalans <= 1000000) {
                        $uangjalans = 0.003*($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
                    }
                    elseif ($uangjalans >= 1000001 && $uangjalans <= 2999999) {
                        $uangjalans = 0.003*($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
                    }
                    else {
                        $uangjalans = 0.002*($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
                    }
                @endphp
                {{ number_format(ceil($uangjalans), 0, ",", "." ) }}
            </td>
            <td>
                @php
                    $sisaSusut = ($result - ceil($uangjalans));
                    if ($sisaSusut < 0) {
                        $sisaSusut = 0;
                    }
                @endphp
                {{ number_format($sisaSusut, 0, ",", "." )}}
            </td>
            <td>
                @php
                    $upah = 0;
                    $uangjalans = ($rekap_fuso_detailData->UangJalan->uang_Jalan);
                    if ($uangjalans < 0){
                        $upah = 0;
                    }
                    elseif ($uangjalans < 200000) {
                        $upah = 65;
                    }
                    elseif ($uangjalans >= 200001 && $uangjalans <= 1000000) {
                        $upah = 140;
                    }
                    elseif ($uangjalans >= 1000001 && $uangjalans <= 2999999) {
                        $upah = 220;
                    }
                    else {
                        $upah = 335;
                    }
                @endphp
                {{ number_format($upah, 0, ",", "." ) }}
            </td>
            <td>
                {{ number_format($upah * ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra), 0, ",", ".")  }}
            </td>
            <td>{{ number_format($rekap_fuso_detailData->UangJalan->uang_Jalan, 0, ",", ".") }}</td>
            <td>
                {{ number_format($upah * ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra) - ($rekap_fuso_detailData->UangJalan->uang_Jalan), 0, ",", ".") }}
            </td>
            <td>
                @php
                    $fee = 0;
                    $uangjalans = ($rekap_fuso_detailData->UangJalan->uang_Jalan);
                    if ($uangjalans < 0){
                        $fee = 0;
                    }
                    elseif ($uangjalans < 200000) {
                        $fee = 8 * ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);
                    }
                    elseif ($uangjalans >= 200001 && $uangjalans <= 1000000) {
                        $fee = 15 * ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);
                    }
                    elseif ($uangjalans >= 1000001 && $uangjalans <= 2999999) {
                        $fee = 24 * ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);;
                    }
                    else {
                        $fee = 30 * ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);;
                    }
                @endphp
                {{ number_format($fee, 0, ",", "." ) }}
            </td>
            <!-- <td>
                <a href="/rekap_fusoDetail/edit/{{ $rekap_fuso_detailData->id }}" class="btn btn-primary">Edit</a>
                <form action="{{ url('/rekap_fusoDetail/delete/'.$rekap_fuso_detailData->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td> -->
        </tr>
        <!-- @php
            $totalTonase += $rekap_fuso_detailData->UangJalan->kendaraan->tonase;
            $totalNettoPKS += ($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
            $totalNettoBongkar += ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);
            $totalSusut += $result;
            $totalUangJalan += $rekap_fuso_detailData->UangJalan->uang_Jalan;
        @endphp -->
        @endforeach
        <!-- <tr>
            <td>TOTAL</td>
            <td colspan="4"></td>
            <td>{{ number_format($totalTonase, 0, ",", ".") }}</td>
            <td></td>
            <td></td>
            <td>{{ number_format($totalNettoPKS, 0, ",", ".") }}</td>
            <td></td>
            <td></td>
            <td>{{ number_format($totalNettoBongkar, 0, ",", ".") }}</td>
            <td>{{ number_format($totalSusut, 0, ",", ".") }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ number_format($totalUangJalan, 0, ",", ".") }}</td>
            <td></td>
        </tr> -->
    </tbody>
  </table>
</div>
@endsection
