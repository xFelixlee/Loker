@extends('layouts.template')

@section('title',$title)

@section('content')

<ul id = "ul" class="list-group col-md-6">
    <li class="list-group-item" style="background-color: #f0b663"><strong>{{ $rsLow->mn_nama }}</strong></li>
    <li class="list-group-item">
        <br>
        <img class="thumb-menu-bigg" src="{{ asset($rsLow->foto) }}" alt="{{ $rsLow->mn_nama }}"> 
        <br><br> 
    </li>
    <li class="list-group-item">
        <strong>Nama</strong> : {{ $rsLow->nama_low }}
    </li>
    <li class="list-group-item">
        <strong>Perusahaan</strong> : {{ $rsLow->perusahaan_low }}
    </li>
    <li class="list-group-item">
        <strong>Alamat</strong> : {{ $rsLow->alamat_low }}
    </li>
    <li class="list-group-item">
        <strong>Deskripsi</strong> : {!! $rsLow->desc_low !!}
    </li>
    <li class="list-group-item">
        <strong>Kriteria</strong> : {!! $rsLow->kriteria_low !!}
    </li>
    <li class="list-group-item">
        <strong>Sistem Kerja</strong> : 
        @if ($rsLow->sistem_kerja=="FT")
        <span>Full Time</span>
        @else
        <span>Part Time</span>
        @endif
    </li>
    <li class="list-group-item">
        <strong>Deadline</strong> : {{ $rsLow->deadline }}
    </li>
    <br><br><br>
</ul>

@endsection