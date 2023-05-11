@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center"> Rekap Truck Kecil</h1>


<div class="d-flex justify-content-center">
<a href="/rekap/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">pks</th>
      <th scope="col">no_do</th>
      <th scope="col">kontrak_no</th>
      <th scope="col">bongkar</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($rekap as $key => $rekapData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $rekapData->pks }}</td>
            <td>{{ $rekapData->no_do }}</td>
            <td>{{ $rekapData->kontrak_no }}</td>
            <td>{{ $rekapData->bongkar }}</td>
            <td>
            @can('create', App\Models\rekap::class)
                <a href="/rekap/edit/{{ $rekapData->id }}">Edit</a>
                @endcan

                @can('create', App\Models\rekap::class)
                <form action="{{ url('/rekap/delete/'.$rekapData->id) }}" method="post">
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