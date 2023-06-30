@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    <a href="/namasopir"><img src="{{ asset('back.svg')}}" alt=""></a> 
  </div>
  <div >
    <div class="text-white text-center text-title">Form Edit Daftar Sopir</div>
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
  <form action="{{ url('namasopir/update/'.$user->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('patch')

      <div class="form-group row">
            <label for="idSopir" class="col-sm-3 col-form-label">ID Sopir</label>
            <div class="col-sm-9">
                <input type="number" name="idSopir" id="idSopir" class="form-control" value="{{$user->idSopir}}" placeholder="Masukkan ID Sopir" oninput="validateIDSOPIRLength(this)">
                @error('idSopir')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
      </div>

      <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Nama Sopir</label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat Sopir</label>
            <div class="col-sm-9">
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{$user->alamat}}">
                @error('alamat')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
      </div>

      <div class="form-group row">
            <label for="NIK" class="col-sm-3 col-form-label">NIK Sopir</label>
            <div class="col-sm-9">
                <input type="number" name="NIK" id="NIK" class="form-control" value="{{$user->NIK}}" oninput="validateNIKLength(this)">
                @error('NIK')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
      </div>

      <div class="form-group row">
          <label for="foto" class="col-sm-3 col-form-label">Foto</label>
          <div class="col-sm-9">
              <input type="file" name="foto" id="foto" class="form-control-file">
              @error('foto')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>

      <div class="form-group row">
          <label for="previewFoto" class="col-sm-3 col-form-label">Preview Foto</label>
          <div class="col-sm-9">
              <img id="previewFoto" src="#" alt="Preview Foto" style="max-width: 200px;">
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

@section('script')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewFoto')
                    .attr('src', e.target.result);
                
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#foto").change(function () {
        readURL(this);
    });

    function validateNIKLength(input) {
        if (input.value.length > 16) {
            input.value = input.value.slice(0, 16); // Menghapus karakter setelah 16 digit
        }
    }

    function validateIDSOPIRLength(input) {
        if (input.value.length > 4) {
            input.value = input.value.slice(0, 4); // Menghapus karakter setelah 16 digit
        }
    }
</script>
@endsection