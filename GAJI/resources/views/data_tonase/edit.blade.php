<h2>Edit Pelanggan</h2>
@if (session()->has('info'))
        {{ session()->get('info') }}
@endif
<form action="{{ url('data_tonase/update/'.$data_tonase->id) }}" method="POST">
    @csrf
    @method('patch')

    no spk <br>
    <input type="text" name="no_spk" id="no_spk" value="{{$data_tonase->id_data_tonase}}">
    @error('no_spk')
    {{ $message }}
    @enderror <br>

    no do <br>
    <input type="text" name="no_do" id="no_do" value="{{$data_tonase->id_data_tonase}}">
    @error('no_do')
    {{ $message }}
    @enderror <br>

    tonase actual <br>
    <input type="text" name="tonase_actual" id="tonase_actual" value="{{$data_tonase->id_data_tonase}}">
    @error('tonase_actual')
    {{ $message }}
    @enderror <br>

    Tujuan <br>
    <select name="id_muat_bongkar" id="id_muat_bongkar" class="form-control">
        @foreach ($tablemuatbongkarData as $item)
            <option value="{{ $item->id }}" {{ $item->id == $data_tonase->id_muat_bongkar ? 'selected' : '' }}>{{ $item->muatBongkar }}</option>
        @endforeach
    </select>
    @error('jumlah_uang_jalan')
    {{ $message }}
    @enderror <br>
   
   
    <input type="submit" value="Simpan Data">
</form>