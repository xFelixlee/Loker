@extends('frontend.template')
@section('content')

    {{-- Main Content --}}
    <div class="container">
        @foreach ($dtLow as $rsLowongan)
        <div class="card card-dark">
            <div class="card-header">
                <h4 class="card-title">{{ $rsLowongan->nama_low }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 col-lg-2">
                    @if($rsLowongan->foto!="")                                
                    <img class="thumb-logo" src="{{ asset($rsLowongan->foto) }}" alt="{{ $rsLowongan->nama_low }}">
                    @else
                        <img class="thumb-logo" src="{{ asset('images/no-image.jpg') }}" alt="{{ $rsLowongan->nama_low }}">
                    @endif
                    </div>
                    <div class="col-md-8 col-lg-8">
                        <h2><a style="color:#000;" href="{{ url("detail_low",$rsLowongan->id) }}">{{ $rsLowongan->nama_low }}</h2></a>
                        <p class="mb-0">{{ $rsLowongan->perusahaan_low }}</p>
                        <p class="mb-0">{{ $rsLowongan->alamat_low }}</p>
                        <p class="mb-0">Posisi : {{ $rsLowongan->posisi }}</p>
                        <p class="mb-0"><a href="{{ url("detail_low",$rsLowongan->id) }}"><i class="fas fa-arrow-right"></i> Lihat selengkapnya </a></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <br><br><br><br>
    </div>
    {{-- End Main Content --}}

    @endsection
