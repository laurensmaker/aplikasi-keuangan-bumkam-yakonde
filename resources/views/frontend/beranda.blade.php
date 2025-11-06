@extends('frontend.layouts.main')
@section('content')
  <!-- home-slider start -->
  
    <section class="hero-section text-white d-flex align-items-center" 
         style="background-image: url('{{ asset('frontend/img/silider1.svg') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-8 col-lg-6">
                <span class="d-block mb-2 fs-5 fw-semibold">
                    Selamat Datang di Rumah Digital Peternakan Telur
                </span>
                <h1 class="fw-bold text-warning display-4 mb-3">
                    SiTelur
                </h1>
                <h4 class="fw-normal mb-4 text-white">
                    Sistem Informasi Telur dan Usaha Rakyat
                </h4>
                <a href="{{ route('login') }}" class="btn btn-warning text-dark fw-bold px-4 py-2 rounded-pill">
                    Login
                </a>
            </div>
        </div>
    </div>
</section>


    <!-- home-slider end -->
    
    <!-- latar belakang-->
<section class="py-5" 
    style="background-image: url('{{ asset('frontend/img/Background-Halaman-2.svg') }}');
           background-size: cover;
           background-position: center;
           background-repeat: no-repeat;">
    <div class="container">

        <!-- Latar Belakang -->
        <div class="row justify-content-center text-center mb-4">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card border-0 shadow-sm p-4" style="background-color: rgba(39, 37, 37, 0.35);">
                    <h1 class="text-center text-warning mb-3">Latar Belakang</h1>
                    <p class="text-white mb-0">
                        Pengembangan aplikasi <strong>SiTelur</strong> berawal dari tugas mahasiswa Universitas Cenderawasih untuk menciptakan sistem yang tidak hanya mempermudah pengelolaan dan pendataan hasil ternak, tetapi juga mendorong pemberdayaan ekonomi lokal. Melalui pemanfaatan teknologi berbasis web, aplikasi ini diharapkan menjadi langkah strategis dalam proses digitalisasi sektor peternakan unggas di Papua. Inovasi ini sekaligus menjadi wujud penerapan ilmu pengetahuan, kolaborasi, dan semangat mahasiswa dalam menghadirkan karya teknologi yang relevan, solutif, dan berdampak nyata bagi masyarakat.
                    </p>
                </div>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="row g-4">

            <!-- Visi -->
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm p-4 h-100 text-center" style="background-color: rgba(39, 37, 37, 0.35);">
                    <h1 class="text-warning mb-3">Visi</h1>
                    <p class="fw-semibold text-white mb-0">
                        Mewujudkan inovasi digital berbasis teknologi informasi untuk mendukung efisiensi, transparansi, dan peningkatan nilai ekonomi dalam distribusi serta pengelolaan hasil peternakan telur di Papua.
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm p-4 h-100" style="background-color: rgba(39, 37, 37, 0.35);">
                    <h1 class="text-center text-warning mb-3">Misi</h1>
                    <ol class="text-white text-start mb-0">
                        <li class="mb-2">
                            Mengembangkan aplikasi yang memudahkan peternak dalam proses transaksi dan pendataan hasil produksi telur secara real-time.
                        </li>
                        <li class="mb-2">
                            Meningkatkan literasi digital masyarakat melalui pemanfaatan teknologi lokal yang sederhana namun berdampak luas bagi ekonomi daerah.
                        </li>
                        <li>
                            Mendorong kolaborasi antara dunia akademik, pelaku usaha, dan pemerintah daerah dalam menciptakan ekosistem digital peternakan yang berkelanjutan.
                        </li>
                    </ol>
                </div>
            </div>
        </div>

    </div>
