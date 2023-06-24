@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')

    <div class="card-tools text-right mb-2 mr-2">
        <a href="{{ url("category") }}" class="mr-1 btn btn-dark btn-sm">Refresh</a>
        <a href="{{ url("category/form") }}" class="btn btn-dark btn-sm">Tambah Kategori</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="dtCat" class="dtTable table table-bordered table-hover">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtCat as $rsCat)
                        <tr>
                            <td>{{ $rsCat->id }}</td>
                            <td>{{ $rsCat->cat_nm }}</td>
                            <td>
                                <a href="{{ url("category/form/".$rsCat->id) }}"><i class="text-warning fas fa-edit"></i></a>
                                <a href="{{ url("category/delete/".$rsCat->id) }}"><i class="text-danger fas fa-trash ml-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div> 
@endsection