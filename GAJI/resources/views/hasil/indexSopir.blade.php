@extends('layout.dashboardSopir')
@section('content')
@php

$jumlahHasil = $hasil ? count($hasil) : 0;

@endphp


<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <div class="text-white text-center text-title"> Rekap Pendapatan Sopir</div>
    <br>
    <div class="text-white text-title"> Banyak Data = {{  $jumlahHasil  }}</div>
    <br>
    <div>
        <a href="/rekapsopirdetail" class="btn btn-edit">Lihat Seluruh Detail</a>
    </div>
  </div>
</div>
<hr>

<div class="bgtbl-container" style="margin-top:10px; margin-bottom:20px " >
  <table id="tabel-data"  width="100%" cellspacing="0" style=margin-right:200px>
    <thead>
      <tr>
        <!-- <th scope="col">No</th> -->
        <th scope="col">ID UangJalan</th>
        <th scope="col">Tanggal Muat</th>
        <th scope="col">Tanggal Bongkar</th>
        <th scope="col">PENDAPATAN BERSIH</th>
        <th scope="col">Detail</th>
        <!-- <th scope="col">Action</th> -->
      </tr>
    </thead>
    <tbody>
        @foreach($hasil as $key => $rekap_fuso_detailData)
        <tr>
            @php
            $totalTonase = 0;
            $totalNettoPKS = 0;
            $totalNettoBongkar = 0;
            $totalSusut = 0;
            $totalUangJalan = 0;
            $totalBongkar = 0;
            $totalJumlah = 0;

            $result = ($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra) - ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);
            if ($result < 0) {
                $result = 0;
            }

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

            $sisaSusut = ($result - ceil($uangjalans));
            if ($sisaSusut < 0) {
                $sisaSusut = 0;
            }

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

            $totalBongkar = ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra ) - $sisaSusut;

            $totalJumlah = $upah * $totalBongkar;
            @endphp
            <!-- <td>{{ ++$key }}</td> -->
            <td>{{ $rekap_fuso_detailData->UangJalan->nomorUJ }}</td>
            <td>{{ date('Y-m-d',strtotime($rekap_fuso_detailData->UangJalan->tanggal)) }}</td>
            <td>
                @if ($rekap_fuso_detailData->UangJalan->update_mobil->status == 'selesai')
                    {{ $rekap_fuso_detailData->UangJalan->update_mobil->tanggal_bongkar ?? '' }}
                @endif
            </td>
            <td>
                {{ number_format($totalJumlah - ($rekap_fuso_detailData->UangJalan->uang_Jalan), 0, ",", ".") }}
            </td>
            <td>
                <a href="/rekapsopir/{{ $rekap_fuso_detailData->id }}" class="btn btn-edit btn-lg text-center">Detail</a>
            </td>
            <!-- <td>
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
            </td> -->
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
    </tbody>
  </table>
</div>
@endsection

@section('script')
<script>
    // Menghapus riwayat kembali saat halaman dimuat
    window.onload = function() {
    if (window.history && window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    };
</script>
@endsection
