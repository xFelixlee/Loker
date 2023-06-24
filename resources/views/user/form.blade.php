@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')
<div class="row">
    <div class="container w-50">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("signup") }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label><br>
                        <input type="text" name="name" placeholder="Nama" class="form-control">
                        @error('name')
                            <div id="name" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" placeholder="email" class="form-control">
                    @error('email')
                        <div id="email" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    @error('password')
                        <div id="password" class="invalid-feedback">
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