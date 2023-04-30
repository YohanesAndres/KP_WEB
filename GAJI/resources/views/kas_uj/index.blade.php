@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<h1 class="text-white text-center">Daftar kas_uj</h1>

<div class="d-flex justify-content-center">
<a href="/kas_uj/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">tanggal</th>
      <th scope="col">jumlah uang</th>
      <th scope="col">expenses</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($kas_uj as $key => $kas_ujData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $kas_ujData->tanggal }}</td>
            <td>{{ $kas_ujData->jumlah_uang }}</td>
            <td>{{ $kas_ujData->expenses }}</td>
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
<style>
  table th,
  table td {
    padding: 30px;
  }
</style>  
@endsection