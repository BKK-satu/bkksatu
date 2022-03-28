@extends('layouts.master')

@section('titlepage', 'Rekomend LOK00001 | Mitra')

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
        @include('layouts.sidebar-mitra')

        <img src="/assets/img/wave2.svg" class="position-absolute waves">

        <div class="container py-3 content-wrapper">
            <!-- TITLE -->
            <div class="title-back">
                <a href="/mt/lk/detail" class="d-flex align-items-center text-decoration-none text-white"><i
                        class='bx bx-left-arrow-alt'></i>Back</a>
            </div>
            <div class="title-page text-white my-5">
                <h1 class="fw-light">Rekomendasi</h1>
                <h1 class="fw-bold">LOK00023</h1>
            </div>

            <div class="alumni-table">
                <!-- SEARCH BAR -->
                <div class="search py-3">
                    <form action="" class="position-relative">
                        <i class='bx bx-search position-absolute'></i>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control rounded-20 shadow"
                                placeholder="Search Rekomendasi Alumni...">
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
                        <div>
                            <button class="btn btn-primary rounded-15 px-4">
                                <p class="d-inline align-middle fw-bold">Add</p>
                            </button>
                            <button class="btn btn-primary rounded-15 px-4">
                                <p class="d-inline align-middle fw-bold">Print</p>
                            </button>
                        </div>
                    </div>
                    <!-- ISI DATATABLE -->
                    <div class="content mb-2">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Alumni</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Angakatan</th>
                                    <th scope="col">Jenis Kelamim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><a href="/alumni/detail" class="text-link-black text-decoration-none">Akwan
                                            Cakra</a>
                                    </td>
                                    <td>RPL</td>
                                    <td>2018/2019</td>
                                    <td>Laki-laki</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Fahru Rhman</td>
                                    <td>TKJ</td>
                                    <td>2018/2019</td>
                                    <td>Laki-laki</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Ahmad Zaky</td>
                                    <td>MM</td>
                                    <td>2018/2019</td>
                                    <td>Laki-laki</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Fahru Rhman</td>
                                    <td>TKJ</td>
                                    <td>2018/2019</td>
                                    <td>Laki-laki</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Ahmad Zaky</td>
                                    <td>MM</td>
                                    <td>2018/2019</td>
                                    <td>Laki-laki</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Fahru Rhman</td>
                                    <td>TKJ</td>
                                    <td>2018/2019</td>
                                    <td>Laki-laki</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Ahmad Zaky</td>
                                    <td>RPL</td>
                                    <td>2018/2019</td>
                                    <td>Laki-laki</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Fahru Rhman</td>
                                    <td>RPL</td>
                                    <td>2018/2019</td>
                                    <td>Laki-laki</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Ahmad Zaky</td>
                                    <td>RPL</td>
                                    <td>2018/2019</td>
                                    <td>Laki-laki</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Ahmad Zaky</td>
                                    <td>RPL</td>
                                    <td>2018/2019</td>
                                    <td>Laki-laki</td>
                                </tr>
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
@endsection

@section('script')
    <!-- SWEETALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function swalDelete() {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
        }
    </script>
@endsection
