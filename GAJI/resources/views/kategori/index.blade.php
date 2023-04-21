@extends('layout.dashboard')
@section('content')

<h1 class="text-white text-center">Daftar kategori</h1>

<div class="d-flex justify-content-center">
<a href="/kategori/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">ID kategori</th>
      <th scope="col">Tanggal Waktu</th>
      <th scope="col">ID Lapangan</th>
      <th scope="col">ID Pelanggan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($kategori as $key => $kategoriData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $kategoriData->id_kategori }}</td>
            <td>{{ $kategoriData->tanggal_waktu }}</td>
            <td>{{ $kategoriData->id_lapangan }}</td>
            <td>{{ $kategoriData->id_pelanggan }}</td>
            <td>
            @can('create', App\Models\kategori::class)
                <a href="/kategori/edit/{{ $kategoriData->id }}">Edit</a>
                @endcan

                @can('create', App\Models\kategori::class)
                <form action="{{ url('/kategori/delete/'.$kategoriData->id) }}" method="post">
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