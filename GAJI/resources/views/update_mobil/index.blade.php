@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<h1 class="text-white text-center">Daftar update_mobil</h1>

<div class="d-flex justify-content-center">
<a href="/update_mobil/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">tanggal</th>
      <th scope="col">status</th>
      <th scope="col">id_kendaraan</th>
      <th scope="col">keterangan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($update_mobil as $key => $update_mobilData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $update_mobilData->tanggal }}</td>
            <td>{{ $update_mobilData->status }}</td>
            <td>{{ $update_mobilData->id_kendaraan }}</td>
            <td>{{ $update_mobilData->keterangan }}</td>
            <td>
            @can('create', App\Models\update_mobil::class)
                <a href="/update_mobil/edit/{{ $update_mobilData->id }}">Edit</a>
                @endcan

                @can('create', App\Models\update_mobil::class)
                <form action="{{ url('/update_mobil/delete/'.$update_mobilData->id) }}" method="post">
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