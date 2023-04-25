@extends('layout.dashboard')
@section('content')

<h1 class="text-white text-center">Daftar namasopir</h1>

<div class="d-flex justify-content-center">
<a href="/namasopir/create" class="btn btn-blue btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">ID namasopir</th>
      <th scope="col">Tanggal Waktu</th>
      <th scope="col">ID Lapangan</th>
      <th scope="col">ID Pelanggan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($namasopir as $key => $namasopirData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $namasopirData->id_namasopir }}</td>
            <td>{{ $namasopirData->tanggal_waktu }}</td>
            <td>{{ $namasopirData->id_lapangan }}</td>
            <td>{{ $namasopirData->id_pelanggan }}</td>
            <td>
            @can('create', App\Models\namasopir::class)
                <a href="/namasopir/edit/{{ $namasopirData->id }}">Edit</a>
                @endcan

                @can('create', App\Models\namasopir::class)
                <form action="{{ url('/namasopir/delete/'.$namasopirData->id) }}" method="post">
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