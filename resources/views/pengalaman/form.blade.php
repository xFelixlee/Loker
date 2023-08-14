@extends('frontend.template')

@section('content')
    <div class="container w-50">
        <div>
            <div class="card">
                <h3 class="text-center mt-1"><b>Form Pengalaman</b></h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ url("pengalaman/save") }}" method="post">
                        @csrf
    
                        <div class="form-group">
                            <label for="posisi">Posisi</label>
                            <input type="hidden" name="id_pengalaman" value="{{ @$rsPeng->id }}">
                            <input type="text" class="form-control @error('posisi') is-invalid @enderror" name="posisi" id="posisi" placeholder="Posisi" value="{{ @$rsPeng->posisi }}">
                            @error('posisi')
                                <div id="posisi" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="perusahaan">Perusahaan</label>
                            <input type="hidden" name="id_user" value="{{ @$rsPeng->id }}">
                            <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" id="perusahaan" placeholder="Perusahaan" value="{{ @$rsPeng->perusahaan }}">
                            @error('perusahaan')
                                <div id="perusahaan" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="tgl_masuk">Tanggal Masuk</label>
                            <input type="hidden" name="id_user" value="{{ @$rsPeng->id }}">
                            <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" name="tgl_masuk" id="tgl_masuk" value="{{ @$rsPeng->tgl_masuk }}">
                            @error('tgl_masuk')
                                <div id="tgl_masuk" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="tgl_keluar">Tanggal Keluar</label>
                            <input type="hidden" name="id_user" value="{{ @$rsPeng->id }}">
                            <input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror" name="tgl_keluar" id="tgl_keluar" value="{{ @$rsPeng->tgl_keluar }}">
                            @error('tgl_keluar')
                                <div id="tgl_keluar" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" placeholder="Keterangan">{{ @$rsPeng->keterangan }}</textarea>
                            @error('keterangan')
                                <div id="keterangan" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-dark" value="S A V E">
                        </div>
                    </form>        
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
@endsection