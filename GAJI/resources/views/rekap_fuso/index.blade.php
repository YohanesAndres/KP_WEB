@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title">
<a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center">Rekap Truck Besar</h1>
</div>

<div class="d-flex justify-content-center">
<a href="/rekap_fuso/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">alamat</th>
      <th scope="col">muat_cpo</th>
      <th scope="col">tujuan_bongkar</th>
      <th scope="col">no_spk_tanggal</th>
      <th scope="col">no_kontrak_tanggal</th>
      <th scope="col">no_tanggal_do_besar</th>
      <th scope="col">quantity_do_ton</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($rekap_fuso as $key => $rekap_fusoData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $rekap_fusoData->alamat }}</td>
            <td>{{ $rekap_fusoData->muat_cpo }}</td>
            <td>{{ $rekap_fusoData->tujuan_bongkar }}</td>
            <td>{{ $rekap_fusoData->no_spk_tanggal }}</td>
            <td>{{ $rekap_fusoData->no_kontrak_tanggal }}</td>
            <td>{{ $rekap_fusoData->no_tanggal_do_besar }}</td>
            <td>{{ $rekap_fusoData->quantity_do_ton }}</td>
            <td>
            @can('create', App\Models\rekap_fuso::class)
                <a href="/rekap_fuso/edit/{{ $rekap_fusoData->id }}">Edit</a>
                @endcan

                @can('create', App\Models\rekap_fuso::class)
                <form action="{{ url('/rekap_fuso/delete/'.$rekap_fusoData->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                @endcan

            </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection