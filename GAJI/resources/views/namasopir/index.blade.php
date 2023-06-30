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
    <div class="text-white text-center text-title"> Daftar Sopir</div>
  </div>
</div>
<hr>

<div class="bgtbl" style="margin-top:10px; margin-bottom:20px">

<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <!-- <th scope="col">ID Sopir</th> -->
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">NIK</th>
      <th scope="col">Foto</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($akun as $account)
    <tr>
        <!-- <td>{{ $account->idSopir }}</td> -->
        <td>{{ $account->name }}</td>
        <td>{{ $account->alamat }}</td>
        <td>{{ $account->NIK }}</td>
        <td>
            <img src=" {{ asset('storage/' . $account->foto) }} " alt="Foto Sopir" width = "100" height = "100">
        </td>
        <td style="display:flex">   
          <a href="/namasopir/edit/{{ $account->id }}" class="btn btn-edit">Edit</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection