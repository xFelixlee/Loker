@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')
<!-- Main content -->
<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">

        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-dark">
                <div class="inner">
                    <p>Kasir</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cash-register" style=color:white></i>
                </div>
                <a href="lowongan?id_cat=1" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
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
                <a href="lowongan?id_cat=2" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
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
                <a href="lowongan?id_cat=3" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
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
                <a href="lowongan?id_cat=4" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
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
                <a href="lowongan?id_cat=5" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
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
                <a href="lowongan?id_cat=6" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
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
                <a href="lowongan?id_cat=7" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
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
                <a href="lowongan?id_cat=8" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
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
                <a href="lowongan?id_cat=9" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
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
                <a href="lowongan?id_cat=10" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right ml-2"></i></a>
            </div>
        </div>

    </div>
</div>
<!-- /.row -->
@endsection
