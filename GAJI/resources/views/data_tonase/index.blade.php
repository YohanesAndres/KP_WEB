@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div>
    <div class="text-white text-center text-title"> Data Tonase</div>
  </div>
</div>
<hr>

<div class="d-flex justify-content-center">
  <a href="/data_tonase/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<div class="bgtbl" style="margin-top:10px; margin-bottom:20px">
  <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
          <td>{{ number_format($data_tonaseData->tonase_actual,0,",",".");  }}</td>
          <td>{{ $data_tonaseData->tujuan->tujuan }}</td>
          <td style="display:flex">
              <a href="/data_tonase/edit/{{ $data_tonaseData->id }}" class="btn btn-edit">Edit</a>
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
</div>
@endsection