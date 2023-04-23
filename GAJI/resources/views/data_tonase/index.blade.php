@extends('layout.dashboard')

@section('content')
    <h1 class="text-white text-center">Daftar data_tonase</h1>

    <div class="d-flex justify-content-center">
        <a href="/data_tonase/create" class="btn btn-primary btn-lg text-center">Tambah</a>
    </div>

    <table class="table text-white table-dark table-bordered container mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID data_tonase</th>
                <th scope="col">Tanggal Waktu</th>
                <th scope="col">ID Lapangan</th>
                <th scope="col">ID Pelanggan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_tonase as $key => $data_tonaseData)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $data_tonaseData->id_data_tonase }}</td>
                    <td>{{ $data_tonaseData->tanggal_waktu }}</td>
                    <td>{{ $data_tonaseData->id_lapangan }}</td>
                    <td>{{ $data_tonaseData->id_pelanggan }}</td>
                    <td>
                        @can('create', App\Models\data_tonase::class)
                            <a href="/data_tonase/edit/{{ $data_tonaseData->id }}">Edit</a>
                        @endcan

                        @can('create', App\Models\data_tonase::class)
                            <form action="{{ url('/data_tonase/delete/'.$data_tonaseData->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
