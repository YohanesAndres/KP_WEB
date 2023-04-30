@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<h1 class="text-white text-center">Daftar Kendaraan</h1>

<div class="d-flex justify-content-center">
<a href="/Kendaraan/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Plat</th>
      <th scope="col">Tonase</th>
      <th scope="col">Nama Sopir</th>
      <th scope="col">Nama Kategori</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($kendaraan as $key => $kendaraanData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $kendaraanData->plat }}</td>
            <td>{{ $kendaraanData->tonase }}</td>
            <td>{{ $kendaraanData->id_namasopir }}</td>
            <td>{{ $kendaraanData->id_kategori}}</td>
            <td>
            @can('create', App\Models\kendaraan::class)
                <a href="/kendaraan/edit/{{ $kendaraanData->id }}">Edit</a>
                @endcan

                @can('create', App\Models\kendaraan::class)
                <form action="{{ url('/kendaraan/delete/'.$kendaraanData->id) }}" method="post">
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