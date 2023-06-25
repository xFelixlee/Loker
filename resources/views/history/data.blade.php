@extends('frontend.profile')
@section("title",$title)
@section('content')
<div class="card">
    <div class="card-tools text-center mt-1">
        <h3><b>History</b></h3>
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
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
@endsection
