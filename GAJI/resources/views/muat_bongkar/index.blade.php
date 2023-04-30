@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<h1 class="text-white text-center">Daftar muat_bongkar</h1>

<div class="d-flex justify-content-center">
<a href="/muat_bongkar/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">uang jalan</th>
      <th scope="col">muat-bongkar</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($muat_bongkar as $key => $muat_bongkarData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $muat_bongkarData->uang_jalan }}</td>
            <td>{{ $muat_bongkarData->muatBongkar }}</td>
            <td>
            @can('create', App\Models\muat_bongkar::class)
                <a href="/muat_bongkar/edit/{{ $muat_bongkarData->id }}">Edit</a>
                @endcan

                @can('create', App\Models\muat_bongkar::class)
                <form action="{{ url('/muat_bongkar/delete/'.$muat_bongkarData->id) }}" method="post">
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