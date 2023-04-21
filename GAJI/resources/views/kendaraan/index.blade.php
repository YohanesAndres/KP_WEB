@extends('layout.dashboard')
@section('content')

<h1 class="text-white text-center">Daftar kendaraan</h1>

<div class="d-flex justify-content-center">
<a href="/kendaraan/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">ID kendaraan</th>
      <th scope="col">Tanggal Waktu</th>
      <th scope="col">ID Lapangan</th>
      <th scope="col">ID Pelanggan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($kendaraan as $key => $kendaraanData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $kendaraanData->id_kendaraan }}</td>
            <td>{{ $kendaraanData->tanggal_waktu }}</td>
            <td>{{ $kendaraanData->id_lapangan }}</td>
            <td>{{ $kendaraanData->id_pelanggan }}</td>
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