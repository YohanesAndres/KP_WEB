@extends('layout.dashboard')
@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title">
    <a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> 
    <h1 style="display:inline;" class="text-white text-center"> Rekap Truck</h1>
</div>

<div class="d-flex justify-content-center">
    <a href="/rekap_fuso/create" class="btn btn-tambah btn-lg text-center">Tambah</a>
</div>

<div class="container mt-4">
    @foreach($rekap_fuso as $key  => $rekap_fusoData)
    <div class="row">
        <div class="col">
            <h3>No :            {{ ++$key }}</h3>
            <p>Alamat :         {{ $rekap_fusoData->alamat }}</p>
            <p>NO DO :          {{ $rekap_fusoData->dataTonase->no_do }}</p>
            <p>NO SPK :         {{ $rekap_fusoData->dataTonase->no_spk }}</p>
            <p>Tujuan :         {{ $rekap_fusoData->dataTonase->tujuan->tujuan }}</p>
            <p>NO Kontrak :     {{ $rekap_fusoData->no_kontrak }}</p>
            <p>Quantity DO (ton): {{ $rekap_fusoData->dataTonase->tonase_actual}}</p>
            <div>
                <a href="/rekap_fuso/edit/{{ $rekap_fusoData->id }}" class="btn btn-edit">Edit</a>
                <form action="{{ url('/rekap_fuso/delete/'.$rekap_fusoData->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>

            <br></br>

            <div class="d-flex justify-content-center">
                <a href="/rekap_fusoDetail/create?rekap_fuso_id={{  $rekap_fusoData->id  }}" class="btn btn-tambah btn-lg text-center">Tambah</a>
            </div>

            <table class="table text-white table-dark table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Muat</th>
                        <th scope="col">Tanggal Bongkar</th>
                        <th scope="col">Plat Kendaraan</th>
                        <th scope="col">Nama Sopir</th>
                        <th scope="col">Estimasi Tonase</th>
                        <th scope="col">BRUTO PKS</th>
                        <th scope="col">TARRA PKS</th>
                        <th scope="col">NETTO PKS</th>
                        <th scope="col">BRUTO BONGKAR</th>
                        <th scope="col">TARRA BONGKAR</th>
                        <th scope="col">NETTO BONGKAR</th>
                        <th scope="col">SUSUT</th>
                        <th scope="col">FFA/ALB PKS</th>
                        <th scope="col">KA PKS</th>
                        <th scope="col">FFA/ALB BONGKAR</th>
                        <th scope="col">KA BONGKAR</th>
                        <th scope="col">OVER TOLERANSI</th>
                        <th scope="col">UANG JALAN</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalTonase = 0;
                        $totalNettoPKS = 0;
                        $totalNettoBongkar = 0;
                        $totalSusut = 0;
                        $totalUangJalan = 0;
                        $overToleransi = 0;
                    @endphp
                    @foreach($rekap_fusoDetail as $key => $rekap_fuso_detailData)
                        @if($rekap_fuso_detailData->rekap_fuso_id == $rekap_fusoData->id)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ date('Y-m-d',strtotime($rekap_fuso_detailData->UangJalan->tanggal)) }}</td>
                                <td></td>
                                <td>{{ $rekap_fuso_detailData->UangJalan->kendaraan->plat }}</td>
                                <td>{{ $rekap_fuso_detailData->UangJalan->namaSopir->nama_sopir }}</td>
                                <td>{{ $rekap_fuso_detailData->UangJalan->kendaraan->tonase }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_muat_pks_bruto }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_muat_pks_tarra }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_bongkar_bruto }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_bongkar_tarra }}</td>
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
                                <td>{{ $rekap_fuso_detailData->mutu_pks_ffa_alb }}</td>
                                <td>{{ $rekap_fuso_detailData->mutu_pks_ka }}</td>
                                <td>{{ $rekap_fuso_detailData->mutu_bongkar_ffa_alb }}</td>
                                <td>{{ $rekap_fuso_detailData->mutu_bongkar_ka }}</td>
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
                                <td>{{ number_format($rekap_fuso_detailData->UangJalan->uang_Jalan,0,",",".") }}</td>
                                <td>
                                    <a href="/rekap_fusoDetail/edit/{{ $rekap_fuso_detailData->id }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ url('/rekap_fusoDetail/delete/'.$rekap_fuso_detailData->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $totalTonase += $rekap_fuso_detailData->UangJalan->kendaraan->tonase;
                                $totalNettoPKS += ($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
                                $totalNettoBongkar += ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);
                                $totalSusut += $result;
                                $totalUangJalan += $rekap_fuso_detailData->UangJalan->uang_Jalan;
                                $overToleransi += (ceil($uangjalans));
                            @endphp
                        @endif
                    @endforeach
                    <tr>
                        <td>TOTAL</td>
                        <td colspan="4"></td>
                        <td>{{ number_format($totalTonase,0,",",".") }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ number_format($totalNettoPKS,0,",",".") }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ number_format($totalNettoBongkar,0,",",".") }}</td>
                        <td>{{ number_format($totalSusut,0,",",".") }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ number_format($overToleransi,0,",",".") }}</td>
                        <td>{{ number_format($totalUangJalan,0,",",".") }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>

@endsection
