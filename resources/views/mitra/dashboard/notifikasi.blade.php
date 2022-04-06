@extends('layouts.master')

@section('titlepage', 'Notifikasi | Mitra')

@section('css')
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/styleMitra.css">

    <style>
        /* COSTUMIZING NOTIFICATION */

        .notification-wrapper .notif-item .notif-img {
            width: 50px;
            height: 50px;
            background: #3ad6e7;
        }

        .notification-wrapper .notif-item .notif-content p {
            margin: 0;
        }

        .notification-wrapper .notif-header div div:nth-child(1) {
            width: 50px;
        }

        .notification-wrapper .notif-header div {
            font-size: 18px;
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
            <div class="title-back mb-1 mb-md-4">
                <a href="/mt/main" class="d-flex align-items-center text-decoration-none text-white"><i
                        class='bx bx-left-arrow-alt'></i>Back</a>
            </div>
            <div class="title-page text-white mb-5">
                <h1 class="fw-light d-inline align-middle me-2">Notification</h1><span class="badge bg-danger">20 New</span>
                <h1 class="fw-bold">Dashboard</h1>
            </div>

            <div class="notification-wrapper p-3 rounded-20 shadow bg-white">
                <div class="">
                    <!-- NOTIFIKASI ITEM -->
                    <div class="notif-header d-flex justify-content-between my-2">
                        <div class="d-flex">
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="fw-bold">#</p>
                            </div>
                            <div class="notif-content mx-2">
                                <p class="title fw-bold">Deskripsi</p>
                            </div>
                        </div>
                        <div class="notif-date align-self-center mx-2 fw-bold">Tanggal</div>
                    </div>
                    @foreach ($rekomend as $val)
                        <div class="notif-item d-flex justify-content-between my-2">
                            <div class="d-flex">
                                <div class="notif-img rounded-circle d-flex justify-content-center align-items-center"><i
                                        class='bx bxs-briefcase-alt-2 text-white' style="font-size: 20px;"></i>
                                </div>
                                <div class="notif-content mx-2">
                                    <p class="title fw-bold">{{ $val->judul }}</p>
                                    <p class="content fw-bold">{{ $val->text }}</p>
                                </div>
                            </div>
                            <div class="notif-date align-self-center mx-2 fw-bold">
                                {{ \Carbon\Carbon::parse($val->created_at)->format('d M Y') }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
