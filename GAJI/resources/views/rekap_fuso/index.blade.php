@extends('layout.dashboard')
@section('content')

<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="top-title no-space" style="margin-bottom:-15px">
  <div>
    @if (Auth::check())
        @if (Auth::user()->role === 'Administrator')
                <a href="{{ route('home2') }}"><img src="{{ asset('back.svg')}}" alt=""></a> 
        @elseif (Auth::user()->role === 'boss')
                <a href="{{ route('home') }}"><img src="{{ asset('back.svg')}}" alt=""></a>   
        @endif
    @endif
  </div>
  <div >
    <div class="text-white text-center text-title">Rekap Truk</div>
  </div>
</div>
<hr>

<div class="d-flex justify-content-center">
    <a href="/rekap_fuso/create" class="btn btn-primary btn-lg text-center">Tambah</a>
</div>

<div class="container mt-4">
    @foreach($rekap_fuso as $key  => $rekap_fusoData)
    <div class="row">
        <div class="col">
        <!-- <table>
            <tr>
                <th>No:</th>
                <th>Alamat:</th>
                <th>NO DO:</th>
                <th>NO SPK:</th>
                <th>Tujuan:</th>
                <th>NO Kontrak: </th>
                <th>Quantity DO (ton): </th>
            </tr>
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $rekap_fusoData->alamat }}</td>
                <td>{{ $rekap_fusoData->dataTonase->no_do }}</td>
                <td>{{ $rekap_fusoData->dataTonase->no_spk }}</td>
                <td>{{ $rekap_fusoData->dataTonase->tujuan->tujuan }}</td>
                <td>{{ $rekap_fusoData->no_kontrak }}</td>
                <td>{{ $rekap_fusoData->dataTonase->tonase_actual}}</td>
            </tr>
            <td>{{ ++$key }}</td>
        </table> -->
            <h3>No              :{{ $rekap_fusoData->id }}</h3>
            <p>Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{ $rekap_fusoData->alamat }}</p>
            <p>NO DO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{ $rekap_fusoData->dataTonase->no_do }}</p>
            <p>NO SPK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{ $rekap_fusoData->dataTonase->no_spk }}</p>
            <p>Tujuan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{ $rekap_fusoData->dataTonase->tujuan->tujuan }}</p>
            <p>NO Kontrak&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{ $rekap_fusoData->no_kontrak }}</p>
            <p>Quantity DO (ton)&nbsp;:&nbsp;{{ $rekap_fusoData->dataTonase->tonase_actual}}</p>
        <div>

            <div style="display:flex;gap:10px;margin-top:20px">
                <div class="d-flex justify-content-center">
                    <a href="/rekap_fuso/edit/{{ $rekap_fusoData->id }}" class="btn btn-edit btn-lg text-center">Edit</a>
                </div>

                <!-- <form action="{{ url('/rekap_fuso/delete/'.$rekap_fusoData->id) }}" method="post" class = "d-flex justify-content-center">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Rekap ini?')">Hapus</button>
                </form> -->
            </div>
            </div>

            <br></br>

            <div class="d-flex justify-content-center">
                <a href="/rekap_fusoDetail/create?rekap_fuso_id={{  $rekap_fusoData->id  }}" class="btn btn-tambah btn-lg text-center">Tambah</a>
            </div>


            <div class="bgtbl-container" style="margin-top:10px; margin-bottom:20px ;width:940px">
            <!-- <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0"> -->

            <table class="table text-white table-dark table-bordered mt-4">
                <thead>
                    <tr>
                        <!-- <th scope="col">No</th> -->
                        <th scope="col">ID UangJalan</th>
                        <th scope="col">Tanggal Muat</th>
                        <th scope="col">Tanggal Bongkar</th>
                        <th scope="col">Plat Kendaraan</th>
                        <th scope="col">Nama Sopir</th>
                        <th scope="col">Estimasi Tonase</th>
                        <th scope="col">BRUTO PKS</th>
                        <th scope="col">TARRA PKS</th>
                        <th scope="col">NETTO PKS</th>
                        <th scope="col">BRUTO BONGKAR</th>
                        <th scope="col">TARRA BONGKAR</th>
                        <th scope="col">NETTO BONGKAR</th>
                        <th scope="col">SUSUT</th>
                        <th scope="col">FFA/ALB PKS</th>
                        <th scope="col">KA PKS</th>
                        <th scope="col">FFA/ALB BONGKAR</th>
                        <th scope="col">KA BONGKAR</th>
                        <th scope="col">OVER TOLERANSI</th>
                        <th scope="col">UANG JALAN</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalTonase = 0;
                        $totalNettoPKS = 0;
                        $totalNettoBongkar = 0;
                        $totalSusut = 0;
                        $totalUangJalan = 0;
                        $overToleransi = 0;
                    @endphp
                    @foreach($rekap_fusoDetail as $key => $rekap_fuso_detailData)
                        @if($rekap_fuso_detailData->rekap_fuso_id == $rekap_fusoData->id)
                            <tr>
                                <!-- <td>{{ $loop->index + 1 }}</td> -->
                                <td>{{ $rekap_fuso_detailData->UangJalan->nomorUJ }}</td>
                                <td>{{ date('Y-m-d',strtotime($rekap_fuso_detailData->UangJalan->tanggal)) }}</td>
                                <td>
                                    @if ($rekap_fuso_detailData->UangJalan->update_mobil->status == 'selesai')
                                        {{ $rekap_fuso_detailData->UangJalan->update_mobil->tanggal_bongkar ?? '' }}
                                    @endif
                                </td>
                                
                                <td>{{ $rekap_fuso_detailData->UangJalan->kendaraan->plat }}</td>
                                <td>{{ $rekap_fuso_detailData->UangJalan->kendaraan->namasopir->name }}</td>
                                <td>{{ $rekap_fuso_detailData->UangJalan->kendaraan->tonase }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_muat_pks_bruto }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_muat_pks_tarra }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_bongkar_bruto }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_bongkar_tarra }}</td>
                                <td>{{ $rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra }}</td>
                                <td>
                                    @php
                                        $result = ($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra) - ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);
                                        if ($result < 0) {
                                            $result = 0;
                                        }
                                    @endphp
                                    {{ $result }}
                                </td>
                                <td>{{ $rekap_fuso_detailData->mutu_pks_ffa_alb }}</td>
                                <td>{{ $rekap_fuso_detailData->mutu_pks_ka }}</td>
                                <td>{{ $rekap_fuso_detailData->mutu_bongkar_ffa_alb }}</td>
                                <td>{{ $rekap_fuso_detailData->mutu_bongkar_ka }}</td>
                                <td>
                                    @php
                                        $uangjalans = ($rekap_fuso_detailData->UangJalan->uang_Jalan);
                                        if ($uangjalans < 0){
                                            $uangjalans = 0;
                                        }
                                        elseif ($uangjalans < 200000) {
                                            $uangjalans = 0.002*($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
                                        }
                                        elseif ($uangjalans >= 200001 && $uangjalans <= 1000000) {
                                            $uangjalans = 0.003*($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
                                        }
                                        elseif ($uangjalans >= 1000001 && $uangjalans <= 2999999) {
                                            $uangjalans = 0.003*($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
                                        }
                                        else {
                                            $uangjalans = 0.002*($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
                                        }
                                    @endphp
                                    {{ number_format(ceil($uangjalans), 0, ",", "." ) }}
                                </td>
                                <td>{{ number_format($rekap_fuso_detailData->UangJalan->uang_Jalan,0,",",".") }}</td>
                                <td >

                                <div>
                                    <div style="display:flex;gap:10px;margin-top:10px">
                                        <div class="d-flex justify-content-center">
                                            <a href="/rekap_fusoDetail/edit/{{ $rekap_fuso_detailData->id }}" class="btn btn-edit btn-lg text-center">Edit</a>
                                        </div>

                                        <form action="{{ url('/rekap_fusoDetail/delete/'.$rekap_fuso_detailData->id) }}" method="post" class = "d-flex justify-content-center">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Rekap Detail ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            @php
                                $totalTonase += $rekap_fuso_detailData->UangJalan->kendaraan->tonase;
                                $totalNettoPKS += ($rekap_fuso_detailData->quantity_muat_pks_bruto - $rekap_fuso_detailData->quantity_muat_pks_tarra);
                                $totalNettoBongkar += ($rekap_fuso_detailData->quantity_bongkar_bruto - $rekap_fuso_detailData->quantity_bongkar_tarra);
                                $totalSusut += $result;
                                $totalUangJalan += $rekap_fuso_detailData->UangJalan->uang_Jalan;
                                $overToleransi += (ceil($uangjalans));
                            @endphp
                        @endif
                    @endforeach
                    <tr>
                        <td>TOTAL</td>
                        <td colspan="4"></td>
                        <td>{{ number_format($totalTonase,0,",",".") }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ number_format($totalNettoPKS,0,",",".") }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ number_format($totalNettoBongkar,0,",",".") }}</td>
                        <td>{{ number_format($totalSusut,0,",",".") }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ number_format($overToleransi,0,",",".") }}</td>
                        <td>{{ number_format($totalUangJalan,0,",",".") }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
