@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')
<div class="row">
    <div class="container w-50">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("edit") }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama</label><br>
                        <input type="text" name="name" placeholder="Nama" class="form-control" value="{{ @$rsUser->name }}">
                        <input type="hidden" name="id_user" placeholder="Nama" value="{{ @$rsUser->id }}">
                        @error('name')
                            <div id="name" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" placeholder="email" class="form-control" value="{{ @$rsUser->email }}">
                    @error('email')
                        <div id="email" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <input type="hidden" name="old_password" placeholder="Password" value="{{ @$rsUser->password }}" class="form-control">
                    @error('password')
                        <div id="password" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role">role</label>
                    <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" class="form-control">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                    @error('role')
                    <div id="role" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="level">level</label>
                    <select class="form-control @error('level') is-invalid @enderror" name="level" id="level" class="form-control">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                    @error('level')
                    <div id="level" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group text-center">
                    <input type="submit" class="btn btn-dark" value="S A V E">
                </div>                     
            </div>
        </div>
    </div>
</div>    
@endsection