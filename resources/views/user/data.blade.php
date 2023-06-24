@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')

    <div class="card-tools text-right mb-2 mr-2">
        <a href="{{ url("user") }}" class="mr-1 btn btn-dark btn-sm">Refresh</a>
        <a href="{{ url("user/form") }}" class="btn btn-dark btn-sm">Tambah User</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="dtuser" class="dtTable table table-bordered table-hover">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Level</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtUser as $rsUser)
                        <tr>
                            <td>{{ $rsUser->id }}</td>
                            <td>{{ $rsUser->name }}</td>
                            <td>{{ $rsUser->email }}</td>
                            <td>{{ $rsUser->password }}</td>
                            <td>{{ $rsUser->level }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div> 
@endsection