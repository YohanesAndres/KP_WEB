@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/tujuan"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title">Form Tambah Tujuan</div>
  </div>
</div>
<hr>

<div class="form-group row offset-sm-1 col-sm-2">
    @if (session()->has('info'))
            {{ session()->get('info') }}
    @endif
</div>

<br>
</br>

<div class=formmarg>
  <form action="{{ url('/tujuan/store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group row">
          <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
          <div class="col-sm-9">
              <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Masukkan Tujuan">
              @error('tujuan')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
</div>

    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9" >
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </div>
</form>
@endsection