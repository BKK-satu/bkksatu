@extends('layouts.master')

@section('titlepage', 'Detail Loker | Mitra')

@section('css')
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
            margin-bottom: 70px;
            background-image: linear-gradient(to right, #2e51d1, #9cb0f0);
        }

        .center {
            display: block;
            /* margin-left: auto; */
            /* margin-right: auto; */
            width: 100%;
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
                    <img src="/assets/img/{{ $loker->banner }}" class="center" width="100%">
                    {{-- <div class="img overflow-hidden position-absolute rounded-circle">
                    </div> --}}
                </div>
                <div class="content py-3 px-5">
                    <div class="mb-4 d-flex justify-content-between">
                        <!-- TITLE NEWS -->
                        <div>
                            <h1 class="fw-900 mb-0">{{ $loker->posisi }}</h1>
                            <h3>{{ $loker->id }}</h3>
                            <h4 class="mt-3">PT. Optic Gaming<i
                                    class='bx bxs-badge-check align-middle text-primary ms-1'></i></h4>
                            <h5 class="mt-3"><i class='bx bx-current-location align-middle me-1'></i>Jakarta</h5>
                        </div>
                        <!-- TOOLS UNTUK EDIT DAN DELETE -->
                        <div class="tools d-flex">
                            <div class="rounded-15 d-flex justify-content-center align-items-center me-1">
                                <a href="/mt/lk/ubah/{{ $loker->id }}" class="text-white"><i
                                        class='bx bxs-edit'></i></a>
                            </div>
                            <div class="rounded-15 d-flex justify-content-center align-items-center">
                                <span class="text-white" onclick="swalDelete('{{ $loker->id }}')"><i
                                        class='bx bxs-trash-alt'></i></span>
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
                            <a href="/mt/lk/pelamar" class="btn btn-primary rounded-15 w-100 fw-bold p-2">Lihat Pelamar</a>
                        </div>
                        <div class="col p-1">
                            <a href="/mt/lk/tahap" class="btn btn-primary rounded-15 w-100 fw-bold p-2">Lihat
                                Tahap</a>
                        </div>
                        <div class="col p-1">
                            <a href="/mt/lk/rekomend" class="btn btn-primary rounded-15 w-100 fw-bold p-2">Lihat
                                Rekomendasi</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="job-desc">
                <h2 class="fw-900 mb-3">Deskripsi Pekerjaan</h2>
                <div class="shadow-custom-2 px-5 py-4 rounded-20 mb-5 requirement">
                    <h4 class="fw-bold">Persyaratan :</h4>
                    <ul class="mb-0">
                        @foreach ($requirement as $req)
                            <li>{{ $req->text }}</li>
                        @endforeach
                    </ul>
                </div>
                {{-- <div class="shadow-custom-2 px-5 py-4 rounded-20 mb-5 responsibility">
                    <h4 class="fw-bold">Tanggung Jawab :</h4>
                    <ul class="mb-0">
                        <li>Can make a coffe.</li>
                        <li>Can piket in midnight.</li>
                        <li>Dapat membersihkan tempat kerja sendiri.</li>
                        <li>Bisa membuat anak.</li>
                    </ul>
                </div> --}}
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
                <h2 class="fw-900 mb-3">Informasi Tambahan</h2>
                <div class="shadow-custom-2 px-5 py-4 rounded-20 mb-5 phase">
                    <div class="row p-2">
                        <div class="col-6 mb-3">
                            <h5 class="fw-bold mb-0">Level</h5>
                            <h5 class="fw-normal">Menengah</h5>
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="fw-bold mb-0">Jenis Pekerjaan</h5>
                            <h5 class="fw-normal">{{ $loker->jenis_pekerjaan }}</h5>
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="fw-bold mb-0">Pengalaman</h5>
                            <h5 class="fw-normal">1 tahun</h5>
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="fw-bold mb-0">Spesialisasi</h5>
                            <h5 class="fw-normal">{{ $loker->kategori }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- SWEETALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function swalDelete(id) {
            var id = id;
            swal({
                    title: "Apakah anda yakin?",
                    text: "Ketika data sudah terhapus maka data tidak bisa kembali!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.replace('http://127.0.0.1:8000/mt/lk/hapus/' + id);
                    }
                });
        }
    </script>
@endsection
