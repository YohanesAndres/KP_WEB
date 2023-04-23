@extends('layout.dashboard')
@section('content')

<h1 class="text-white text-center">Daftar kas_uj</h1>

<div class="d-flex justify-content-center">
<a href="/kas_uj/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">ID kas_uj</th>
      <th scope="col">Tanggal Waktu</th>
      <th scope="col">ID Lapangan</th>
      <th scope="col">ID Pelanggan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($kas_uj as $key => $kas_ujData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $kas_ujData->id_kas_uj }}</td>
            <td>{{ $kas_ujData->tanggal_waktu }}</td>
            <td>{{ $kas_ujData->id_lapangan }}</td>
            <td>{{ $kas_ujData->id_pelanggan }}</td>
            <td>
            @can('create', App\Models\kas_uj::class)
                <a href="/kas_uj/edit/{{ $kas_ujData->id }}">Edit</a>
                @endcan

                @can('create', App\Models\kas_uj::class)
                <form action="{{ url('/kas_uj/delete/'.$kas_ujData->id) }}" method="post">
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
@endsection