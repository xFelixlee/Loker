@extends('frontend.template')
@section('content')

<div class="container">
    <div class="card card-dark">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    @if($rsLowongan->foto!="")                                
                    <img class="thumb-logo" src="{{ asset($rsLowongan->foto) }}" alt="{{ $rsLowongan->mn_nama }}">
                    @else
                        <img class="thumb-logo" src="{{ asset('images/no-image.jpg') }}" alt="{{ $rsLowongan->mn_nama }}">
                    @endif
                    <div class="row">
                        <div class="col-md-4"><strong>Posisi</strong></div>
                        <div class="col-md-8">: {{ $rsLowongan->posisi }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Sistem Kerja</strong></div>
                        <div class="col-md-8">: 
                            @if ($rsLowongan->sistem_kerja=="FT")
                            <span>Full Time</span>
                            @else
                            <span>Part Time</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Tanggal Akhir</strong></div>
                        <div class="col-md-8">: {{ $rsLowongan->deadline }}</div>
                    </div>
                    </div>
                    <div class="col-md-8 col-lg-8">
                        <h2>{{ $rsLowongan->nama_low }}</h2>
                        <p class="mb-0">{{ $rsLowongan->perusahaan_low }}</p>
                        <p class="mb-0">{{ $rsLowongan->alamat_low }}</p>
                        <h4>Description : </h4>
                        {!! $rsLowongan->desc_low !!}
                        <h4 class="mt-2">Kriteria : </h4>
                        {!! $rsLowongan->kriteria_low !!}
                        
                    </div>
                </div>
            </div>
        </div>
        @if ($rslamar->count()==0)
        <div class="card-footer elevation-1" style="background-color: white; border-radius:8px;">
            <div style="text-align: right;">
                <a href="{{ route("apply",["id_lowongan"=>$rsLowongan->id]) }}" class="btn btn-dark">- A p p l y -</i></a>
            </div>
        </div>
        @endif
    </div>
    <br><br><br>
</div>

@endsection