</section>

    <!-- tab stat -->
    <section class="">
        <div class="container">
            <h1 class="text-center mb-2 mt-5">Fitur Utama</h1>
            <div class="row mb-3 mt-4 justify-content-center text-center">
                <!-- Menu Data Pakan -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                    <div style="width: 250px">
                        <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center mx-auto"
                            style="width: 200px; height: 200px;">
                            <i class="fa-solid fa-bowl-rice fa-5x text-white"></i>
                        </div>
                        <h5 class="mt-3">Menu Data Pakan</h5>
                        <p>Berfungsi untuk mengelola seluruh data terkait pakan ayam</p>
                    </div>
                </div>

                <!-- Menu Keuangan -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                    <div style="width: 250px">
                        <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center mx-auto"
                            style="width: 200px; height: 200px;">
                            <i class="fa-solid fa-sack-dollar fa-5x text-white"></i>
                        </div>
                        <h5 class="mt-3">Menu Keuangan</h5>
                        <p>Fitur ini mencatat seluruh transaksi keuangan yang berkaitan dengan usaha peternakan</p>
                    </div>
                </div>

                <!-- Menu Produksi Telur -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                    <div style="width: 250px">
                        <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center mx-auto"
                            style="width: 200px; height: 200px;">
                            <i class="fa-solid fa-egg fa-5x text-white"></i>
                        </div>
                        <h5 class="mt-3">Menu Produksi Telur</h5>
                        <p>Menyimpan dan menampilkan data produksi telur harian</p>
                    </div>
                </div>

                <!-- Menu Pelanggan -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                    <div style="width: 250px">
                        <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center mx-auto"
                            style="width: 200px; height: 200px;">
                            <i class="fa-solid fa-user fa-5x text-white"></i>
                        </div>
                        <h5 class="mt-3">Menu Pelanggan</h5>
                        <p>Berfungsi untuk mengelola data pelanggan atau pembeli</p>
                    </div>
                </div>

                <!-- Menu Laporan -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                    <div style="width: 250px">
                        <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center mx-auto"
                            style="width: 200px; height: 200px;">
                            <i class="fa-solid fa-file fa-5x text-white"></i>
                        </div>
                        <h5 class="mt-3">Menu Laporan</h5>
                        <p>Menyediakan fitur untuk menyimpan laporan berdasarkan data yang tercatat di aplikasi</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- tab stat -->
    
    <!-- tab end -->
    <!-- product start -->
    <section class="special-category collection-category-template section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="collection-category">
                        {{-- <div class="section-capture">
                            <div class="section-title">
                                <span class="sub-title">Breads every day</span>
                                <h2><span>Feature products</span></h2>
                            </div>
                        </div> --}}
                        <div class="collection-wrap">
                            <div class="collection-slider swiper" id="pro-template">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <!-- product start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a>
                                                    <img src="{{ asset('frontend/img/k-gambar1.jpeg') }}" class="img-fluid" alt="p-1">
                                                </a>                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <!-- product start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a>
                                                    <img src="{{ asset('frontend/img/k-gambar2.jpeg') }}" class="img-fluid" alt="p-1">
                                                </a>                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <!-- product start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a>
                                                    <img src="{{ asset('frontend/img/k-gambar6.jpeg') }}" class="img-fluid w-100" alt="p-1">
                                                </a>                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <!-- product start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a>
                                                    <img src="{{ asset('frontend/img/k-gambar7.jpeg') }}" class="img-fluid" alt="p-1">
                                                </a>                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <!-- product start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a>
                                                    <img src="{{ asset('frontend/img/k-gambar8.jpeg') }}" class="img-fluid" alt="p-1">
                                                </a>                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <!-- product start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a>
                                                    <img src="{{ asset('frontend/img/k-gambar9.jpeg') }}" class="img-fluid" alt="p-1">
                                                </a>                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <!-- product start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a>
                                                    <img src="{{ asset('frontend/img/k-gambar5.jpeg') }}" class="img-fluid" alt="p-1">
                                                </a>                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <!-- product start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a>
                                                    <img src="{{ asset('frontend/img/k-gambar3.jpeg') }}" class="img-fluid" alt="p-1">
                                                </a>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product end -->

     <section class="">
        <div class="container-fluid" style="padding-top: 8%; padding-bottom: 8%; background-image: url('{{ asset('frontend/img/Background-Halaman4.svg') }}'); 
                        background-size: cover; 
                        background-position: center; 
                        background-repeat: no-repeat;                         
                        ">>
            <h1 class="text-center mb-2 mt-5">ABOUT US</h1>
            <h5 class="text-center mb-2">Tim Pengembang</h5>
            <div class="row mb-3 mt-4 justify-content-center text-center">
               
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                    <div style="width: 250px">
                        <div class="bg-warning rounded-circle mx-auto d-flex align-items-center justify-content-center" 
                        style="width: 200px; height: 200px;">
                          <img src="{{ asset('frontend/img/Rizky.svg') }}" 
                            alt="Latar Belakang" 
                            class="rounded-circle mx-auto d-block "
                            style="width: 100%; height: 100%; object-fit: cover;">
                        
                    </div>
                        <div>
                            <h5 class="text-center mt-3">Rizky Rivaldi Patora</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                    <div style="width: 250px">
                        <div class="bg-warning rounded-circle mx-auto d-flex align-items-center justify-content-center" 
                        style="width: 200px; height: 200px;">
                          <img src="{{ asset('frontend/img/Elisabet.svg') }}" 
                            alt="Latar Belakang" 
                            class="rounded-circle mx-auto d-block "
                            style="width: 100%; height: 100%; object-fit: cover;">
                        
                    </div>
                        <div>
                            <h5 class="text-center mt-3">Elisabet Kareth</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                    <div style="width: 250px">
                        <div class="bg-warning rounded-circle mx-auto d-flex align-items-center justify-content-center" 
                        style="width: 200px; height: 200px;">
                          <img src="{{ asset('frontend/img/Venike.svg') }}" 
                            alt="Latar Belakang" 
                            class="rounded-circle mx-auto d-block "
                            style="width: 100%; height: 100%; object-fit: cover;">
                        
                    </div>
                        <div>
                            <h5 class="text-center mt-3">Venike Leony Suteja Putri</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                    <div style="width: 250px">
                        <div class="bg-warning rounded-circle mx-auto d-flex align-items-center justify-content-center" 
                        style="width: 200px; height: 200px;">
                          <img src="{{ asset('frontend/img/Novita.svg') }}" 
                            alt="Latar Belakang" 
                            class="rounded-circle mx-auto d-block "
                            style="width: 100%; height: 100%; object-fit: cover;">
                        
                    </div>
                        <div>
                            <h5 class="text-center mt-3">Novita Sarwa</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4 d-flex justify-content-center">
                    <div style="width: 250px">
                        <div class="bg-warning rounded-circle mx-auto d-flex align-items-center justify-content-center" 
                        style="width: 200px; height: 200px;">
                          <img src="{{ asset('frontend/img/Daniel.svg') }}" 
                            alt="Latar Belakang" 
                            class="rounded-circle mx-auto d-block "
                            style="width: 100%; height: 100%; object-fit: cover;">
                        
                    </div>
                        <div>
                            <h5 class="text-center mt-3">Daniel Valensia Lawe</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
   
    
    
@endsection
          