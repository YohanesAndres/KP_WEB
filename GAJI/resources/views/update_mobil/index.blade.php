@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title">
<a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> <h1 style="display:inline;" class="text-white text-center"> Update Mobil</h1>
</div>

<div class="bgtbl">
<!-- id data table -->
<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Tanggal Muat</th>
      <th scope="col">Status</th>
      <th scope="col">Plat</th>
      <th scope="col">Tanggal Bongkar</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($update_mobil as $key => $update_mobilData)
    <tr>
        <td>{{ ++$key }}</td>
            <td>{{ date('Y-m-d',strtotime($update_mobilData->uangjalan->tanggal)) }}</td>
            <td>{{ $update_mobilData->status }}</td>
            <td>{{ $update_mobilData->uangjalan->kendaraan->plat }}</td>
            <td>
              {{$update_mobilData->tanggal_bongkar}}

            </td>
            <td>{{ $update_mobilData->keterangan }}</td>
            <td>
            @if (!($update_mobilData->status == 'selesai'))
            <a href="/update_mobil/edit/{{ $update_mobilData->id }}">Edit</a>
              @endif
                <!-- <form action="{{ url('/update_mobil/delete/'.$update_mobilData->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form> -->
            </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection