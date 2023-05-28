@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div>
    <div class="text-white text-center text-title"> Daftar Tujuan</div>
  </div>
</div>
<hr>
<div class="d-flex justify-content-center">
  <button class="btn btn-primary btn-lg text-center" onclick="location.href='/tujuan/create'">Tambah</button>
</div>

<div class="bgtbl" style="margin-top:10px; margin-bottom:20px">

<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tujuan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($tujuan as $key => $tujuanData)
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $tujuanData->tujuan }}</td>
        <td style="display:flex">   
          <a href="/tujuan/edit/{{ $tujuanData->id }}" class="btn btn-edit">Edit</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection