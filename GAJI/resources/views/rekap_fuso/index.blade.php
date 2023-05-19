@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title">
    <a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center"> Rekap Truck Kecil</h1>
</div>

<div class="d-flex justify-content-center">
    <a href="/rekap_fuso/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<div class="container mt-4">
    @foreach($rekap_fuso as $key => $rekap_fusoData)
    <div class="row">
        <div class="col">
            <h3>No : {{ ++$key }}</h3>
            <p>Alamat : {{ $rekap_fusoData->alamat }}</p>
            <p>Muat CPO : {{ $rekap_fusoData->muat_cpo }}</p>
            <p>Tujuan Bongkar : {{ $rekap_fusoData->tujuan_bongkar }}</p>
            <p>NO SPK : {{ $rekap_fusoData->no_spk_tanggal }}</p>
            <p>NO Kontrak : {{ $rekap_fusoData->no_kontrak_tanggal }}</p>
            <p>NO DO : {{ $rekap_fusoData->no_tanggal_do_besar }}</p>
            <p>Quantity DO (ton): {{ $rekap_fusoData->quantity_do_ton }}</p>
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
              <a href="/rekap_fuso_detail/create" class="btn btn-primary btn-lg text-center">Tambah</a>
            </div>

            <table class="table text-white table-dark table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggl Muat</th>
                        <th scope="col">Tanggl Bongkar</th>
                        <th scope="col">Nomor DO Kecil Transporter</th>
                        <th scope="col">Plat Kendaraan</th>
                        <th scope="col">Nama Sopir</th>
                        <th scope="col">Estimasi Tonase</th>
                        <th scope="col">Barcode PKS</th>
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
                        <td>{{ $rekap_fuso_detailData->tanggal_muat }}</td>
                        <td>{{ $rekap_fuso_detailData->tanggal_bongkar }}</td>
                        <td>{{ $rekap_fuso_detailData->nomor_polisi }}</td>
                        <td>{{ $rekap_fuso_detailData->nama_sopir }}</td>
                        <td>{{ $rekap_fuso_detailData->barcode_pks }}</td>
                        <td>{{ $rekap_fuso_detailData->kirim_kebun }}</td>
                        <td>{{ $rekap_fuso_detailData->terima_bulking }}</td>
                        <td>{{ $rekap_fuso_detailData->susut_kg }}</td>
                        <td>{{ $rekap_fuso_detailData->over_toleransi }}</td>
                        <td>{{ $rekap_fuso_detailData->uang_jalan }}</td>
                        <td>
                            <a href="/muat_bongkar_detail/edit/{{ $rekap_fuso_detailData->id }}" class="btn btn-primary">Edit</a>
                            <form action="{{ url('/muat_bongkar/delete/'.$rekap_fuso_detailData->id) }}" method="post">
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
