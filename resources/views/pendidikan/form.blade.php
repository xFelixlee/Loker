@extends('frontend.template')

@section('content')
    <div class="container w-50">
        <div class="card">
            <div class="card-body">
                <form action="{{ url("pendidikan/save") }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="univ">Institusi / Universitas</label>
                        <input type="hidden" name="id_pendidikan" value="{{ @$rsPend->id }}">
                        <input type="text" class="form-control @error('univ') is-invalid @enderror" name="univ" id="univ" placeholder="Institusi / Universitas" value="{{ @$rsPend->univ }}">
                        @error('univ')
                            <div id="univ" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        @php
                            $tahun = date('Y');
                        @endphp
                        <select name="tahun_lulus" id="tahun_lulus" class="form-control @error('tahun_lulus') is-invalid @enderror" value="{{ @$rsPend->tahun_lulus }}">
                            @for ($i = $tahun; $i >= $tahun - 20; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('tahun_lulus')
                            <div id="tahun_lulus" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" placeholder="Jurusan" value="{{ @$rsPend->jurusan }}">
                        @error('jurusan')
                            <div id="jurusan" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" class="form-control @error('nilai') is-invalid @enderror" name="nilai" id="nilai" placeholder="Nilai" value="{{ @$rsPend->nilai }}">
                        @error('nilai')
                            <div id="nilai" class="invalid-feedback">
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
@endsection