@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')
<form action="{{ url("lowongan/save") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        @if(@$rsLow->foto)   
                            @if(file_exists($rsLow->foto))                         
                                <img class="thumb-menu-big" src="{{ asset(@$rsLow->foto) }}" alt="{{ @$rsLow->nama_low }}">
                            @else
                                <img class="thumb-menu-big" src="{{ asset('images/No-image.jpg') }}" alt="{{ @$rsLow->nama_low }}">
                            @endif
                        @else
                            <img class="thumb-menu-big" src="{{ asset('images/No-image.jpg') }}" alt="{{ @$rsLow->nama_low }}">
                        @endif
                        <input type="file" name="foto" id="foto">
                        <input type="hidden" name="old_foto" value="{{ @$rsLow->foto }}">
                        @error('foto')
                            <div id="foto" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="id_cat">Category</label>                        
                        <select class="form-control @error('id_cat') is-invalid @enderror" name="id_cat" id="id_cat">
                            <option value="">- Kategori -</option>
                            @foreach ($dtCat as $rsCat)
                                <option value="{{ $rsCat->id }}" {{ @$rsLow->id_cat==$rsCat->id ? "selected" : "" }}>{{ $rsCat->cat_nm }}</option>
                            @endforeach
                        </select>
                        @error('id_cat')
                            <div id="id_cat" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="nama_low">Nama</label>
                        <input type="hidden" name="id_low" value="{{ @$rsLow->id }}">
                        <input type="text" class="form-control @error('nama_low') is-invalid @enderror" name="nama_low" id="nama_low" placeholder="Nama Lowongan" value="{{ @$rsLow->nama_low }}">
                        @error('nama_low')
                            <div id="nama_low" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="perusahaan_low">Perusahaan</label>
                        <input type="hidden" name="perusahaan_low" value="{{ @$rsLow->id }}">
                        <input type="text" class="form-control @error('perusahaan_low') is-invalid @enderror" name="perusahaan_low" id="perusahaan_low" placeholder="Perusahaan" value="{{ @$rsLow->perusahaan_low }}">
                        @error('perusahaan_low')
                            <div id="perusahaan_low" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_low">Alamat</label>
                        <input type="hidden" name="alamat_low" value="{{ @$rsLow->id }}">
                        <input type="text" class="form-control @error('alamat_low') is-invalid @enderror" name="alamat_low" id="alamat_low" placeholder="Alamat" value="{{ @$rsLow->alamat_low }}">
                        @error('alamat_low')
                            <div id="alamat_low" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="desc_low">Deskripsi</label>
                        <textarea type="text" class="text-editor form-control @error('desc_low') is-invalid @enderror" name="desc_low" id="desc_low" placeholder="Deskripsi">{{ @$rsLow->desc_low }}</textarea>
                        @error('desc_low')
                            <div id="desc_low" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kriteria_low">Kriteria</label>
                        <textarea type="text" class="text-editor form-control @error('kriteria_low') is-invalid @enderror" name="kriteria_low" id="kriteria_low" placeholder="Deskripsi">{{ @$rsLow->kriteria_low }}</textarea>
                        @error('kriteria_low')
                            <div id="kriteria_low" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input type="hidden" name="id_user" value="{{ @$rsLow->id }}">
                        <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" id="deadline" value="{{ @$rsLow->deadline }}">
                        @error('deadline')
                            <div id="deadline" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="posisi">Posisi</label>
                        <input type="hidden" name="posisi" value="{{ @$rsLow->id }}">
                        <input type="text" class="form-control @error('posisi') is-invalid @enderror" name="posisi" id="posisi" placeholder="Posisi" value="{{ @$rsLow->posisi }}">
                        @error('posisi')
                            <div id="posisi" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sistem_kerja">Sistem Kerja</label>
                        <select class="form-control @error('sistem_kerja') is-invalid @enderror" name="sistem_kerja" id="sistem_kerja">
                            <option value="FT" {{ @$rskar->sistem_kerja=="L" ? "selected" : "" }}>Full Time</option>
                            <option value="PT" {{ @$rskar->sistem_kerja=="P" ? "selected" : "" }}>Part Time</option>
                        </select>
                        @error('sistem_kerja')
                        <div id="sistem_kerja" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="S A V E">
                    </div>                     
                </div>
            </div>
        </div>
    </div>    
</form> 
@endsection