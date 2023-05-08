@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<h1 class="text-white text-center">Daftar uang_jalan</h1>

<div class="d-flex justify-content-center">
<a href="/uang_jalan/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">tanggal</th>
      <th scope="col">Plat (id_kendaraan)</th>
      <th scope="col">Kategori (id_kendaraan)</th>
      <th scope="col">Barcode</th>
      <th scope="col">Tujuan (id_muatbongkar)</th>
      <th scope="col">Uang Jalan (id_muatbongkar)</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($uang_jalan as $key => $uang_jalanData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $uang_jalanData->tanggal }}</td>
            <td>{{ $uang_jalanData->kendaraan->plat }}</td>
            <td>{{ $uang_jalanData->kendaraan->kategori->nama }}</td>
            <td>{{ $uang_jalanData->barcode }}</td>
            <td>{{ $uang_jalanData->muatbongkar->muatBongkar }}</td>
            <td>{{ $uang_jalanData->muatbongkar->uang_jalan }}</td>
            <td>{{ $uang_jalanData->keterangan }}</td>
            <td>
              
                <a href="/uang_jalan/edit/{{ $uang_jalanData->id }}">Edit</a>

                <form action="{{ url('/uang_jalan/delete/'.$uang_jalanData->id) }}" method="post">
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
<style>
  table th,
  table td {
    padding: 30px;
  }
</style>  
@endsection