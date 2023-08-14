@extends('frontend.template')
@section("title",$title)
@section('content')

    {{-- Main Content --}}
    <div class="container">
        <div class="card card-dark">
            <div class="card-header">
                <h4 class="text-center m-0">History Lamaran</h4>
            </div>
            <div class="card-body">

                @php
                    $dthistory = DB::table('lamar as a')
                    ->join('users as b','a.id_users','b.id')
                    ->join('lowongan as c','a.id_lowongan','c.id')
                    ->selectraw('a.*,b.name,c.nama_low,c.perusahaan_low')
                    ->where('a.id_users',Auth::user()->id)->get();
                @endphp
                @if ($dthistory->count() > 0)
                    <div class="row mt-2">
                        <div class="col-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>Tanggal Lamar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dthistory as $history)
                                    <tr>
                                        <td>{{ $history->nama_low }}</td>
                                        <td>{{ $history->perusahaan_low }}</td>
                                        <td>{{ $history->tgl_lamar }}</td>
                                        <td>
                                            @if($history->status == 0)
                                                <span class="badge bg-warning">Menunggu</span>
                                            @elseif($history->status == 1)
                                                <span class="badge bg-primary">Interview</span>
                                            @elseif($history->status == 2)
                                                <span class="badge bg-danger">Ditolak</span>
                                            @elseif($history->status == 3)
                                                <span class="badge bg-success">Diterima</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- End Main Content --}}

    @endsection
