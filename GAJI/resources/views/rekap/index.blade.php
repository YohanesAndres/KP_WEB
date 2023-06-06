@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title">
    <a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center"> Rekap Truck Kecil</h1>
</div>

<div class="d-flex justify-content-center">
    <a href="/rekap/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<div class="container mt-4">
    @foreach($rekap as $key => $rekapData)
    <div class="row">
        <div class="col">
            <h3>No: {{ ++$key }}</h3>
            <p>pks: {{ $rekapData->pks }}</p>
            <p>no_do: {{ $rekapData->no_do }}</p>
            <p>kontrak_no: {{ $rekapData->kontrak_no }}</p>
            <p>bongkar: {{ $rekapData->bongkar }}</p>
            <div>
                <a href="/rekap/edit/{{ $rekapData->id }}" class="btn btn-primary">Edit</a>
                <form action="{{ url('/rekap/delete/'.$rekapData->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>

            <br></br>

            <div class="d-flex justify-content-center">
              <a href="/rekap_detail/create" class="btn btn-primary btn-lg text-center">Tambah</a>
            </div>

            <table class="table text-white table-dark table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggl Muat</th>
                        <th scope="col">Tanggl Bongkar</th>
                        <th scope="col">Nomor Polisi</th>
                        <th scope="col">Nama Sopir</th>
                        <th scope="col">Barcode PKS</th>
                        <th scope="col">Kirim Kebun</th>
                        <th scope="col">Terima Bulking</th>
                        <th scope="col">Susut (Kg)</th>
                        <th scope="col">Over Toleransi</th>
                        <th scope="col">Uang Jalan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapDetail as $key => $rekapDetailData)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $rekapDetailData->tanggal_muat }}</td>
                        <td>{{ $rekapDetailData->tanggal_bongkar }}</td>
                        <td>{{ $rekapDetailData->nomor_polisi }}</td>
                        <td>{{ $rekapDetailData->nama_sopir }}</td>
                        <td>{{ $rekapDetailData->barcode_pks }}</td>
                        <td>{{ $rekapDetailData->kirim_kebun }}</td>
                        <td>{{ $rekapDetailData->terima_bulking }}</td>
                        <td>{{ $rekapDetailData->susut_kg }}</td>
                        <td>{{ $rekapDetailData->over_toleransi }}</td>
                        <td>{{ $rekapDetailData->uang_jalan }}</td>
                        <td>
                            <a href="/muat_bongkar/edit/{{ $rekapDetailData->id }}" class="btn btn-primary">Edit</a>
                            <form action="{{ url('/muat_bongkar/delete/'.$rekapDetailData->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Rekap ini?')">Hapus</button>
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
