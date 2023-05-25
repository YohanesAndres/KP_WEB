@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title">
  <a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center"> Kategori</h1>
</div>

<div class="d-flex justify-content-center">
  <a href="/kategori/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<div class="bgtbl">
  <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($kategori as $key => $kategoriData)
      <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $kategoriData->nama }}</td>
          <td>
              <a href="/kategori/edit/{{ $kategoriData->id }}">Edit</a>
              <form action="{{ url('/kategori/delete/'.$kategoriData->id) }}" method="post">
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
</div>
@endsection