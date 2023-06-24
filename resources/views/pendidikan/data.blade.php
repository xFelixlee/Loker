@extends('frontend.profile')
@section("title",$title)
@section('content')
<div class="card">
    <div class="card-tools text-center">
        <a href="{{ url("pendidikan/form/") }}" class="btn btn-sm btn-dark col-sm-12">
            Tambah <i class="fas fa-plus"></i>
        </a>
    </div>
</div>
@foreach ($dtPend as $rsPend)
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-12 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            <h3><b>Pendidikan</b></h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <p class="mb-0"><b>Universitas / Instansi : </b>{{ $rsPend->univ }}</p>
                                    <p class="mb-0"><b>Tahun Lulus : </b>{{ $rsPend->tahun_lulus }}</p>
                                    <p class="mb-0"><b>Jurusan : </b>{{ $rsPend->jurusan }}</p>
                                    <p class="mb-0"><b>Nilai : </b>{{ $rsPend->nilai }}</p>
                                </div>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row text-center">
                                <a href="{{ url("pendidikan/form/".$rsPend->id) }}" class="btn btn-sm btn-dark col-2">
                                    Edit <i class="fas fa-edit"></i>
                                </a>
                                <div class="col-8"></div>
                                <a href="{{ url("pendidikan/delete/".$rsPend->id) }}" class="btn btn-sm btn-danger col-2">
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