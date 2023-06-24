@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="dtLamar" class="dtTable table table-bordered table-hover">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Lowongan</th>
                    <th>Perusahaan</th>
                    <th>Alamat</th>
                    <th>Deadline</th>
                    <th>Sistem Kerja</th>
                    <th>Jumlah Pelamar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtLoker as $rsLamar)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            {{-- <td>{{ $rsLamar->id }}</td> --}}
                            {{-- <td>{{ $rsLamar->id_cat }}</td> --}}
                            <td><a href={{ route("detail_loker",["id_lowongan"=>$rsLamar->id]) }}>{{ $rsLamar->nama_low }}</td></a>
                            <td>{{ $rsLamar->perusahaan_low }}</td>
                            <td>{{ $rsLamar->alamat_low }}</td>
                            {{-- <td>{{ $rsLamar->desc_low }}</td> --}}
                            {{-- <td>{{ $rsLamar->kriteria_low }}</td> --}}
                            <td>{{ \Carbon\Carbon::parse($rsLamar->deadline)->format('d/m/Y') }}</td>
                            <td>{{ $rsLamar->sistem_kerja }}</td>
                            <td class="text-center"><a href={{ route("detail_loker",["id_lowongan"=>$rsLamar->id]) }}>{{ $rsLamar->jumlah_pelamar }}</td></a>
                            {{-- <td>
                                @if ($rsLamar->status==0)
                                <span class="badge badge-warning">Menunggu</span>
                                @endif
                                @if ($rsLamar->status==1)
                                <span class="badge badge-success">Diterima</span>
                                @endif
                                @if ($rsLamar->status==2)
                                <span class="badge badge-danger">Ditolak</span>
                                @endif
                            </td> --}}
                            {{-- <td>
                                @if($rsLamar->status==0)                              
                                <a href="{{ url("transaction/".$rsLamar->id."/1") }}"><i class="text-success fas fa-check"></i></a>
                                @endif
                                @if($rsLamar->status==0)                              
                                <a href="{{ url("transaction/".$rsLamar->id."/2") }}"><i class="text-danger fas fa-x"></i></a>
                                @endif
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div> 
@endsection
<br>