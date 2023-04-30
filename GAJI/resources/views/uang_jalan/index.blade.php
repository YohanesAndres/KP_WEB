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
      <th scope="col">id_kendaraan</th>
      <th scope="col">barcode</th>
      <th scope="col">id_muat_bongkar</th>
      <th scope="col">jumlah_uang_jalan</th>
      <th scope="col">cek</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($uang_jalan as $key => $uang_jalanData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $uang_jalanData->tanggal }}</td>
            <td>{{ $uang_jalanData->id_kendaraan }}</td>
            <td>{{ $uang_jalanData->barcode }}</td>
            <td>{{ $uang_jalanData->id_muat_bongkar }}</td>
            <td>{{ $uang_jalanData->jumlah_uang_jalan }}</td>
            <td>{{ $uang_jalanData->cek }}</td>
            <td>
            @can('create', App\Models\uang_jalan::class)
                <a href="/uang_jalan/edit/{{ $uang_jalanData->id }}">Edit</a>
                @endcan

                @can('create', App\Models\uang_jalan::class)
                <form action="{{ url('/uang_jalan/delete/'.$uang_jalanData->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                @endcan

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