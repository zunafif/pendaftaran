<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PPDB Online {{ env("NAMASEKOLAH","") }}</title>
    <meta content="Website Pendaftaran, Jadwal, dan Informasi Gelombang serta Biaya PPDB (Penerimaan Peserta Didik Baru) {{ env("NAMASEKOLAH","") }}" name="description">
    <meta content="PPDB, Penerimaan Peserta Didik Baru, {{ env("NAMASEKOLAH","") }}" name="keywords">
    <meta property="og:title" content="PPDB Online {{ env("NAMASEKOLAH","") }}" />
    <meta property="og:site_name" content="PPDB Online {{ env("NAMASEKOLAH","") }}" />
    <meta property="og:description" content="Website Pendaftaran, Jadwal, dan Informasi Gelombang serta Biaya PPDB (Penerimaan Peserta Didik Baru) {{ env("NAMASEKOLAH","") }}" />
    <link href="{{ url('asset/logo.png') }}" rel="apple-touch-icon">
{{--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">--}}
    <link href="{{asset('landingpage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/css/style.css')}}" rel="stylesheet">
    <link href='{{ url('asset/logo.png') }}' rel='icon' type='image/x-icon' />
</head>
<body>
<!-- Template Name: Bikin - v2.0.0 -->
<!-- Template URL: https://bootstrapmade.com/bikin-free-simple-landing-page-template/ -->
<!-- Author: BootstrapMade.com -->
<!-- License: https://bootstrapmade.com/license/ -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="{{ url('/') }}">
                PPDB Online
{{--    <img src="{{asset('landingpage/img/ppdb.png')}}" alt="Image" class="img-fluid">--}}
            </a></h1>
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="#hero">Home</a></li>
                <li><a href="#fasilitas">Fasilitas</a></li>
                <li><a href="#keuntungan">Kopetensi Keahlian</a></li>
                <li><a href="#syarat-pendaftaran">Syarat Pendaftaran</a></li>
                <li><a href="#langkah-pendaftaran">Langkah Pendaftaran</a></li>
                <li><a href="#kegiatan">Kegiatan</a></li>
                <li><a href="#kontak">Kontak</a></li>
                <li><a href=""></a></li>
            </ul>
        </nav>
        <div class="top-right links">
        </div>
    </div>
</header>
<section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
        <br><br><img src="{{ url('landingpage/img/jurusan/Logo.png') }}" alt="SI-PPDB" class="mx-auto d-block mb-3"
             style="opacity: .8; width:150px; max-width: 150%; height: 200px; max-height: 100%;">
        <h2 class="mb-4">Penerimaan Peserta Didik Baru 2020/2021</h2>
        <h1>{{ env("NAMASEKOLAH","") }}</h1>
        <h2 class="mb-4">Mari bergabung bersama kami dengan cara klik tombol dibawah ini</h2>
        @if (\Auth::guard('siswa')->user() != NULL)
            <a href="{{ route('siswa.predaftar') }}" class="btn-get-started scrollto">Buka Dashboard PPDB</a>
        @else
            <a href="{{ route('siswa.register') }}" class="btn-get-started">Daftar Sekarang</a> atau
            <a href="{{ route('siswa.login') }}" class="btn-get-started">Log In</a>
        @endif
        <img src="{{asset('landingpage/img/hero-img.svg')}}" class="img-fluid hero-img" alt="" data-aos="zoom-in" data-aos-delay="150">
    </div>
</section>
<main id="main">
    <section id="fasilitas" class="about">
        <div class="container">

            <div class="row no-gutters">
                <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
                    <div class="content">
                        <h3>Fasilitas</h3>
                        <p>
                            Berikut ini Merupakan Fasilitas Yang Dapat Anda Gunakan di {{ env("NAMASEKOLAH","") }}
                        </p>
                    </div>
                </div>
                <div class="col-xl-7 d-flex align-items-stretch" data-aos="fade-left">
                    <div class="icon-boxes d-flex flex-column justify-content-center" style="text-align:left;">
                        <ol>
                            <li>Gedung Sekolah Memiliki 2 Lantai</li>
                            <li>Program Beasiswa Prestasi</li>
                            <li>Program Beasiswa Non Akademik</li>
                            <li>Program Beasiswa Ekonomi</li>
                            <li>Ekstrakulikuler : Omah Batik, Dance, Seni Mural, Mandarin Club, Basket, Sepak Bola, Band, Paduan Suara, dll</li>
                            <li>Ruang Laboratorium Bahasa</li>
                            <li>Ruang Laboratorium IPA</li>
                            <li>Ruang Laboratorium Komputer</li>
                            <li>Ruang laboratorium Biologi</li>
                            <li>Ruang Laboratorium Fisika</li>
                            <li>Ruang Laboratorium Kimia</li>
                            <li>Ruang Perpustakaan</li>
                            <li>Ruang Serba Guna (AULA) Sekolah</li>
                            <li>Ruang Ibadah</li>
                            <li>Lapangan Basket dan Sepak Bola</li>
                        </ol>
                        {{--                        <div class="row">--}}
                        {{--                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">--}}
                        {{--                                <i class="bx bx-wifi"></i>--}}
                        {{--                                <h4>Free Wifi</h4>--}}
                        {{--                                <p>Tersedianya jaringan wifi untuk menunjang pembelajaran.</p>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">--}}
                        {{--                                <i class="bx bx-book"></i>--}}
                        {{--                                <h4>Perpustakaan</h4>--}}
                        {{--                                <p>Memiliki perpustakaan yang dapat digunakan untuk menambah wawasan dan mencari referensi - referensi buku.</p>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">--}}
                        {{--                                <i class="bx bx-laptop"></i>--}}
                        {{--                                <h4>Laboratorium</h4>--}}
                        {{--                                <p>Terdapat laboratorium yang dapat digunakan untuk melakukan kegiatan praktek.</p>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">--}}
                        {{--                                <i class="bx bx-home"></i>--}}
                        {{--                                <h4>Fasilitas Tempat Sholat</h4>--}}
                        {{--                                <p>Terdapat tempat untuk beribadah yang dapat digunakan oleh seluruh pihak sekolah.</p>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">--}}
                        {{--                                <i class="bx bx-building"></i>--}}
                        {{--                                <h4>Gedung Berlantai 4</h4>--}}
                        {{--                                <p>Memiliki bangunan yang memadai untuk melakukan kegiatan belajar mengajar.</p>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="keuntungan" class="features" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h2>Kompetensi Keahlian</h2>
                <p>Berikut Kompetensi Keahlian di Sekolah kami.</p>
            </div>
            <div class="row content">
                <div class="col-md-3 mb-2" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{asset('landingpage/img/jurusan/Logo.png')}}" class="img-fluid" alt="">
                </div>
                
                <div class="col-md-9" data-aos="fade-left" data-aos-delay="100">
                    <h3>Ilmu Pengetahuan Alam (IPA)</h3>
                    <p class="font-italic">
                        Materi Wajib Yang Diajarkan:
                    </p>
                    <ul>
                        <li><i class="icofont-check"></i>Bahasa Indonesia</li>
                        <li><i class="icofont-check"></i>PKN</li>
                        <li><i class="icofont-check"></i>Matematika</li>
                        <li><i class="icofont-check"></i>Agama</li>
                        <li><i class="icofont-check"></i>Sejarah Indonesia</li>
                        <li><i class="icofont-check"></i>Bahasa Inggris</li>
                        <li><i class="icofont-check"></i>Seni Budaya</li>
                        <li><i class="icofont-check"></i>Penjaskes</li>
                        <li><i class="icofont-check"></i>dll</li>
                    </ul>
                    <p class="font-italic">
                        Materi Penjurusan Yang Diajarkan:
                    </p>
                    <ul>
                        <li><i class="icofont-check"></i>Matematika</li>
                        <li><i class="icofont-check"></i>Biologi</li>
                        <li><i class="icofont-check"></i>Fisika</li>
                        <li><i class="icofont-check"></i>Kimia</li>
                    </ul>
                </div>
            </div>
            <div class="row content" style="margin-top: 50px;">
                <div class="col-md-3 mb-2" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{asset('landingpage/img/jurusan/Logo.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-9" data-aos="fade-left" data-aos-delay="100">
                    <h3>Ilmu Pengetahuan Sosial (IPS)</h3>
                    <p class="font-italic">
                        Materi Wajib Yang Diajarkan:
                    </p>
                    <ul>
                        <li><i class="icofont-check"></i>Bahasa Indonesia</li>
                        <li><i class="icofont-check"></i>PKN</li>
                        <li><i class="icofont-check"></i>Matematika</li>
                        <li><i class="icofont-check"></i>Agama</li>
                        <li><i class="icofont-check"></i>Sejarah Indonesia</li>
                        <li><i class="icofont-check"></i>Bahasa Inggris</li>
                        <li><i class="icofont-check"></i>Seni Budaya</li>
                        <li><i class="icofont-check"></i>Penjaskes</li>
                        <li><i class="icofont-check"></i>dll</li>
                    </ul>
                    <p class="font-italic">
                        Materi Penjurusan Yang Diajarkan:
                    </p>
                    <ul>
                        <li><i class="icofont-check"></i>Ekonomi</li>
                        <li><i class="icofont-check"></i>Geografi</li>
                        <li><i class="icofont-check"></i>Sosiologi dan Antropolgi</li>
                        <li><i class="icofont-check"></i>Sejarah</li>
                    </ul>
                </div>
            </div>
    </section>
    <section id="syarat-pendaftaran" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Syarat Pendaftaran</h2>
                <p>Adapun persyaratan yang harus anda persiapkan untuk melakukan pendaftaran di sekolah kami sebagai berikut :</p>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box" style="width:100%;">
                        <h4 class="title">1</h4>
                        <p class="description">Calon Siswa membuka halaman PPDB dan melakukan registrasi.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box" style="width:100%;">
                        <h4 class="title">2</h4>
                        <p class="description">Mengupload berkas di bawah:</p>
                        <br>
                        <p style="text-align: left;">
                        1. Fotocopy Akte Kelahoran Anak.<br>
                        2. Fotocopy Kartu Susunan Keluarga / KSK.<br>
                        3. Fotocopy Surat Baptis (bila ada).<br>
                        4. Fotocopy Raport yang sudah dilegalisir.<br>
                        5. Fotocopy Ijasah + SKHUN yang telah dilegalisir.<br>
                        6. Pas Foto terbaru ukuran 3x4 sebanyak 2 (dua) lembar.<br>
                        7. Fotocopy Surat Kewarganegaraan<br>
                        8. Lain – lain.<br> 
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box" style="width:100%;">
                        <h4 class="title">3</h4>
                        <p class="description">Tidak bertindik atau bertato.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box" style="width:100%;">
                        <h4 class="title">4</h4>
                        <p class="description">Siswa dinyatakan diterima apabila sudah mengisi formulir dan sudah melakukan Pembayaran Biaya Pendidikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="langkah-pendaftaran" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Langkah - Langkah Pendaftaran</h2>
                <p>Berikut ini merupakan langkah-langkah pendaftaran peserta didik baru di sekolah kami.</p>
            </div>

            <img src="{{asset('landingpage/img/alur.png')}}" class="mx-auto d-block">

        </div>
    </section>
    <section id="kegiatan" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Kegiatan</h2>
                <p>Adapun juga kegiatan - kegiatan di sekolah kami.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".kegiatan">Kegiatan</li>
                        <li data-filter=".pelatihan">Pelatihan</li>
                        <li data-filter=".kompetisi">Competition</li>
                        <li data-filter=".wisuda">Wisuda</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                <div class="col-lg-4 col-md-6 portfolio-item kompetisi">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/galeri/UBS.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Competition Basketball Honda DBL East Java Series 2019 - North Region</h4>
                            <p>Competition</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/galeri/Pameran-Pendidikan-2020-at-Jatim-Expo-767x1024.jpeg')}}" data-gall="portfolioGallery" class="venobox" title="Pameran Pendidikan 2020 di Jatim Expo"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item kegiatan">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/galeri/upacara.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Upacara Bendera 17 Agustus</h4>
                            <p>Kegiatan</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/galeri/Pelatihan-Rumah-Belajar-at-Badan-Diklat-Propinsi-Jatim-1024x768.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Pelatihan Rumah Belajar di Badan Diklat Propinsi Jawa Timur"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item kompetisi">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/galeri/Voenix.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Competition Basketball VOENIX CUP</h4>
                            <p>Competition</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/galeri/Perkemahan-Sejuta-Tenda-1-1.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Perkemahan Sejuta Tenda"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="kontak" class="contact section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Kontak</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-4 mt-md-0">
                    {{--                    <img src="{{asset('asset/logo.png')}}" style="width: 300px;max-width: 100%;">--}}
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7050200650774!2d112.69835101477493!3d-7.274367994749416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fc1b7efac4ff%3A0x3726175cb9560cb6!2sSekolah%20Menengah%20Atas%20Kristen%20Kalam%20Kudus!5e0!3m2!1sid!2sid!4v1590774396857!5m2!1sid!2sid" width="550" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Alamat</h3>
                                <p>Jl. Kupang Jaya No.135-136, Simomulyo, Kec. Sukomanunggal, Kota SBY, Jawa Timur 60189
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email</h3>
                                <p>unknown</p>
                            </div>
                        </div>  <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-link"></i>
                                <h3>Website</h3>
                                <p><a href="https://kalamkudussby.sch.id/" target="_blank">www.kalamkudussby.sch.id</a></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Telepon</h3>
                                <p>Telp./Fax. : <br>(031) 7329355 (Hari kerja Senin-Sabtu)</p>
                                <p>Telp. On Line :<br>
                                    081 238354128 - Ms. Sri Tawami (SMA)<br>
                                    082 245073815 - Ms. Sari (Yayasan)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
<footer id="footer">
    <div class="container d-md-flex py-4">
        <div class="mr-md-auto text-center text-md-left">
            <p>
                Copyright &copy; {{ now()->year }} All rights reserved | Informatika ITATS 2020
            </p>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="https://www.instagram.com/skkk_surabaya/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
    </div>
</footer>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
{{--<div id="preloader"></div>--}}
<!-- Vendor JS Files -->
<script src="{{asset('landingpage/vendor/jquery/jquery.min.js')}}"></script>
{{-- <script src="{{asset('landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
<script src="{{asset('landingpage/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
{{-- <script src="{{asset('landingpage/vendor/php-email-form/validate.js')}}"></script> --}}
<script src="{{asset('landingpage/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('landingpage/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('landingpage/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('landingpage//vendor/aos/aos.js')}}"></script>
<script src="{{asset('landingpage/js/main.js')}}"></script>
</body>
</html>
