<h2>Edit Pelanggan</h2>
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('kendaraan/update/'.$kendaraan->id) }}" method="POST">
    @csrf
    @method('patch')


    plat <br>
    <input type="text" name="plat" id="plat" value="{{$kendaraan->id_kendaraan}}">
    @error('plat')
    {{ $message }}
    @enderror <br>

    tonase <br>
    <input type="text" name="tonase" id="tonase" value="{{$kendaraan->id_kendaraan}}">
    @error('tonase')
    {{ $message }}
    @enderror <br>

    id_namasopir <br>
    <input type="text" name="id_namasopir" id="id_namasopir" value="{{$kendaraan->id_kendaraan}}">
    @error('id_namasopir')
    {{ $message }}
    @enderror <br>

    id_kategori <br>
    <input type="text" name="id_kategori" id="id_kategori" value="{{$kendaraan->id_kendaraan}}">
    @error('id_kategori')
    {{ $message }}
    @enderror <br>
   
    <input type="submit" value="Simpan Data">
</form>