@extends('layouts.master')

@section('titlepage', 'Main Loker | Mitra')

@section('css')
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/styleMitra.css">

    <style>
        /* STYLING SEARCH */

        .search input {
            height: 60px;
            padding-left: 60px;
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

        /* CUSTOMIZING LOKER ITEM */

        .loker-item .bottom p {
            font-size: 14px;
        }

        .loker-wrapper.row {
            --bs-gutter-y: 1.5rem;
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
            <div class="d-flex justify-content-between align-items-center">
                <div class="title-page text-white mb-5">
                    <h1 class="fw-light">Main</h1>
                    <h1 class="fw-bold">Lowongan Kerja</h1>
                </div>
                <a href="/mt/lk/tambah" class="btn btn-primary fw-bold rounded-15">Tambah</a>
            </div>

            <div class="search py-3">
                <!-- SEARCH BAR -->
                <form action="" class="position-relative">
                    <i class='bx bx-search position-absolute'></i>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-20 shadow" placeholder="Cari Mitra...">
                    </div>
                </form>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-15" role="alert">
                    <i class='bx bx-info-circle align-middle' style="font-size: 28px;"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-15" role="alert">
                    <i class='bx bx-info-circle align-middle' style="font-size: 28px;"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="loker-wrapper row">
                @foreach ($loker as $item)
                    <div class="col-6 col-md-4">
                        <div class="loker-item p-4 bg-white rounded-15 shadow">
                            <div class="img mb-3">
                                <img src="{{ $item->mitra->foto ? '/assets/img/' . $item->mitra->foto : '' }}"
                                    width="120px" class="rounded-15">
                            </div>
                            <div class="title">
                                <h4 class="fw-900 mb-0 text-primary">{{ $item->posisi }}</h4>
                                <h6 class="mb-3">{{ $item->mitra->jenis }}. {{ $item->mitra->nama }}</h6>
                                <h6 class="fw-900 mb-3">{{ $item->mitra->wilayah }}</h6>
                            </div>
                            <div class="req">
                                <ul>
                                    @foreach ($requirement as $req)
                                        @foreach ($req as $dataReq)
                                            @if ($item->id == $dataReq->lowongankerja_id)
                                                <li>{{ $dataReq->text }}</li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                            <div class="d-flex">
                                <a href="/mt/lk/detail/{{ $item->id }}"
                                    class="w-100 fw-bold btn btn-primary rounded-15 me-2">Detil</a>
                                <a href="/mt/lk/ubah/{{ $item->id }}"
                                    class="w-100 fw-bold btn btn-warning rounded-15">Ubah</a>
                            </div>
                            <hr>
                            <div class="bottom">
                                @foreach ($ages as $age)
                                    @if ($item->id == $age['id'])
                                        <p class="text-secondary mb-0">{{ $age['date'] }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
