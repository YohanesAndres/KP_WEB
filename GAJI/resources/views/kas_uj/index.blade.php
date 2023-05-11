@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<h1 class="text-white text-center">Daftar kas_uj</h1>

<div class="d-flex justify-content-center">
<a href="/kas_uj/create_daribos" class="btn btn-primary btn-lg text-center">Tambah dari bos</a>
</div>

<div class="d-flex justify-content-center">
<a href="/kas_uj/create" class="btn btn-primary btn-lg text-center">rekap uang jalan pertanggal</a>
</div>
<div class="d-flex justify-content-center">
<a href="/kas_uj/create_credit" class="btn btn-primary btn-lg text-center">tambah credit</a>
</div>
<div class="d-flex justify-content-center">
<a href="/kas_uj/create_debit" class="btn btn-primary btn-lg text-center">tambah debit</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">tanggal</th>
      <th scope="col">expenses</th>
      <th scope="col">credit</th>
      <th scope="col">debit</th>
      <th scope="col">hasil</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @php
          $hasil = 0; 
      @endphp
      @foreach($kas_uj as $key => $kas_ujData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $kas_ujData->tanggal }}</td>
            <td>{{ $kas_ujData->expenses }}</td>
            <td>
              @if($kas_ujData->jumlah_uang > 0)
              {{ $kas_ujData->jumlah_uang }}
              @endif
            </td>
            <td>
              @if($kas_ujData->jumlah_uang <= 0)
              {{ $kas_ujData->jumlah_uang*-1 }}
              @endif
            </td>
            
            <td>
              @php 
                  $hasil += $kas_ujData->jumlah_uang;
                  echo $hasil;
              @endphp
            </td>
            <td>
                <a href="/kas_uj/edit/{{ $kas_ujData->id }}">Edit</a>
                <form action="{{ url('/kas_uj/delete/'.$kas_ujData->id) }}" method="post">
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