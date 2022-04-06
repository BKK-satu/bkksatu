@extends('layouts.master')

@section('titlepage', 'Detail Loker | Mitra')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/styleMitra.css">

    <style>
        .title-page h1.fw-bold {
            margin-bottom: 60px;
        }

        /* STYLING DETAIL WRAPPER */

        .rounded-custom {
            border-radius: 30px;
        }

        .detail-outer-wrapper .header {
            border-radius: 30px 30px 0px 0px;
            height: 250px;
            margin-bottom: 20px;
            background-image: linear-gradient(to right, #2e51d1, #9cb0f0);
        }

        .detail-outer-wrapper .content .prestasi div.img div {
            width: 100px;
            height: 100px;
            background-color: rgb(165, 163, 163);
        }

        .detail-outer-wrapper .content div.tools div {
            width: 30px;
            height: 30px;
            color: #fff;
        }

        .detail-outer-wrapper .content div.tools div:nth-child(1) {
            background: rgb(242, 180, 46);
        }

        .detail-outer-wrapper .content div.tools div:nth-child(2) {
            background: rgb(242, 42, 42);
        }

        .detail-outer-wrapper .content .deskripsi p {
            margin-bottom: 0px
        }

        .detail-outer-wrapper .content .pelamar a.btn {
            font-size: 20px;
        }

        .detail-outer-wrapper .header .img {
            background: rgb(192, 192, 192);
            height: 200px;
            width: 200px;
            border: 7px solid #fff;
            top: 50%;
            left: 3%;
        }

        /* CUSTOMIZE GALLERY */

        .gallery .img {
            height: 400px;
            width: 100%;
        }

        .gallery .img .big-img div,
        .gallery .img .small-img div {
            height: 100%;
        }

        .gallery .img .big-img div div {
            height: 100%;
            width: 100%;
            background-color: rgb(202, 202, 202);
        }

        .gallery .img .small-img div {
            border: 2px solid #2e51d1;

        }

        .gallery .img .small-img div img {
            background-color: rgb(202, 202, 202);
        }

        .row {
            --bs-gutter-x: 0px;
        }

    </style>
@endsection

@section('section')
    @include('layouts.navbar')
    <div class="main-page">
        <!-- SIDEBAR -->
        @include('layouts.sidebar-mitra')

        <!-- IMAGE WAVES -->
        <img src="/assets/img/wave2.svg" class="position-absolute waves">

        <div class="container py-3 content-wrapper">
            <!-- TITLE -->
            <div class="title-back">
                <a href="/mt/lk/main" class="d-flex align-items-center text-decoration-none text-white"><i
                        class='bx bx-left-arrow-alt'></i>Back</a>
            </div>
            <div class="title-page text-white my-5">
                <h1 class="fw-light">Detail</h1>
                <h1 class="fw-bold">Lowongan Kerja</h1>
            </div>

            <!-- CONTENT -->
            <div class="detail-outer-wrapper shadow-custom-2 mb-5 rounded-custom">
                <!-- HEADER -->
                <div class="header d-flex align-items-center position-relative overflow-hidden">
                    <img src="/assets/img/{{ $loker->banner }}" class="center" width="100%" draggable="false">
                </div>
                <div class="content py-3 px-5">
                    <div class="mb-4 d-flex justify-content-between">
                        <!-- TITLE NEWS -->
                        <div>
                            <h1 class="fw-900 mb-0">{{ $loker->posisi }}</h1>
                            <h3>{{ $loker->id }}</h3>
                            {{-- <div class="d-flex justify-content-between align-items-center"> --}}
                            <h4 class="mt-3 mb-0">{{ $loker->mitra->jenis }}. {{ $loker->mitra->nama }}<i
                                    class='bx bxs-badge-check align-middle text-primary ms-1'></i></h4>
                            <a href="{{ $loker->mitra->website }}" class="btn btn-secondary rounded-15 fw-bold"><i
                                    class='bx bx-world align-middle' style="font-size: 20px;"></i></a>
                            {{-- </div> --}}
                            <h5 class="mt-3"><i
                                    class='bx bx-current-location align-middle me-1'></i>{{ $loker->mitra->wilayah }}
                            </h5>
                        </div>
                        <!-- TOOLS UNTUK EDIT DAN DELETE -->
                        <div class="tools d-flex">
                            <div class="rounded-15 d-flex justify-content-center align-items-center me-1">
                                <a href="/mt/lk/ubah/{{ $loker->id }}" class="text-white"><i
                                        class='bx bxs-edit'></i></a>
                            </div>
                            <div class="rounded-15 d-flex justify-content-center align-items-center">
                                <button class="btn btn-danger rounded-15 p-0" onclick="deleteData('{{ $loker->id }}')"
                                    type="submit"><i class='bx bxs-trash-alt'></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- CONTENT INFORMASI -->
                    <div class="mb-3 deskripsi">
                        <p align="justify">{!! $loker->deskripsi !!} @if ($loker->deskripsi == '<p>&nbsp;</p>')
                                Tidak ada deskripsi.
                            @endif
                        </p>
                    </div>
                    <!-- TOMBOL LIHAT PELAMAR DAN REKOMEND -->
                    <div class="pelamar row">
                        <div class="col p-1">
                            <a href="/mt/lk/pelamar/{{ $loker->id }}"
                                class="btn btn-primary rounded-15 w-100 fw-bold p-2">Lihat
                                Pelamar</a>
                        </div>
                        <div class="col p-1">
                            <a href="/mt/lk/tahap/{{ $loker->id }}"
                                class="btn btn-primary rounded-15 w-100 fw-bold p-2">Lihat
                                Tahap</a>
                        </div>
                        <div class="col p-1">
                            <a href="/mt/lk/rekomend/{{ $loker->id }}"
                                class="btn btn-primary rounded-15 w-100 fw-bold p-2">Lihat
                                Rekomendasi</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="job-desc">
                <h2 class="fw-bold mb-3">Deskripsi Pekerjaan</h2>
                <div class="shadow-custom-2 px-5 py-4 rounded-20 mb-5 requirement">
                    <h4 class="fw-bold">Persyaratan :</h4>
                    <ul class="mb-0">
                        @foreach ($requirement as $req)
                            <li>{{ $req->text }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="shadow-custom-2 px-5 py-4 rounded-20 mb-5 phase">
                    <h4 class="fw-bold mb-3">Tahap</h4>
                    <div class="row">
                        @foreach ($tahap as $thp)
                            <div class="col-6">
                                <p class="fw-bold mb-0">{{ $thp->nama }}</p>
                                <p>Dilaksanankan pada {{ $thp->tanggal_seleksi }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="more-info">
                <h2 class="fw-bold mb-3">Informasi Tambahan</h2>
                <div class="shadow-custom-2 px-5 py-4 rounded-20 mb-5 phase">
                    <div class="row p-2">
                        <div class="col-6 mb-3">
                            <h5 class="fw-bold mb-0">Jenis Pekerjaan</h5>
                            <h5 class="fw-normal">{{ $loker->jenis_pekerjaan }}</h5>
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="fw-bold mb-0">Spesialisasi</h5>
                            <h5 class="fw-normal">{{ $loker->kategori }}</h5>
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="fw-bold mb-0">Kedaluwarsa</h5>
                            <h5 class="fw-normal">{{ \Carbon\Carbon::parse($loker->kedaluwarsa)->format('d M Y') }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery">
                <h2 class="fw-bold">Gallery</h2>
                <!-- IMAGE INFORMASI -->
                <div class="row">
                    @if ($galeri->isEmpty())
                        <div class="alert alert-info rounded-15">
                            <p class="mb-0"><i class='bx bx-info-circle align-middle'
                                    style="font-size: 28px;"></i> Tidak ada data untuk
                                galeri.</p>
                        </div>
                    @else
                        @foreach ($galeri as $gal)
                            <div class="col col-md-6 small-img p-2 w-auto">
                                <img src="/assets/img/{{ $gal->foto }}" class="rounded-15 me-1" height="200">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- SWEETALERT -->
    <script src="../../../assets/js/sweetalert.min.js"></script>
    <script src="../../../assets/js/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteData(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ url('/mt/lk/hapus') }}" + '/' + id,
                            type: "POST",
                            data: {
                                '_method': 'POST'
                            },
                            success: function() {
                                swal({
                                    title: "Success!",
                                    text: "Redirecting in 2 seconds.",
                                    icon: "success",
                                    timer: 2000,
                                    button: true
                                }).then(function() {
                                    window.location.replace("http://127.0.0.1:8000/mt/lk/main");
                                });
                            },
                            error: function() {
                                swal({
                                    title: 'Opps...',
                                    text: 'Ada masalah saat menghapus data.',
                                    icon: 'error',
                                    timer: '1500'
                                })
                            }
                        })
                    } else {
                        swal("Data tidak dihapus!");
                    }
                });
        }
    </script>
@endsection
