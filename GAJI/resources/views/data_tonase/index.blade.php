@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center"> Data Tonase</h1>



<div class="d-flex justify-content-center">
<a href="/data_tonase/create" class="btn btn-primary btn-lg text-center">Tambah</a>

</div>

<table class="table text-white table-dark table-bordered container mt-4"style="width:135%">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">NO.SPK</th>
      <th scope="col">NO.DO</th>
      <th scope="col">Tonase Actual</th>
      <th scope="col">PKS</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($data_tonase as $key => $data_tonaseData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ $data_tonaseData->no_spk }}</td>
            <td>{{ $data_tonaseData->no_do }}</td>
            <td>{{ $data_tonaseData->tonase_actual }}</td>
            <td>{{ $data_tonaseData->muatbongkar->muatBongkar }}</td>
            <td>
                <a href="/data_tonase/edit/{{ $data_tonaseData->id }}">Edit</a>
                <form action="{{ url('/data_tonase/delete/'.$data_tonaseData->id) }}" method="post">
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