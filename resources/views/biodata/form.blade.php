@extends('frontend.template')

@section('content')
<div class="container">
    <br><br>
    <form action="{{ url("biodata/save") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            @if(@$rsBio->foto)   
                                @if(file_exists($rsBio->foto))                         
                                    <img class="thumb-menu-big" src="{{ asset(@$rsBio->foto) }}" alt="{{ @$rsBio->nama }}">
                                @else
                                    <img class="thumb-menu-big" src="{{ asset('dist/img/profile.jpg') }}" alt="{{ @$rsBio->nama }}">
                                @endif
                            @else
                                <img class="thumb-menu-big" src="{{ asset('dist/img/profile.jpg') }}" alt="{{ @$rsBio->nama }}">
                            @endif
                            <input type="file" name="foto" id="foto">
                            <input type="hidden" name="old_foto" value="{{ @$rsBio->foto }}">
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
                            <label for="nama">Nama</label>
                            <input type="hidden" name="id_biodata" value="{{ @$rsBio->id }}">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama" value="{{ @$rsBio->nama }}">
                            @error('nama')
                                <div id="nama" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="hidden" name="id_user" value="{{ @$rsBio->id }}">
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir" value="{{ @$rsBio->tgl_lahir }}">
                            @error('tgl_lahir')
                                <div id="tgl_lahir" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="tmpt_lahir">Tempat Lahir</label>
                            <input type="hidden" name="tmpt_lahir" value="{{ @$rsBio->id }}">
                            <input type="text" class="form-control @error('tmpt_lahir') is-invalid @enderror" name="tmpt_lahir" id="tmpt_lahir" placeholder="Tempat Lahir" value="{{ @$rsBio->tmpt_lahir }}">
                            @error('tmpt_lahir')
                                <div id="tmpt_lahir" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="hidden" name="alamat" value="{{ @$rsBio->id }}">
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat" value="{{ @$rsBio->alamat }}">
                            @error('alamat')
                                <div id="alamat" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="telp">Telephone</label>
                            <input type="hidden" name="telp" value="{{ @$rsBio->id }}">
                            <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" placeholder="Telephone" value="{{ @$rsBio->telp }}">
                            @error('telp')
                                <div id="telp" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                <option value="BM" {{ @$rsBio->status=="BM" ? "selected" : "" }}>Belum Menikah</option>
                                <option value="M" {{ @$rsBio->status=="M" ? "selected" : "" }}>Menikah</option>
                            </select>
                            @error('status')
                            <div id="status" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <input type="submit" class="btn btn-dark" value="S A V E">
                        </div>                     
                    </div>
                </div>
            </div>
        </div>    
    </form>
    <br><br><br><br>
</div>
@endsection