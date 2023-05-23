@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title">
    <a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> 
    <h1 style="display:inline;" class="text-white text-center"> Rekap Truck</h1>
</div>

<div class="d-flex justify-content-center">
    <a href="/rekap_fuso/create" class="btn btn-primary btn-lg text-center">Tambah</a>
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
                <a href="/rekap_fuso/edit/{{ $rekap_fusoData->id }}" class="btn btn-primary">Edit</a>
                <form action="{{ url('/rekap_fuso/delete/'.$rekap_fusoData->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>

            <br></br>

            <div class="d-flex justify-content-center">
                <a href="/rekap_fusoDetail/create" class="btn btn-primary btn-lg text-center">Tambah</a>
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
                    @foreach($rekap_fusoDetail as $key => $rekap_fuso_detailData)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $rekap_fuso_detailData->UangJalan->tanggal }}</td>
                        <td></td>
                        <td>{{ $rekap_fuso_detailData->UangJalan->kendaraan->plat }}</td>
                        <td>{{ $rekap_fuso_detailData->UangJalan->namaSopir->nama_sopir }}</td>
                        <td>{{ $rekap_fuso_detailData->UangJalan->kendaraan->tonase }}</td>
                        <td>{{ $rekap_fuso_detailData->quantity_muat_pks_bruto }}</td>
                        <td>{{ $rekap_fuso_detailData->quantity_muat_pks_tarra }}</td>
                        <td></td>
                        <td>{{ $rekap_fuso_detailData->quantity_bongkar_bruto }}</td>
                        <td>{{ $rekap_fuso_detailData->quantity_bongkar_tarra }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ $rekap_fuso_detailData->mutu_pks_ffa_alb }}</td>
                        <td>{{ $rekap_fuso_detailData->mutu_pks_ka }}</td>
                        <td>{{ $rekap_fuso_detailData->mutu_bongkar_ffa_alb }}</td>
                        <td>{{ $rekap_fuso_detailData->mutu_bongkar_ka }}</td>
                        <td></td>
                        <td>{{ number_format($rekap_fuso_detailData->UangJalan->uang_Jalan,0,",","."); }}</td>
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>

@endsection
