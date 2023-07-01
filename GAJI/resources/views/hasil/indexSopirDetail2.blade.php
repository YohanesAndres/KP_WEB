@extends('layout.dashboardSopir')
@section('content')

<link href="{{ asset('/css/gaji.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
    <a href="{{ route('hasil.indexSopir') }}"><img src="{{ asset('back.svg')}}" alt=""></a> 
  <div>
    <div class="text-white text-center text-title"> Detail Pendapatan Sopir</div>
  </div>
</div>
<hr>

<div class="bgtbl-container" style="margin-top:10px; margin-bottom:20px " >
  <table class="table-detail">
    <tbody>
      <tr>
        <th>ID UangJalan:</th>
        <td>{{ $hasil->UangJalan->nomorUJ }}</td>
      </tr>
      <tr>
        <th>Tanggal Muat:</th>
        <td>{{ date('Y-m-d',strtotime($hasil->UangJalan->tanggal)) }}</td>
      </tr>
      <tr>
        <th>Tanggal Bongkar:</th>
        <td>
          @if ($hasil->UangJalan->update_mobil->status == 'selesai')
            {{ $hasil->UangJalan->update_mobil->tanggal_bongkar ?? '' }}
          @endif
        </td>
      </tr>
      <tr>
        <th>Plat Kendaraan:</th>
        <td>{{ $hasil->UangJalan->kendaraan->plat }}</td>
      </tr>
      <tr>
        <th>Nama Sopir:</th>
        <td>{{ $hasil->UangJalan->kendaraan->namasopir->name }}</td>
      </tr>
      <tr>
        <th>Muat Bongkar:</th>
        <td>{{ $hasil->UangJalan->muatbongkar->muatBongkar }}</td>
      </tr>
      <tr>
        <th>Tujuan:</th>
        <td>{{ $hasil->UangJalan->muatbongkar->tujuan->tujuan }}</td>
      </tr>
      <tr>
        <th>NETTO PKS:</th>
        <td>{{ $hasil->quantity_muat_pks_bruto - $hasil->quantity_muat_pks_tarra }}</td>
      </tr>
      <tr>
        <th>NETTO BONGKAR:</th>
        <td>{{ $hasil->quantity_bongkar_bruto - $hasil->quantity_bongkar_tarra }}</td>
      </tr>
      <tr>
        <th>SUSUT (KG):</th>
        <td>
          @php
            $result = ($hasil->quantity_muat_pks_bruto - $hasil->quantity_muat_pks_tarra) - ($hasil->quantity_bongkar_bruto - $hasil->quantity_bongkar_tarra);
            if ($result < 0) {
                $result = 0;
            }
            echo $result;
          @endphp
        </td>
      </tr>
      <tr>
        <th>OVER TOLERANSI:</th>
        <td>
          @php
            $uangjalans = ($hasil->UangJalan->uang_Jalan);
            if ($uangjalans < 0){
                $uangjalans = 0;
            }
            elseif ($uangjalans < 200000) {
                $uangjalans = 0.002*($hasil->quantity_muat_pks_bruto - $hasil->quantity_muat_pks_tarra);
            }
            elseif ($uangjalans >= 200001 && $uangjalans <= 1000000) {
                $uangjalans = 0.003*($hasil->quantity_muat_pks_bruto - $hasil->quantity_muat_pks_tarra);
            }
            elseif ($uangjalans >= 1000001 && $uangjalans <= 2999999) {
                $uangjalans = 0.003*($hasil->quantity_muat_pks_bruto - $hasil->quantity_muat_pks_tarra);
            }
            else {
                $uangjalans = 0.002*($hasil->quantity_muat_pks_bruto - $hasil->quantity_muat_pks_tarra);
            }
            echo number_format(ceil($uangjalans), 0, ",", "." );
          @endphp
        </td>
      </tr>
      <tr>
        <th>SISA SUSUT:</th>
        <td>
          @php
            $uangjalans = ($hasil->UangJalan->uang_Jalan);
            $sisaSusut = ($result - ceil($uangjalans));
            if ($sisaSusut < 0) {
                $sisaSusut = 0;
            }
            echo number_format($sisaSusut, 0, ",", "." );
          @endphp
        </td>
      </tr>
      <tr>
        <th>UPAH (RP/KG):</th>
        <td>
          @php
            $upah = 0;
            $uangjalans = ($hasil->UangJalan->uang_Jalan);
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
            echo number_format($upah, 0, ",", ".");
          @endphp
        </td>
      </tr>
      <tr>
        <th>TOTAL BONGKAR:</th>
        <td>
          @php
            $totalBongkar = ($hasil->quantity_bongkar_bruto - $hasil->quantity_bongkar_tarra ) - $sisaSusut;
            echo number_format($totalBongkar, 0, ",", ".");
          @endphp
        </td>
      </tr>
      <tr>
        <th>PENDAPATAN TOTAL:</th>
        <td>
          @php
            $totalJumlah = $upah * $totalBongkar;
            echo number_format($totalJumlah, 0, ",", ".");
          @endphp
        </td>
      </tr>
      <tr>
        <th>UANG JALAN:</th>
        <td>{{ number_format($hasil->UangJalan->uang_Jalan, 0, ",", ".") }}</td>
      </tr>
      <tr>
        <th>PENDAPATAN BERSIH:</th>
        <td>
          {{ number_format($totalJumlah - ($hasil->UangJalan->uang_Jalan), 0, ",", ".") }}
        </td>
      </tr>
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
