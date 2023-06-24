@extends('frontend.profile')
@section("title", $title)
@section('content')

{{-- Main Content --}}

<!-- Default box -->
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        <h3><b>Upload Resume</b></h3>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ url("resume/store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file">
                            <br><br>
                            <h5 class="mb-1">Uploaded File :</h5>
                            @if ($dtRes)
                                {{-- Tampilkan daftar resume yang sudah ada --}}
                                @foreach($dtRes as $resume)
                                    <p><i>{{ $resume->filename }}</i></p>
                                @endforeach
                                {{-- Tampilkan tombol "Edit" jika pengguna sudah memiliki file resume --}}
                                <form action="{{ url('resume/store') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-dark mt-2">U p l o a d</button>
                                </form>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Main Content --}}

@endsection 