@extends('layouts.master')

{{-- @section('titlepage', 'Pelamar {{ $id_loker }} | Mitra') --}}
@section('titlepage', 'Pelamar LOK00001 | Mitra')

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

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute waves"
            preserveAspectRatio="none">
            <path fill="#0099ff" fill-opacity="1"
                d="M0,288L60,282.7C120,277,240,267,360,234.7C480,203,600,149,720,149.3C840,149,960,203,1080,213.3C1200,224,1320,192,1380,176L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
            </path>
        </svg>

        <div class="container-lg py-3 content-wrapper">
            <!-- TITLE -->
            <div class="title-back">
                <a href="{{ url()->previous() }}" class="d-flex align-items-center text-decoration-none text-white"><i
                        class='bx bx-left-arrow-alt'></i>Back</a>
            </div>
            <div class="title-page text-white my-5">
                <h1 class="fw-light">Pelamar</h1>
                <h1 class="fw-bold">LOK00023</h1>
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
                        <button class="btn btn-primary rounded-15 px-4">
                            <p class="d-inline align-middle fw-bold">Print</p>
                        </button>
                    </div>
                    <!-- ISI DATATABLE -->
                    <div class="content mb-2 overflow-auto">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID Pelamar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Angkatan</th>
                                    {{-- <th scope="col">Status</th> --}}
                                    <th scope="col">Tanggal Submit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pelamar as $key => $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->id }}</td>
                                        <td><a href="#"
                                                class="text-link-black text-decoration-none">{{ $data->alumni_daftar->alumni->nama }}</a>
                                        </td>
                                        <td>{{ $data->alumni_daftar->alumni->jurusan->nama }}</td>
                                        <td scope="col rounded-15">
                                            {{ $data->alumni_daftar->alumni->angkatan->tahun_masuk }}/{{ $data->alumni_daftar->alumni->angkatan->tahun_lulus }}
                                        </td>
                                        {{-- <td>Lolos</td> --}}
                                        <td>{{ \Carbon\Carbon::parse($data->tanggal_submit)->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
@endsection
