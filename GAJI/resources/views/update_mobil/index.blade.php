@extends('layout.dashboard')
@section('content')

<h1 class="text-white text-center">Daftar update_mobil</h1>

<div class="d-flex justify-content-center">
<a href="/update_mobil/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">ID update_mobil</th>
      <th scope="col">Tanggal Waktu</th>
      <th scope="col">ID Lapangan</th>
      <th scope="col">ID Pelanggan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($update_mobil as $key => $update_mobilData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $update_mobilData->id_update_mobil }}</td>
            <td>{{ $update_mobilData->tanggal_waktu }}</td>
            <td>{{ $update_mobilData->id_lapangan }}</td>
            <td>{{ $update_mobilData->id_pelanggan }}</td>
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
@endsection