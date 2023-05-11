@extends('layout.dashboard')
@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center"> Kendaraan</h1>


<div class="d-flex justify-content-center">
<button class="btn btn-blue btn-lg text-center" onclick="location.href='/kendaraan/create'">Tambah</button>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Plat</th>
      <th scope="col">Tonase</th>
      <th scope="col">Nama Sopir</th>
      <th scope="col">Nama Kategori</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($kendaraan as $key => $kendaraanData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $kendaraanData->plat }}</td>
            <td>{{ $kendaraanData->tonase }}</td>
            <td>{{ $kendaraanData->namasopir->nama_sopir }}</td>
            <td>{{ $kendaraanData->kategori->nama}}</td>
            <td>
                <a href="/kendaraan/edit/{{ $kendaraanData->id }}">Edit</a>

                <form action="{{ url('/kendaraan/delete/'.$kendaraanData->id) }}" method="post">
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


@endsection