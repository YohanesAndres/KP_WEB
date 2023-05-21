@extends('layout.dashboard')
@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title">
<a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center"> Daftar Tujuan</h1>
</div>

<div class="d-flex justify-content-center">
<button class="btn btn-blue btn-lg text-center" onclick="location.href='/tujuan/create'">Tambah</button>
</div>

<table class="table text-white table-dark table-bordered container mt-4">
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
            <td>
             
                <a href="/tujuan/edit/{{ $tujuanData->id }}">Edit</a>
                <form action="{{ url('/tujuan/delete/'.$tujuanData->id) }}" method="post">
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