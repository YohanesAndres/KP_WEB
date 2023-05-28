@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/muat_bongkar"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title">Form Edit Muat Bongkar</div>
  </div>
</div>
<hr>


<div class="form-group row offset-sm-1 col-sm-4">
    @if (session()->has('info'))
            {{ session()->get('info') }}
    @endif
</div>

<br>
</br>

<div class=formmarg>
    <form action="{{ url('muat_bongkar/update/'.$muat_bongkar->id) }}" method="POST">
        @csrf
        @method('patch')

        <div class="form-group row">
            <label for="muatBongkar" class="col-sm-3 col-form-label">Muat Bongkar</label>
            <div class="col-sm-9">
                <input type="text" name="muatBongkar" id="muatBongkar" class="form-control" value="{{$muat_bongkar->muatBongkar}}">
                @error('muatBongkar')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        <div class="form-group row">
            <label for="id_tujuan" class="col-sm-3 col-form-label">Tujuan</label>
            <div class="col-sm-9">
                <select name="id_tujuan" id="id_tujuan" class="form-control">
                    <option value="">Pilih Tujuan</option>
                    @foreach ($tabletujuanData as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $muat_bongkar->id_tujuan ? 'selected' : '' }}>{{ $item->tujuan }}</option>
                    @endforeach
                </select>
                @error('id_tujuan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="uang_jalan" class="col-sm-3 col-form-label">Uang Jalan</label>
            <div class="col-sm-9">
                <input type="text" name="uang_jalan" id="uang_jalan" class="form-control" value="{{$muat_bongkar->uang_jalan}}">
                @error('uang_jalan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9" >
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </form>
</div>
@endsection