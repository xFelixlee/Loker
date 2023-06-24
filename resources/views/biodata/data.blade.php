@extends('frontend.profile')
@section("title",$title)
@section('content')

{{-- Main Content --}}

<!-- Default box -->

<div class="card">
    <div class="card-tools text-center">
        @if($dataExist)
            @foreach($dtBio as $rsBio)
                <a href="{{ url("biodata/form/".$rsBio->id) }}" class="btn btn-sm btn-dark col-sm-12">
                    Edit <i class="fas fa-edit"></i>
                </a>
            @endforeach
        @else
            <a href="{{ url("biodata/form/") }}" class="btn btn-sm btn-dark col-sm-12">
                Tambah <i class="fas fa-plus"></i>
            </a>
        @endif
    </div>
</div>

@foreach ($dtBio as $rsBio)
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        <h3><b>Biodata</b></h3>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <p class="mb-0"><b>Nama : </b>{{ $rsBio->nama }}</p>
                                <p class="mb-0"><b>Tanggal Lahir : </b>{{ $rsBio->tgl_lahir }}</p>
                                <p class="mb-0"><b>Tempat Lahir : </b>{{ $rsBio->tmpt_lahir }}</p>
                                <p class="mb-0"><b>Alamat : </b>{{ $rsBio->alamat }}</p>
                                <p class="mb-0"><b>Telephone : </b>{{ $rsBio->telp }}</p>
                                <p class="mb-0"><b>Status : </b>
                                    @if ($rsBio->status=="BM")
                                    <span>Belum Menikah</span>
                                    @else
                                    <span>Menikah</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-5 text-center">
                                @if($rsBio->foto!="")
                                <img class="img-circle elevation-2 mb-2" style="width: 150px; height:150px;" src="{{ asset($rsBio->foto) }}" alt="{{ $rsBio->mn_nama }}">
                                @else
                                <img class="img-circle elevation-2 mb-2" style="width: 150px; height:150px;" src="{{ asset('dist/img/profile.jpg') }}"
                                    alt="{{ $rsBio->mn_nama }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-4">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- End Main Content --}}

@endsection
