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
  <div >
    <div class="text-white text-center text-title"> Uang Jalan</div>
  </div>
</div>
<hr>

<div style="align-content:right">
  <a href="/uang_jalan/create" class="btn btn-primary btn-lg text-center" style="align-self:right">Tambah</a>
</div>

<div class="bgtbl-container" style="margin-top:10px; margin-bottom:20px ">
<table id="tabel-data" class="table table-striped table-bordered " width="100%" cellspacing="0">

  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Tanggal Muat</th>
      <th scope="col">Plat </th>
      <th scope="col">Kategori </th>
      <!-- <th scope="col">Barcode</th> -->
      <th scope="col">Muat Bongkar </th>
      <th scope="col">Tujuan </th>
      <th scope="col">Uang Jalan </th>
      <th scope="col">Tanggal Bongkar </th>
      <th scope="col">Keterangan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($uang_jalan as $key => $uang_jalanData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ date('Y-m-d',strtotime($uang_jalanData->tanggal)) }}</td>
            <td>{{ $uang_jalanData->kendaraan->plat }}</td>
            <td>{{ $uang_jalanData->kendaraan->kategori }}</td>
            <!-- <td>{{ $uang_jalanData->barcode }}</td> -->
            <td>{{ $uang_jalanData->muatbongkar->muatBongkar }}</td>
            <td>{{ $uang_jalanData->muatbongkar->tujuan->tujuan }}</td>
            <td>{{ number_format($uang_jalanData->uang_Jalan,0,",","."); }}</td>
            <td>
              @if ($uang_jalanData->update_mobil->status == 'selesai')
                {{ $uang_jalanData->update_mobil->tanggal_bongkar ?? '' }}
              @endif
            <td>{{ $uang_jalanData->keterangan }}</td>
            <td style="display:flex">
              
                <a href="/uang_jalan/edit/{{ $uang_jalanData->id }}" class="btn btn-edit">Edit</a>

                <form action="{{ url('/uang_jalan/delete/'.$uang_jalanData->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Uang Jalan ini?')">Hapus</button>

                </form>

            </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection