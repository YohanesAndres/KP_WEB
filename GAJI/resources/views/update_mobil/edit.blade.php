<h2>Edit Pelanggan</h2>
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('update_mobil/update/'.$update_mobil->id) }}" method="POST">
    @csrf
    @method('patch')


    status <br>
    <select name="status" id="status" class="form-control">
        <option value="sedang dijalan" {{ 'sedang dijalan' == $update_mobil->status ? 'selected' : '' }}>sedang dijalan</option>
        <option value="selesai" {{ 'selesai' == $update_mobil->status ? 'selected' : '' }}>selesai</option>
        <option value="accident" {{ 'accident' == $update_mobil->status ? 'selected' : '' }}>accident</option>
    </select>
    @error('jumlah_uang_jalan')
    {{ $message }}
    @enderror <br>


    keterangan <br>
    <input type="text" name="keterangan" id="keterangan" value="{{$update_mobil->keterangan}}">
    @error('keterangan')
    {{ $message }}
    @enderror <br>

   
    <input type="submit" value="Simpan Data">
</form>