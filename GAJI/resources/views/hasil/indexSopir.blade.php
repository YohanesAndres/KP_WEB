@extends('layout.dashboardSopir')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <div class="text-white text-center text-title"> Detail Pendapatan Sopir</div>
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
        <th scope="col">Plat Kendaraan</th>
        <th scope="col">Nama Sopir</th>
        <th scope="col">Tujuan</th>
        <th scope="col">NETTO PKS</th>
        <th scope="col">NETTO BONGKAR</th>
        <th scope="col">SUSUT (KG)</th>
        <th scope="col">OVER TOLERANSI</th>
        <th scope="col">SISA SUSUT</th>
        <th scope="col">UPAH (RP/KG)</th>
        <th scope="col">TOTAL BONGKAR</th>
        <th scope="col">PENDAPATAN TOTAL</th>
        <th scope="col">UANG JALAN</th>
        <th scope="col">PENDAPATAN BERSIH</th>
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
            $totalBongkar = 0;
            $totalJumlah = 0;
        @endphp
        @foreach($hasil as $key => $rekap_fuso_detailData)
        <tr>
            <!-- <td>{{ ++$key }}</td> -->
            <td>{{ $rekap_fuso_detailData->UangJalan->nomorUJ }}</td>
            <td>{{ date('Y-m-d',strtotime($rekap_fuso_detailData->UangJalan->tanggal)) }}</td>
            <td>
                @if ($rekap_fuso_detailData->UangJalan->update_mobil->status == 'selesai')
                    {{ $rekap_fuso_detailData->UangJalan->update_mobil->tanggal_bongkar ?? '' }}
                @endif
            </td>
            <td>{{ $rekap_fuso_detailData->UangJalan->kendaraan->plat }}</td>
            <td>{{ $rekap_fuso_detailData->UangJalan->kendaraan->namasopir->name }}</td>
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
                @php
                    $totalBongkar = ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra ) - $sisaSusut;
                @endphp
                {{ number_format($totalBongkar, 0, ",", ".")  }}
            </td>
            <td>
                @php
                    $totalJumlah = $upah * $totalBongkar;
                @endphp
                {{ number_format($totalJumlah, 0, ",", ".")  }}
            </td>
            <td>{{ number_format($rekap_fuso_detailData->UangJalan->uang_Jalan, 0, ",", ".") }}</td>
            <td>
                {{ number_format($totalJumlah - ($rekap_fuso_detailData->UangJalan->uang_Jalan), 0, ",", ".") }}
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
