@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="{{ route('home') }}"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div>
    <div class="text-white text-center text-title"> Daftar Sopir</div>
  </div>
</div>
<hr>

<div class="d-flex justify-content-center">
  <button class="btn btn-primary btn-lg text-center" onclick="location.href='/namasopir/create'">Tambah</button>
</div>

<div class="bgtbl" style="margin-top:10px; margin-bottom:20px">
  <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">ID Sopir</th>
        <th scope="col">Nama Sopir</th>
        <th scope="col">Alamat</th>
        <th scope="col">NIK</th>
        <th scope="col">Foto Sopir</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($namasopir as $key => $namasopirData)
      <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $namasopirData->idSopir }}</td>
          <td>{{ $namasopirData->nama_sopir }}</td>
          <td>{{ $namasopirData->alamat }}</td>
          <td>{{ $namasopirData->NIK }}</td>
          <td>
              <img src="{{ asset('storage/' . $namasopirData->foto) }}" alt="Foto Sopir" width="200" height="200">
          </td>
          <td style="display:flex">
              <a href="/namasopir/edit/{{ $namasopirData->id }}" class="btn btn-edit" >Edit</a>
              <!-- <form action="{{ url('/namasopir/delete/'.$namasopirData->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="_method" value="delete">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Nama Sopir ini?')">Hapus</button>
              </form> -->
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection