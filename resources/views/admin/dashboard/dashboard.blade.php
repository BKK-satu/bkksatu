@extends('layouts.master')

@section('titlepage', $titlepage)

@section('css')
    <link rel="stylesheet" href="/assets/css/style.css">

    <style>
        .waves {
            z-index: -1;
        }

        /* CUSTOMIZING TITLE PAGE */

        .title-page h1.fw-bold {
            margin-top: -18px;
            margin-bottom: 0px;
        }

        .welcome-admin {
            margin-bottom: 60px;
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

        /* CUSTOMIZE GALLERY */

        .overview-data .data.row {
            height: auto;
            width: 100%;
        }

        .overview-data .small-data div:nth-child(2) {
            font-size: 45px;
        }

        .row {
            --bs-gutter-x: 0px;
        }

    </style>
@endsection

@section('section')
    <div class="main-page">
        <!-- SIDEBAR -->
        @include('layouts.sidebar-admin')

        <img src="/assets/img/wave2.svg" class="position-absolute waves">

        <div class="py-3 content-wrapper">
            <!-- TITLE -->
            <div class="title-page text-white mb-5">
                <h1 class="fw-light">Main</h1>
                <h1 class="fw-bold">Dashboard</h1>
            </div>

            <div class="welcome-admin text-white">
                <!-- WELCOMING TEXT -->
                <h4>Hello, Welcome <span class="fw-bolder">Tyson Ngo</span></h4>
            </div>

            <div class="overview-data px-2 px-lg-5">
                <!-- IMAGE INFORMASI -->
                <div class="data mb-3">
                    <div class="row">
                        <div class="col small-data">
                            <div class="p-2">
                                <div class="rounded-20 p-3 shadow h-auto bg-white">
                                    <div class="">Alumni</div>
                                    <div class="text-center fw-900">12.093</div>
                                </div>
                            </div>
                        </div>
                        <div class="col small-data">
                            <div class="p-2">
                                <div class="rounded-20 p-3 shadow h-auto bg-white">
                                    <div class="">Alumni</div>
                                    <div class="text-center fw-900">12.093</div>
                                </div>
                            </div>
                        </div>
                        <div class="col small-data">
                            <div class="p-2">
                                <div class="rounded-20 p-3 shadow h-auto bg-white">
                                    <div class="">Alumni</div>
                                    <div class="text-center fw-900">12.093</div>
                                </div>
                            </div>
                        </div>
                        <div class="col small-data">
                            <div class="p-2">
                                <div class="rounded-20 p-3 shadow h-auto bg-white">
                                    <div class="">Alumni</div>
                                    <div class="text-center fw-900">12.093</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-auto big-data">
                        <div class="p-2">
                            <div class="rounded-20 p-2 shadow bg-white">
                                <canvas id="myChart" style="height: auto;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="notification-wrapper p-3 rounded-20 shadow">
                <!-- NOTIFIKASI DARI YANG DILAKUIN -->
                <div class="mb-2">
                    <h2 class="d-inline align-middle me-2 fw-bold">Notification</h2><span class="badge bg-danger">20+</span>
                </div>
                <div class="my-4">
                    <!-- NOTIFIKASI ITEMNYA -->
                    <div class="notif-item d-flex justify-content-between my-2">
                        <div class="d-flex">
                            <div class="notif-img rounded-circle"></div>
                            <div class="notif-content mx-2">
                                <p class="title fw-bold">Lowongan Kerja</p>
                                <p class="content fw-bold">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance. Akan
                                    diberitahukan informasi terbaru.</p>
                            </div>
                        </div>
                        <div class="notif-date align-self-center mx-2 fw-bold">27 Feb 2019</div>
                    </div>
                    <div class="notif-item d-flex justify-content-between my-2">
                        <div class="d-flex">
                            <div class="notif-img rounded-circle"></div>
                            <div class="notif-content mx-2">
                                <p class="title">Lowongan Kerja</p>
                                <p class="content">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance. Akan
                                    diberitahukan informasi terbaru.</p>
                            </div>
                        </div>
                        <div class="notif-date align-self-center mx-2">27 Feb 2019</div>
                    </div>
                    <div class="notif-item d-flex justify-content-between my-2">
                        <div class="d-flex">
                            <div class="notif-img rounded-circle"></div>
                            <div class="notif-content mx-2">
                                <p class="title">Lowongan Kerja</p>
                                <p class="content">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance. Akan
                                    diberitahukan informasi terbaru.</p>
                            </div>
                        </div>
                        <div class="notif-date align-self-center mx-2">27 Feb 2019</div>
                    </div>
                    <div class="notif-item d-flex justify-content-between my-2">
                        <div class="d-flex">
                            <div class="notif-img rounded-circle"></div>
                            <div class="notif-content mx-2">
                                <p class="title">Lowongan Kerja</p>
                                <p class="content">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance. Akan
                                    diberitahukan informasi terbaru.</p>
                            </div>
                        </div>
                        <div class="notif-date align-self-center mx-2">27 Feb 2019</div>
                    </div>
                    <div class="notif-item d-flex justify-content-between my-2">
                        <div class="d-flex">
                            <div class="notif-img rounded-circle"></div>
                            <div class="notif-content mx-2">
                                <p class="title">Lowongan Kerja</p>
                                <p class="content">Anda telah mendaftar ke lowongan kerja PT. Yutaka Finance. Akan
                                    diberitahukan informasi terbaru.</p>
                            </div>
                        </div>
                        <div class="notif-date align-self-center mx-2">27 Feb 2019</div>
                    </div>
                </div>
                <!-- PINDAH KE NOTIFKASI LEBIH LENGKAP -->
                <div class="text-center">
                    <a href="/ad/notif" class="btn btn-primary rounded-20">More</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- CHART JS 3.5.1 -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2016/2017', '2017/2018', '2018/2019', '2019/2020', '2020/2021', '2021/2022'],
                datasets: [{
                    label: 'Bekerja',
                    data: [32, 43, 3, 7, 10, 32],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }, {
                    label: 'Kuliah',
                    data: [12, 32, 5, 5, 2, 3],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }, {
                    label: 'Wirausaha',
                    data: [12, 32, 5, 5, 2, 3],
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
