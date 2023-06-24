@extends('frontend.profile')
@section("title",$title)
@section('content')
<div class="card">
    <div class="card-tools text-center">
        <a href="{{ url("pengalaman/form/") }}" class="btn btn-sm btn-dark col-sm-12">
            Tambah <i class="fas fa-plus"></i>
        </a>
    </div>
</div>
@foreach ($dtPeng as $rsPeng)
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-12 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            <h3><b>Pengalaman</b></h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <p class="mb-0"><b>Posisi : </b>{{ $rsPeng->posisi }}</p>
                                    <p class="mb-0"><b>Perusahaan : </b>{{ $rsPeng->perusahaan }}</p>
                                    <p class="mb-0"><b>Tanggal masuk : </b>{{ $rsPeng->tgl_masuk }}</p>
                                    <p class="mb-0"><b>Tanggal Keluar : </b>{{ $rsPeng->tgl_keluar }}</p>
                                    <p class="mb-0"><b>Keterangan : </b>{{ $rsPeng->keterangan }}</p>
                                </div>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row text-center">
                                <a href="{{ url("pengalaman/form/".$rsPeng->id) }}" class="btn btn-sm btn-dark col-2">
                                    Edit <i class="fas fa-edit"></i>
                                </a>
                                <div class="col-8"></div>
                                <a href="{{ url("pengalaman/delete/".$rsPeng->id) }}" class="btn btn-sm btn-danger col-2">
                                    delete <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection