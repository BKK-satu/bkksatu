@extends('layouts.master')

@section('titlepage', 'Rekomendasi Alumni | Mitra')

@section('css')
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/styleMitra.css">

    <style>
        .title-page h1.fw-bold {
            margin-bottom: 60px;
        }

        .dropdown-menu {
            min-width: 0px;
        }

        .page-item:first-child .page-link {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .page-item:last-child .page-link {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        /* STYLING SEARCH */

        .search input {
            height: 60px;
            padding-left: 55px;
            font-size: 18px;
            border: 2px solid rgba(0, 0, 0, 0.2);
        }

        .search i.bx {
            z-index: 10;
            font-size: 30px;
            top: 15px;
            left: 2%;
            color: rgba(0, 0, 0, 0.5);
        }

        /* STYLING TABLE */

        .data-table {
            margin-left: 20px;
            margin-right: 30px;
        }

        .data-table .header button:nth-child(2) i.bxs-plus-circle {
            font-size: 18px;
        }

        .data-table .tools {
            background-color: #2041BB;
            color: #fff;
            font-size: 18px;
        }

        .data-table .content .table {
            overflow-x: scroll;
        }

        .data-table .content ul i.bx {
            font-size: 18px;
        }

        .data-table .content .table tbody tr td.icon {
            display: none;
        }

        .data-table .content .table tbody tr:hover td.icon {
            display: block;
        }

    </style>
@endsection

@section('section')
    @include('layouts.navbar')
    <div class="main-page">
        <!-- SIDEBAR -->
        @include('layouts.sidebar-mitra')

        <img src="/assets/img/wave2.svg" class="position-absolute waves">

        <div class="container py-3 content-wrapper">
            <!-- TITLE -->
            <div class="title-back">
                <a href="{{ url()->previous() }}" class="d-flex align-items-center text-decoration-none text-white"><i
                        class='bx bx-left-arrow-alt'></i>Back</a>
            </div>
            <div class="title-page text-white my-5">
                <h1 class="fw-light">Rekomendasi</h1>
                <h1 class="fw-bold">Alumni</h1>
            </div>

            <div class="alumni-table">
                <!-- SEARCH BAR -->
                <div class="search py-3">
                    <form action="" class="position-relative">
                        <i class='bx bx-search position-absolute'></i>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control rounded-20 shadow" placeholder="Search Pelamar...">
                        </div>
                    </form>
                </div>
                <div class="data-table rounded-20 py-2">
                    <!-- HEADING DATATABLE -->
                    <div class="header d-flex justify-content-between mb-3">
                        <button class="btn btn-primary rounded-15 dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">10</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">10</a></li>
                            <li><a class="dropdown-item" href="#">20</a></li>
                            <li><a class="dropdown-item" href="#">30</a></li>
                        </ul>
                        <button class="btn btn-primary rounded-15 px-4" data-bs-toggle="modal"
                            data-bs-target="#addRekomend">
                            <p class="d-inline align-middle fw-bold">Tambah</p>
                        </button>
                    </div>
                    <!-- ISI DATATABLE -->
                    <div class="content mb-2">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID Loker</th>
                                    <th scope="col">Alumni</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Tanggal Rekomend</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($rekomend)
                                    @foreach ($rekomend as $rek)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>LKR00001</td>
                                            <td><a href="/mt/lk/detail" class="text-link-black text-decoration-none">Akwan
                                                    Cakra</a>
                                            </td>
                                            <td>Rekayasa Perangkat Lunak</td>
                                            <td>28-03-2019</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- PAGINASI -->
                        <nav class="d-flex justify-content-end">
                            <ul class="pagination rounded-20">
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class='bx bx-chevron-left align-middle'></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class='bx bx-chevron-right align-middle'></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="addRekomend" tabindex="-1" aria-labelledby="addRekomendLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRekomendLabel">Tambah Rekomendasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <select class="form-select rounded-15 @error('kota') is-invalid @enderror"
                                onchange="updateKota(this.value)" name="kota">
                                <option selected disabled hidden>Pilih Kota</option>
                                @foreach ($kota as $item)
                                    <option @if (old('kota') == $item) {{ 'selected' }} @endif
                                        value="{{ $item }}">
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                            <small class="text-secondary">Pilih kota kantor anda berada.</small>
                            @error('kota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary rounded-15 fw-bold me-1"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary rounded-15 fw-bold">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
