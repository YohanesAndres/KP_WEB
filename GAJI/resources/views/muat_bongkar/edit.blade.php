<h2>Edit Pelanggan</h2>
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('muat_bongkar/update/'.$muat_bongkar->id) }}" method="POST">
    @csrf
    @method('patch')


    uang_jalan <br>
    <input type="text" name="uang_jalan" id="uang_jalan" value="{{$muat_bongkar->id_muat_bongkar}}">
    @error('uang_jalan')
    {{ $message }}
    @enderror <br>

    muatBongkar <br>
    <input type="text" name="muatBongkar" id="muatBongkar" value="{{$muat_bongkar->id_muat_bongkar}}">
    @error('muatBongkar')
    {{ $message }}
    @enderror <br>
   
    <input type="submit" value="Simpan Data">
</form>