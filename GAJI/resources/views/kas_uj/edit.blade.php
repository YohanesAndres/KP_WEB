<h2>Edit Pelanggan</h2>
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('kas_uj/update/'.$kas_uj->id) }}" method="POST">
    @csrf
    @method('patch')

    tanggal <br>
    <input type="text" name="tanggal" id="tanggal" value="{{$kas_uj->id_kas_uj}}">
    @error('tanggal')
    {{ $message }}
    @enderror <br>

    jumlah uang <br>
    <input type="text" name="jumlah_uang" id="jumlah_uang" value="{{$kas_uj->id_kas_uj}}">
    @error('jumlah_uang')
    {{ $message }}
    @enderror <br>

    expenses <br>
    <input type="text" name="expenses" id="expenses" value="{{$kas_uj->id_kas_uj}}">
    @error('expenses')
    {{ $message }}
    @enderror <br>
   
   
   
    <input type="submit" value="Simpan Data">
</form>