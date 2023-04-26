@extends('layout.dashboard')
@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<h1 class="text-white text-center">Daftar namasopir</h1>

<div class="d-flex justify-content-center">
<button class="btn btn-blue btn-lg text-center" onclick="location.href='/namasopir/create'">Tambah</button>

</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Nama Sopir</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($namasopir as $key => $namasopirData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $namasopirData->nama_sopir }}</td>
            <td>
             
                <a href="/namasopir/edit/{{ $namasopirData->id }}" class="btn btn-primary">Edit</a>
                <form action="{{ url('/namasopir/delete/'.$namasopirData->id) }}" method="post">
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