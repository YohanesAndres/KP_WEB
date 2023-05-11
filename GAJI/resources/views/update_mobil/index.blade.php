@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<h1 class="text-white text-center">Daftar update_mobil</h1>

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
            <td>{{ $update_mobilData->uangjalan->tanggal }}</td>
            <td>{{ $update_mobilData->status }}</td>
            <td>{{ $update_mobilData->uangjalan->kendaraan->plat }}</td>
            <td>{{ $update_mobilData->keterangan }}</td>
            <td>
                <a href="/update_mobil/edit/{{ $update_mobilData->id }}">Edit</a>
                <!-- <form action="{{ url('/update_mobil/delete/'.$update_mobilData->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form> -->
            </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection