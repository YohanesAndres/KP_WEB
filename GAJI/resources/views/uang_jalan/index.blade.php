@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title">
<a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center"> Uang Jalan</h1>
</div>

<div class="d-flex justify-content-center">
<a href="/uang_jalan/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>


<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Tanggal Muat</th>
      <th scope="col">Plat </th>
      <th scope="col">Kategori </th>
      <th scope="col">Barcode</th>
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
            <td>{{ $uang_jalanData->kendaraan->kategori->nama }}</td>
            <td>{{ $uang_jalanData->barcode }}</td>
            <td>{{ $uang_jalanData->muatbongkar->muatBongkar }}</td>
            <td>{{ $uang_jalanData->muatbongkar->tujuan->tujuan }}</td>
            <td>{{ number_format($uang_jalanData->uang_Jalan,0,",","."); }}</td>
            <td>
              @if ($uang_jalanData->status_selesai)
                {{ $uang_jalanData->update_mobil->tanggal_bongkar ?? '' }}
              @else
                {{ $uang_jalanData->tanggal_bongkar ?? '' }}
              @endif
            <td>{{ $uang_jalanData->keterangan }}</td>
            <td>
              
                <a href="/uang_jalan/edit/{{ $uang_jalanData->id }}">Edit</a>

                <form action="{{ url('/uang_jalan/delete/'.$uang_jalanData->id) }}" method="post">
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