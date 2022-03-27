@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="/assets/css/style.css">
    {{-- <link rel="stylesheet" href="/assets/css/styleMitra.css"> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
@endsection

@section('section')
    {{-- @include('layouts.navbar') --}}
    {{-- @include('layouts.sidebar-mitra') --}}
    @include('layouts.sidebar-admin')
    {{-- USING CONTAINER IF MITRA --}}
    <div class="py-3 content-wrapper">
        <div class="title-page mb-5">
            <h1 class="fw-light mb-0">Main</h1>
            <h1 class="fw-bold">Dashboard</h1>
        </div>

        <div class="">
            <form action="/add" method="get" style="width:400px;">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="mb-3">
                    <!-- EDITOR CK EDITOR 5 -->
                    <label for="editor" class="mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="editor">Deskripsi isi lowongan pekerjaan.</textarea>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                </div>
                <div>
                    <button class="btn btn-primary fw-bold rounded-15" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // MANGGIL CK EDITOR
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
{{-- @extends('layouts.master')

@section('css')
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/styleMitra.css">

@endsection --}}
