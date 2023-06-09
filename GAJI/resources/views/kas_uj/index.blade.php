@extends('layout.dashboard')
@section('content')



<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="{{ route('home') }}"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div>
    <div class="text-white text-center text-title"> Kas Uang Jalan</div>
  </div>
</div>
<hr>

<div style="display:flex;gap:10px">
  <div class="d-flex justify-content-center">
    <a href="/kas_uj/create_daribos" class="btn btn-primary btn-lg text-center">Tambah dari bos</a>
  </div>

  <div class="d-flex justify-content-center">
    <a href="/kas_uj/create" class="btn btn-primary btn-lg text-center">Rekap Uang Jalan Per Tanggal</a>
  </div>

  <div class="d-flex justify-content-center">
    <a href="/kas_uj/create_credit" class="btn btn-primary btn-lg text-center">Tambah Credit</a>
  </div>

  <div class="d-flex justify-content-center">
    <a href="/kas_uj/create_debit" class="btn btn-primary btn-lg text-center">Tambah Debit</a>
  </div>
</div>

<div class="bgtbl" style="margin-top:10px; margin-bottom:20px">
  <table id="tabel-data" class="table table-striped table-bordered overf" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Expenses</th>
        <th scope="col">Credit</th>
        <th scope="col">Debit</th>
        <th scope="col">Hasil</th>
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
          <td>{{ date('Y-m-d',strtotime($kas_ujData->tanggal)) }}</td>
          <td>{{ $kas_ujData->expenses }}</td>
          <td>
            @if($kas_ujData->jumlah_uang > 0)
            {{ number_format($kas_ujData->jumlah_uang,0,",","."); }}
            @endif
          </td>
          <td>
            @if($kas_ujData->jumlah_uang <= 0)
            {{ number_format($kas_ujData->jumlah_uang*-1,0,",","."); }}
            @endif
          </td>
          <td>
            @php 
                $hasil += $kas_ujData->jumlah_uang;
                echo number_format($hasil,0,",",".");
            @endphp
          </td>
          <td style="display:flex">
          

              <a href="/kas_uj/edit/{{ $kas_ujData->id }}" class="btn btn-edit">Edit</a>
              <form action="{{ url('/kas_uj/delete/'.$kas_ujData->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="_method" value="delete">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Kas Uang Jalan ini?')">Hapus</button>

              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection