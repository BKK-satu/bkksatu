@extends('layouts.master')

@section('titlepage', 'Ubah Mitra | Admin')

@section('css')
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- TEXTAREA EDITOR -->
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

    <style>
        /* STYLING TITLE PAGE */

        .title-page h1.fw-bold {
            margin-bottom: 120px;
        }

        /* WRAPPER FORM */

        .edit-wrapper .data form {
            width: 50vw;
        }

        .edit-wrapper .data form .btn-action button {
            width: 100px;
        }

        .edit-wrapper .preview {
            width: 45vw;
        }

        .edit-wrapper .preview .content table {
            width: 100%;
        }

        .edit-wrapper .preview .header {
            border-radius: 15px 15px 0px 0px;
            width: 100%;
            background-image: linear-gradient(to right, #96aeff, #3759d6);
            height: 200px;
        }

        /* STYLING CUSTOM FILE INPUT */

        .edit-wrapper .preview .header {
            border-radius: 15px 15px 0px 0px;
            width: 100%;
            background-image: linear-gradient(to right, #96aeff, #3759d6);
            height: 100px;
        }

        .edit-wrapper .preview .header .img {
            border: 4px solid #fff;
            width: 120px;
            height: 120px;
            background: rgb(128, 128, 128);
            top: 30px;
            left: 20px;
        }

        /* STYLING CUSTOM FILE INPUT */

        .edit-wrapper .preview .header .img #uploadPhoto {
            opacity: 0;
            position: absolute;
            z-index: -1;
        }

        .edit-wrapper .preview .header .img label {
            cursor: pointer;
            color: #fff;
            font-size: 60px;
            /* Style as you please, it will become the visible UI component. */
        }

        .edit-wrapper .preview .header .upload-image {
            visibility: hidden;
        }

        .edit-wrapper .preview .header .img:hover .upload-image {
            visibility: visible;
        }

        /* STYLING TEXTAREA EDITOR */

        :root {
            --ck-border-radius: 5px;
        }

    </style>
@endsection

@section('section')
    <div class="main-page">
        <!-- SIDEBAR -->
        @include('layouts.sidebar-admin')

        <img src="/assets/img/wave2.svg" class="position-absolute waves">

        <div class="content-outer-wrapper mx-auto">
            <div class="container py-3 content-wrapper">
                <!-- TITLE HALAMAN -->
                <div class="title-back">
                    <a href="{{ url()->previous() }}" class="d-flex align-items-center text-decoration-none text-white"><i
                            class='bx bx-left-arrow-alt'></i>Back</a>
                </div>
                <div class="title-page text-white my-5">
                    <h1 class="fw-light">Ubah</h1>
                    <h1 class="fw-bold">Mitra</h1>
                </div>

                <!-- KONTEN LUAR -->
                <div class="edit-wrapper d-flex">
                    <div class="data me-4">
                        <!-- DATA INPUTAN -->
                        <h2 class="fw-700 mb-2">Data Mitra</h2>
                        <form action="" method="POST" class="">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control rounded-15" id="nama" placeholder="Nama..."
                                    onkeyup="updateNama(this.value)" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="jenis perusahaan" class="form-label">Jenis Perusahaan</label>
                                <select class="form-select rounded-15" onchange="updateJenis(this.value)"
                                    name="jenisperusahaan">
                                    <option selected disabled hidden>Pilih Jenis Perusahaan</option>
                                    <option value="Perseroan Terbatas">Perseroan Terbatas (PT)</option>
                                    <option value="Persekutuan Komanditer">Persekutuan Komanditer (CV)</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select class="form-select rounded-15" onchange="updateKat(this.value)" name="kategori">
                                    <option selected disabled hidden>Pilih Kategori</option>
                                    <option value="Informasi dan teknologi">Informasi dan teknologi</option>
                                    <option value="Otomotif">Otomotif</option>
                                    <option value="Software Engineering">Software Engineering</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control rounded-15" id="email" placeholder="Email..."
                                    onkeyup="updateEmail(this.value)" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="number" class="form-control rounded-15" id="telepon" placeholder="Telepon..."
                                    onkeyup="updateTlp(this.value)" name="telepon">
                            </div>
                            <div class="mb-3">
                                <label for="tahungabung" class="form-label">Tahun Bergabung</label>
                                <input type="date" class="form-control rounded-15" id="tahungabung"
                                    placeholder="Tahun Bergabung..." onkeyup="updatetahungabung(this.value)"
                                    name="tahungabung">
                            </div>
                            <div class="mb-3">
                                <label for="uploadPhoto" class="form-label">Foto Profile</label>
                                <input type="file" class="form-control rounded-15" id="uploadPhoto"
                                    placeholder="Foto Profile..." name="photo" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="3" class="form-control rounded-15"
                                    onkeyup="updateAlamat(this.value)"></textarea>
                            </div>
                            <div class="mb-3">
                                <!-- EDITOR CK EDITOR 5 -->
                                <label for="editor" class="mb-2">Deskripsi</label>
                                <textarea name="deskripsi" id="editor">&lt;p&gt;Isi deskripsi.&lt;/p&gt;</textarea>
                            </div>
                            <div class="blue-line rounded-20 mb-3"></div>
                            <h3 class="fw-700 mb-2">Data Akun</h3>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control rounded-15" id="username" placeholder="Username..."
                                    name="username" onkeyup="updateUsername(this.value)">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control rounded-15" id="password" placeholder="password"
                                    name="password">
                            </div>
                            <!-- <div class="blue-line rounded-20 mb-3"></div> -->
                            <div class="d-flex justify-content-end btn-action">
                                <button class="btn btn-secondary fw-700 rounded-15 me-2">Cancel</button>
                                <button class="btn btn-primary fw-700 rounded-15">Save</button>
                            </div>
                    </div>
                    <!-- HASIL PREVIEW -->
                    <div class="preview">
                        <h2 class="fw-700 mb-2">Preview</h2>
                        <div class="shadow bg-white rounded-20">
                            <div class="header position-relative mb-5">
                                <div
                                    class="img rounded-circle position-absolute d-flex justify-content-center align-items-center overflow-hidden">
                                    <img src="" id="imagePreview" width="120" draggable="false">
                                </div>
                            </div>
                            <div class="content p-3">
                                <div>
                                    <h4 class="fw-bold" id="nama_value">Name</h4>
                                </div>
                                <table>
                                    <tr>
                                        <td>
                                            <div>
                                                <p class="fw-bold">Kategori</p>
                                                <p id="kategori_value">-</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p class="fw-bold">Jenis Perusahaan</p>
                                                <p id="jenisperusahaan_value">-</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <p class="fw-bold">Tahun Bergabung</p>
                                                <p id="tahunbergabung_value">-</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p class="fw-bold">No. Telp</p>
                                                <p id="notelp_value">-</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <p class="fw-bold">Alamat</p>
                                                <p id="alamat_value">-</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <!-- <div class="blue-line rounded-20 mb-3"></div> -->
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <p class="fw-bold">Username</p>
                                                <p id="username_value">-</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p class="fw-bold">E-mail</p>
                                                <p id="email_value">-</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <p class="fw-bold">Level</p>
                                                <p>Mitra</p>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // MANGGIL CK EDITOR
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        // IMAGE PROFILE
        uploadPhoto.onchange = evt => {
            const [file] = uploadPhoto.files;
            let label = document.getElementById("labelPhoto");
            let input = document.getElementById("uploadPhoto");

            if (file) {
                imagePreview.src = URL.createObjectURL(file);
            }
        }

        function updateNama(data) {
            document.getElementById("nama_value").innerHTML = data;
        }

        function updateTlp(data) {
            document.getElementById("notelp_value").innerHTML = data;
        }

        function updateEmail(data) {
            document.getElementById("email_value").innerHTML = data;
        }

        function updateAlamat(data) {
            document.getElementById("alamat_value").innerHTML = data;
        }

        function updateUsername(data) {
            document.getElementById("username_value").innerHTML = data;
        }

        function updateKat(data) {
            document.getElementById("kategori_value").innerHTML = data;
        }

        function updateJenis(data) {
            document.getElementById("jenisperusahaan_value").innerHTML = data;
        }

        function updatetahungabung(data) {
            document.getElementById("tahunbergabung_value").innerHTML = data;
        }
    </script>
@endsection
