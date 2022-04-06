@extends('layouts.master')

@section('titlepage', 'Tahap ' . $loker->id . ' | Mitra')

@section('css')
    <!-- SELECT 2 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {{-- INTERN CSS --}}
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

        /* STYLING TABLE */


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

        /* STYLING SELECT */

        .select2.select2-container {
            width: 100% !important;
        }

        .select2.select2-container .select2-selection {
            border: 1px solid #ccc;
            border-radius: 10px;
            height: 40px;
            outline: none !important;
            transition: all .15s ease-in-out;
        }

        .select2.select2-container .select2-selection .select2-selection__rendered {
            color: #333;
            line-height: 38px;
            padding-right: 33px;
            padding-left: 12px;
            font-size: 1rem;
        }

        .select2.select2-container .select2-selection .select2-selection__arrow {
            background: #f8f8f8;
            border-left: 1px solid #ccc;
            -webkit-border-radius: 0 10px 10px 0;
            -moz-border-radius: 0 10px 10px 0;
            border-radius: 0 10px 10px 0;
            height: 38px;
            width: 40px;
        }

    </style>
@endsection

@section('section')
    @include('layouts.navbar')

    <div class="main-page">
        @include('layouts.sidebar-mitra')

        <img src="/assets/img/wave2.svg" class="position-absolute waves">

        <div class="container py-3 content-wrapper">
            <!-- TITLE -->
            <div class="title-back">
                <a href="/mt/lk/detail/{{ $loker->id }}"
                    class="d-flex align-items-center text-decoration-none text-white"><i
                        class='bx bx-left-arrow-alt'></i>Back</a>
            </div>
            <div class="title-page text-white my-5">
                <h1 class="fw-light">Tahap</h1>
                <h1 class="fw-bold">{{ $loker->id }}</h1>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissable rounded-15">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger rounded-15">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="alumni-table bg-white p-3 rounded-15">
                <div class="header d-flex justify-content-between mb-3">
                    <div class="">
                        <h3 class="fw-bold mb-0">Tahap</h3>
                        <p>Berikut ini adalah data tahapan-tahapan.</p>
                    </div>
                    <div>
                        <button class="btn btn-primary rounded-15 px-4" data-bs-toggle="modal" data-bs-target="#addTahap">
                            <p class="d-inline align-middle fw-bold">Add</p>
                        </button>
                    </div>
                </div>
                <div class="data-table rounded-20 py-2">
                    <!-- ISI DATATABLE -->
                    <div class="content mb-2">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID Loker</th>
                                    <th scope="col">Tahap Ke</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Dimulai</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tahap as $key => $data)
                                    <tr class="align-middle">
                                        <th scope="row">{{ $key += 1 }}</th>
                                        <td><a href="/mt/lk/tahap/detail/{{ $data->id }}"
                                                class="text-link-black text-decoration-none">{{ $loker->id }}</a>
                                        </td>
                                        <td>{{ $data->tahap_ke }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->tanggal_seleksi)->format('d M Y') }}</td>
                                        <td>{{ $data->tahap_ke }}</td>
                                        <td><a href="/mt/lk/tahap/detail/{{ $data->id }}"
                                                class="btn btn-primary rounded-15 fw-bold">Seleksi</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Tahap -->
    <div class="modal fade" id="addTahap" aria-labelledby="addTahapLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-15">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTahapLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/mt/lk/tahap/post" method="POST">
                        @csrf
                        <input type="hidden" name="loker_id" value="{{ $loker->id }}">
                        {{-- <div class="mb-3">
                            <label for="alumni" class="form-label">Pilih Alumni</label>
                            <select class="js-select2 form-control" id="select2" name="alumni">
                                <option selected hidden disabled>Pilih Alumni</option>
                                @foreach ($alumni as $alm)
                                    <option @if (old('alumni') == $alm->id) selected @endif value="{{ $alm->id }}">
                                        {{ $alm->nama }} -
                                        {{ $alm->jurusan->nama }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label for="tahap_ke" class="form-label">Tahap Ke</label>
                            <input type="number" class="form-control rounded-15" id="tahap_ke" placeholder="Tahap Ke..."
                                name="tahap_ke" value="{{ old('tahap_ke') }}" min="1" max="15">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control rounded-15" id="nama" placeholder="Nama Tahap..."
                                name="nama" value="{{ old('nama') }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_seleksi" class="form-label">Tanggal Seleksi</label>
                            <input type="date" class="form-control rounded-15" id="tanggal_seleksi"
                                placeholder="Tanggal Seleksi..." name="tanggal_seleksi"
                                value="{{ old('tanggal_seleksi') }}">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control rounded-15" id="keterangan" rows="3"
                                name="keterangan">{{ old('keterangan') }}</textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="defaultMsg" name="defaultMsg">
                            <label class="form-check-label" for="defaultMsg">Gunakan keterangan otomatis.</label>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary rounded-15 fw-bold"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary rounded-15 fw-bold">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#select2").select2({
                dropdownParent: $("#addTahap")
            });
        });

        $('#defaultMsg').click(function() {
            if ($(this).is(':checked') == true) {
                $('#keterangan').attr("readonly", true);
            } else {
                $('#keterangan').removeAttr('readonly');
            }
        });
    </script>
@endsection
