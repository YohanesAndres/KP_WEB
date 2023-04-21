<h2>Edit Pelanggan</h2>
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('nama_sopir/update/'.$nama_sopir->id) }}" method="POST">
    @csrf
    @method('patch')


    nama_sopir <br>
    <input type="text" name="nama_sopir" id="nama_sopir" value="{{$nama_sopir->id_nama_sopir}}">
    @error('nama_sopir')
    {{ $message }}
    @enderror <br>
   
    <input type="submit" value="Simpan Data">
</form>