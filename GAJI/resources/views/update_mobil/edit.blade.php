<h2>Edit Pelanggan</h2>
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('update_mobil/update/'.$update_mobil->id) }}" method="POST">
    @csrf
    @method('patch')


    tanggal <br>
    <input type="text" name="tanggal" id="tanggal" value="{{$tanggal->id_tanggal}}">
    @error('tanggal')
    {{ $message }}
    @enderror <br>

    status <br>
    <input type="text" name="status" id="status" value="{{$status->id_status}}">
    @error('status')
    {{ $message }}
    @enderror <br>

    id_kendaraan <br>
    <input type="text" name="id_kendaraan" id="id_kendaraan" value="{{$id_kendaraan->id_id_kendaraan}}">
    @error('id_kendaraan')
    {{ $message }}
    @enderror <br>
    

    keterangan <br>
    <input type="text" name="keterangan" id="keterangan" value="{{$keterangan->id_keterangan}}">
    @error('keterangan')
    {{ $message }}
    @enderror <br>

   
    <input type="submit" value="Simpan Data">
</form>