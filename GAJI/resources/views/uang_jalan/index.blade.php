@extends('layout.dashboard')
@section('content')

<h1 class="text-white text-center">Daftar uang_jalan</h1>

<div class="d-flex justify-content-center">
<a href="/uang_jalan/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">ID uang_jalan</th>
      <th scope="col">Tanggal Waktu</th>
      <th scope="col">ID Lapangan</th>
      <th scope="col">ID Pelanggan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($uang_jalan as $key => $uang_jalanData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $uang_jalanData->id_uang_jalan }}</td>
            <td>{{ $uang_jalanData->tanggal_waktu }}</td>
            <td>{{ $uang_jalanData->id_lapangan }}</td>
            <td>{{ $uang_jalanData->id_pelanggan }}</td>
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
@endsection