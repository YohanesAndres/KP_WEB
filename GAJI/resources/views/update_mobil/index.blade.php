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
  <div>
    <div class="text-white text-center text-title"> Update Mobil</div>
  </div>
</div>
<hr>

<div class="bgtbl"style="margin-top:10px; margin-bottom:20px ;padding:35px" >
<!-- id data table -->
  <div class="row" >
  <div class = "col-12" style="width: 100%">
  <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">ID UangJalan</th>
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
            <td>{{ $update_mobilData->uangjalan->nomorUJ }}</td>
            <td>{{ date('Y-m-d',strtotime($update_mobilData->uangjalan->tanggal)) }}</td>
            <td>{{ $update_mobilData->status }}</td>
            <td>{{ $update_mobilData->uangjalan->kendaraan->plat }}</td>
            <td>{{$update_mobilData->tanggal_bongkar}}</td>
            <td>{{ $update_mobilData->keterangan }}</td>
            <td style="display:flex">
              @if (!($update_mobilData->status == 'selesai'))
                <a href="/update_mobil/edit/{{ $update_mobilData->id }}" class="btn btn-edit">Edit</a>
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
  </div>
  
  
</div>
@endsection