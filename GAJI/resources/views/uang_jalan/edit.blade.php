<h2>Edit Pelanggan</h2>
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('uang_jalan/update/'.$uang_jalan->id) }}" method="POST">
    @csrf
    @method('patch')


    tanggal <br>
    <input type="text" name="tanggal" id="tanggal" value="{{$tanggal->id_tanggal}}">
    @error('tanggal')
    {{ $message }}
    @enderror <br>

    id_kendaraan <br>
    <input type="text" name="id_kendaraan" id="id_kendaraan" value="{{$id_kendaraan->id_id_kendaraan}}">
    @error('id_kendaraan')
    {{ $message }}
    @enderror <br>
    
    barcode <br>
    <input type="text" name="barcode" id="barcode" value="{{$barcode->id_barcode}}">
    @error('barcode')
    {{ $message }}
    @enderror <br>

    id_muat_bongkar <br>
    <input type="text" name="id_muat_bongkar" id="id_muat_bongkar" value="{{$id_muat_bongkar->id_id_muat_bongkar}}">
    @error('id_muat_bongkar')
    {{ $message }}
    @enderror <br>

    jumlah_uang_jalan <br>
    <input type="text" name="jumlah_uang_jalan" id="jumlah_uang_jalan" value="{{$jumlah_uang_jalan->id_jumlah_uang_jalan}}">
    @error('jumlah_uang_jalan')
    {{ $message }}
    @enderror <br>

    cek <br>
    <input type="text" name="cek" id="cek" value="{{$cek->id_cek}}">
    @error('cek')
    {{ $message }}
    @enderror <br>
   
    <input type="submit" value="Simpan Data">
</form>