@extends('layouts.master')

@section('titlepage', $titlepage)

@section('css')
    <link rel="stylesheet" href="/assets/css/style.css">

    <style>
        /* CUSTOMIZING TITLE PAGE */

        .title-page h1.fw-bold {
            margin-top: -18px;
            margin-bottom: 0px;
        }

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

        @media only screen and (max-width: 768px) {

            /* NOTIF */
            .notification-wrapper .notif-item .notif-img {
                width: fit-content;
                height: fit-content;
            }

            .notification-wrapper .notif-item .notif-img i {
                font-size: 10px;
                padding: 5px;
            }
        }

    </style>
@endsection

@section('section')
    <div class="main-page">
        <!-- SIDEBAR -->
        @include('layouts.sidebar-admin')

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute waves"
            preserveAspectRatio="none">
            <path fill="#0099ff" fill-opacity="1"
                d="M0,288L60,282.7C120,277,240,267,360,234.7C480,203,600,149,720,149.3C840,149,960,203,1080,213.3C1200,224,1320,192,1380,176L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
            </path>
        </svg>

        <div class="content-outer-wrapper mx-auto">
            <div class="py-3 content-wrapper">
                <!-- TITLE -->
                <div class="title-back mb-1 mb-md-4">
                    <a href="/ad/dashboard" class="d-flex align-items-center text-decoration-none text-white"><i
                            class='bx bx-left-arrow-alt'></i>Back</a>
                </div>
                <div class="title-page text-white mb-5">
                    <h1 class="fw-light d-inline align-middle me-2">Notification</h1><span class="badge bg-danger">20+</span>
                    <h1 class="fw-bold">Dashboard</h1>
                </div>

                <div class="notification-wrapper p-3 rounded-20 shadow bg-white me-2">
                    <div class="my-4">
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
                        <div class="notif-item d-flex justify-content-between my-2">
                            <div class="d-flex">
                                <div class="notif-img rounded-circle d-flex justify-content-center align-items-center"><i
                                        class='bx bxs-briefcase-alt-2 text-white' style="font-size: 20px;"></i>
                                </div>
                                <div class="notif-content mx-2">
                                    <p class="title fw-bold">Lowongan Kerja</p>
                                    <p class="content fw-bold">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance.
                                        Akan
                                        diberitahukan informasi terbaru.</p>
                                </div>
                            </div>
                            <div class="notif-date align-self-center mx-2 fw-bold">27 Feb 2019</div>
                        </div>
                        <div class="notif-item d-flex justify-content-between my-2">
                            <div class="d-flex">
                                <div class="notif-img rounded-circle d-flex justify-content-center align-items-center"><i
                                        class='bx bxs-briefcase-alt-2 text-white' style="font-size: 20px;"></i>
                                </div>
                                <div class="notif-content mx-2">
                                    <p class="title">Lowongan Kerja</p>
                                    <p class="content">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance.
                                        Akan
                                        diberitahukan informasi terbaru.</p>
                                </div>
                            </div>
                            <div class="notif-date align-self-center mx-2">27 Feb 2019</div>
                        </div>
                        <div class="notif-item d-flex justify-content-between my-2">
                            <div class="d-flex">
                                <div class="notif-img rounded-circle d-flex justify-content-center align-items-center"><i
                                        class='bx bxs-briefcase-alt-2 text-white' style="font-size: 20px;"></i>
                                </div>
                                <div class="notif-content mx-2">
                                    <p class="title">Lowongan Kerja</p>
                                    <p class="content">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance.
                                        Akan
                                        diberitahukan informasi terbaru.</p>
                                </div>
                            </div>
                            <div class="notif-date align-self-center mx-2">27 Feb 2019</div>
                        </div>
                        <div class="notif-item d-flex justify-content-between my-2">
                            <div class="d-flex">
                                <div class="notif-img rounded-circle d-flex justify-content-center align-items-center"><i
                                        class='bx bxs-briefcase-alt-2 text-white' style="font-size: 20px;"></i>
                                </div>
                                <div class="notif-content mx-2">
                                    <p class="title">Lowongan Kerja</p>
                                    <p class="content">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance.
                                        Akan
                                        diberitahukan informasi terbaru.</p>
                                </div>
                            </div>
                            <div class="notif-date align-self-center mx-2">27 Feb 2019</div>
                        </div>
                        <div class="notif-item d-flex justify-content-between my-2">
                            <div class="d-flex">
                                <div class="notif-img rounded-circle d-flex justify-content-center align-items-center"><i
                                        class='bx bxs-briefcase-alt-2 text-white' style="font-size: 20px;"></i>
                                </div>
                                <div class="notif-content mx-2">
                                    <p class="title">Lowongan Kerja</p>
                                    <p class="content">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance.
                                        Akan
                                        diberitahukan informasi terbaru.</p>
                                </div>
                            </div>
                            <div class="notif-date align-self-center mx-2">27 Feb 2019</div>
                        </div>
                        <div class="notif-item d-flex justify-content-between my-2">
                            <div class="d-flex">
                                <div class="notif-img rounded-circle d-flex justify-content-center align-items-center"><i
                                        class='bx bxs-briefcase-alt-2 text-white' style="font-size: 20px;"></i>
                                </div>
                                <div class="notif-content mx-2">
                                    <p class="title">Lowongan Kerja</p>
                                    <p class="content">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance.
                                        Akan
                                        diberitahukan informasi terbaru.</p>
                                </div>
                            </div>
                            <div class="notif-date align-self-center mx-2">27 Feb 2019</div>
                        </div>
                        <div class="notif-item d-flex justify-content-between my-2">
                            <div class="d-flex">
                                <div class="notif-img rounded-circle d-flex justify-content-center align-items-center"><i
                                        class='bx bxs-briefcase-alt-2 text-white' style="font-size: 20px;"></i>
                                </div>
                                <div class="notif-content mx-2">
                                    <p class="title">Lowongan Kerja</p>
                                    <p class="content">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance.
                                        Akan
                                        diberitahukan informasi terbaru.</p>
                                </div>
                            </div>
                            <div class="notif-date align-self-center mx-2">27 Feb 2019</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
