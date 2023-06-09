@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    @if (Auth::check())
        @if (Auth::user()->role === 'Administrator')
                <a href="{{ route('home2') }}"><img src="{{ asset('back.svg')}}" alt=""></a> 
        @elseif (Auth::user()->role === 'boss')
                <a href="{{ route('home') }}"><img src="{{ asset('back.svg')}}" alt=""></a>   
        @endif
    @endif
  </div>
  <div>
    <div class="text-white text-center text-title"> Kendaraan</div>
  </div>
</div>
<hr>

<div class="d-flex justify-content-center">
  <button class="btn btn-primary btn-lg text-center" onclick="location.href='/kendaraan/create'">Tambah</button>
</div>

<div class="bgtbl" style="margin-top:10px; margin-bottom:20px">
  <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
          <td>{{ number_format($kendaraanData->tonase,0,",","."); }}</td>
          <td>{{ $kendaraanData->namasopir->name }}</td>
          <td>{{ $kendaraanData->kategori}}</td>
          <td style="display:flex">
              <a href="/kendaraan/edit/{{ $kendaraanData->id }}" class="btn btn-edit">Edit</a>
              <!-- <form action="{{ url('/kendaraan/delete/'.$kendaraanData->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="_method" value="delete">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Kendaraan ini?')">Hapus</button>

              </form> -->
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>  
</div>

@endsection