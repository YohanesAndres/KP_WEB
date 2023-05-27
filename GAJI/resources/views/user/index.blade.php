@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/home"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div>
    <div class="text-white text-center text-title"> Daftar Akun</div>
  </div>
</div>
<hr>
<div class="d-flex justify-content-center">
  <button class="btn btn-primary btn-lg text-center" onclick="location.href='/user/create'">Tambah</button>
</div>

<div class="bgtbl" style="margin-top:10px; margin-bottom:20px">

<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($akun as $account)
    <tr>
        <td>{{ $account->name }}</td>
        <td>{{ $account->email }}</td>
        <td style="display:flex">   
          <a href="/user/edit/{{ $account->id }}" class="btn btn-edit">Edit</a>
            <form action="{{ url('/user/delete/'.$account->id) }}" method="post">
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