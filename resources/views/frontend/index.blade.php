@extends('frontend.template')
@section('content')

{{-- Main Content --}}
<div class="container-fluid">
    <!-- Info boxes -->
    <div class="container">

        @php
           $file_u = DB::table('file')->where('id_users',Auth::user()->id)->count();
            $pendidikan = DB::table('pendidikan')->where('id_user',Auth::user()->id)->count();
            $pengalaman = DB::table('pengalaman')->where('id_user',Auth::user()->id)->count();
            $biodata = DB::table('biodata')->where('id_user',Auth::user()->id)->count();
        @endphp
        @if (Auth::user()->role == 'Admin') 

        @else
        @if ($file_u > 0 && $pendidikan > 0 && $pengalaman > 0 && $biodata > 0)
        @else
        <div class="row mt-2">
            <div class="col-12">
                <div class="card bg-gradient-danger">
                    <div class="card-body">
                    Silahkan lengkapi Biodata , pengalaman , pendidikan dan resume dulu <a class="text-light" href="{{url("/biodata")}}">Disini !</a>
                    </div>
                    
                    </div>
            </div>
        </div>
        @endif
        @endif

        <div class="row mt-2">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <p>Kasir</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cash-register" style=color:white></i>
                    </div>
                    <a href="low?id_cat=1" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
                </div>
            </div>
    
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <p>Customer Service</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user" style=color:white></i>
                    </div>
                    <a href="low?id_cat=2" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
                </div>
            </div>
    
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <p>Teknisi Laptop</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-screwdriver" style=color:white></i>
                    </div>
                    <a href="low?id_cat=3" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
                </div>
            </div>
    
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <p>Teknisi Elektronik</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bolt" style=color:white></i>
                    </div>
                    <a href="low?id_cat=4" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
                </div>
            </div>
    
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <p>Teknisi Software</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-desktop" style=color:white></i>
                    </div>
                    <a href="low?id_cat=5" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
                </div>
            </div>
    
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <p>Teknisi Printer</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-print" style=color:white></i>
                    </div>
                    <a href="low?id_cat=6" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
                </div>
            </div>
    
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <p>Staff Gudang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-warehouse" style=color:white></i>
                    </div>
                    <a href="low?id_cat=7" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
                </div>
            </div>
    
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <p>Admin</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users" style=color:white></i>
                    </div>
                    <a href="low?id_cat=8" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
                </div>
            </div>
    
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <p>Programer</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-code" style=color:white></i>
                    </div>
                    <a href="low?id_cat=9" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
                </div>
            </div>
    
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <p>Percetakan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file" style=color:white></i>
                    </div>
                    <a href="low?id_cat=10" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
                </div>
            </div>
    
        </div>
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
{{-- End Main Content --}}
    
@endsection


    