@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center"> Muat-Bongkar</h1>


<div class="d-flex justify-content-center">
<a href="/muat_bongkar/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<table class="table text-white table-dark table-bordered container mt-4"style="width:100%">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Muat Bongkar</th>
      <th scope="col">Uang Jalan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($muat_bongkar as $key => $muat_bongkarData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $muat_bongkarData->muatBongkar }}</td>
            <td>{{ $muat_bongkarData->uang_jalan }}</td>
            <td>
                <a href="/muat_bongkar/edit/{{ $muat_bongkarData->id }}">Edit</a>

                <form action="{{ url('/muat_bongkar/delete/'.$muat_bongkarData->id) }}" method="post">
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