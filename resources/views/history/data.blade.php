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
                        <td>{{ $history->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>            
    </div>
</div> 
@endsection