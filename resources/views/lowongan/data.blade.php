@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')

<form id="myForm" method="GET" action="{{url('lowongan')}}">   
    <div  class="card-tools text-right mb-2 mr-2">
        <a href="{{ url("lowongan") }}" class="mr-1 btn btn-dark btn-sm">Refresh</a>
        <a href="{{ url("lowongan/form") }}" class="btn btn-dark btn-sm">Tambah Lowongan </a>
        {{-- Kategori --}} 
        <select onchange="submitForm()" class="btn btn-dark btn-sm @error('id_cat') is-invalid @enderror" name="id_cat" id="id_cat">
            <option value="">Category</option>
            @foreach ($dtCat as $rsCat)
                <option value="{{ $rsCat->id }}" {{ @$rsLow->id_cat==$rsCat->id ? "selected" : "" }}>{{ $rsCat->cat_nm }}</option>
            @endforeach
        </select>
    </div>
</form>

    <div class="card">
        <div class="card-body">
            <table id="dtLow" class="dtTable table table-bordered table-hover">
                <thead>
                    <tr>
                    {{-- <th>No</th> --}}
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Perusahaan</th>
                    <th>Alamat</th>
                    {{-- <th>Deskripsi</th> --}}
                    {{-- <th>Kriteria</th> --}}
                    <th>Deadline</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($dtLow as $rsLow)
                        <tr>
                            {{-- <td >{{ $rsLow->id }}</td> --}}
                            <td>
                                @if($rsLow->foto!="")                                
                                    <img class="thumb-menu" src="{{ asset($rsLow->foto) }}" alt="{{ $rsLow->mn_nama }}">
                                @else
                                    <img class="thumb-menu" src="{{ asset('images/no-image.jpg') }}" alt="{{ $rsLow->mn_nama }}">
                                @endif
                            </td>
                            <td>{{ $rsLow->nama_low }}</td>
                            <td>{{ $rsLow->perusahaan_low }}</td>
                            <td>{{ $rsLow->alamat_low }}</td>
                            {{-- <td>{{ $rsLow->desc_low }}</td> --}}
                            {{-- <td>{{ $rsLow->kriteria_low }}</td> --}}
                            {{-- <td>
                                @if ($rsLow->sistem_kerja=="FT")
                                <span class="badge badge-success">Full Time</span>
                                @else
                                <span class="badge badge-danger">Part Time</span>
                                @endif
                            </td> --}}
                            <td>{{ $rsLow->deadline }}</td>
                            <td>
                                <a href="{{ url("lowongan/form/".$rsLow->id) }}"><i class="text-warning fas fa-edit"></i></a>
                                <a href="{{ url("lowongan/delete/".$rsLow->id) }}" class="ml-1"><i class="text-danger fas fa-trash ml-2"></i></a>
                                <a href="{{ url("lowongan/detail",$rsLow->id) }}" class="ml-2"><i class="text-info fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div> 
@endsection