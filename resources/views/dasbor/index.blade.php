@extends('layouts.main')
@section('content')
 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li> --}}
                            {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-warning-subtle">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-warning p-3">
                                    <h5 class="text-warning">Welcome Back !</h5>
                                    <p>Skote Dashboard</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            
                            <div class="col-sm-8">
                                <div class="pt-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="h5">Produksi Harian Terkini</h5>
                                        </div>
                                    </div>
                                    @if (!$produksiTotal->isEmpty())
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-13">{{ \Carbon\Carbon::parse($produksiTerbaru->tanggal_produksi)->translatedFormat('d F Y') }}</h5>
                                                <p class="text-muted mb-0">Produksi Terbaru</p>
                                            </div>
                                            <div class="col-3">
                                                <h5 class="font-size-13">{{ number_format($produksiTerbaru->jumlah_telur) }}</h5>
                                                <p class="text-muted mb-0" style="font-size: 11px">Jumlah Telur</p>
                                            </div>
                                            <div class="col-3">
                                                <h5 class="font-size-13">{{ number_format($produksiTerbaru->pakan_digunakan, 2, ',', '.') }} <small>Kg</small></h5>
                                                <p class="text-muted mb-0" style="font-size: 11px">Pakan </p>
                                            </div>
                                        </div>                                        
                                        <div class="mt-4">
                                            <a href="{{ route('produksi.index') }}" class="btn btn-warning waves-effect waves-light btn-sm">Lihat Detail Produksi <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col">
                                                <p>Belum Ada Data Produksi</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Ringkasan Keuangan</h4>
                        <div class="row">
                            <div class="col-sm-6">
                               <div class="d-flex">                                  
                                     <div class="flex-shrink-0 align-self-center me-3">
                                        <h5 class="h5">Pemasukan Bulanan : <strong class="text-success">{{ $pemasukanRp }}</strong></h5>
                                    </div>                                   
                                </div>                                
                            </div>                           
                            
                        </div>
                        <div class="row">
                             <div class="col-sm-6">
                               <div class="d-flex">                                  
                                     <div class="flex-shrink-0 align-self-center me-3">
                                        <h5 class="h5">Pengeluaran Bulanan : <strong class="text-danger">{{ $pengeluaranRp }}</strong></h5>
                                    </div>                                   
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-sm-6">
                               <div class="d-flex">                                  
                                     <div class="flex-shrink-0 align-self-center me-3">
                                        <h5 class="h5">Keuntungan : <strong class="text-warning">{{ $keuntunganRp }}</strong></h5>
                                    </div>                                   
                                </div>
                                
                            </div>
                        </div>
                        {{-- <p class="text-muted mb-0">Sep 29 2025</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="card mini-stats-wid">
                            <div class="card-body">                               
                                <div class="d-flex">                                   
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <div class="avatar-sm rounded-circle bg-warning mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-warning">
                                                <i class="mdi mdi-rice font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                     <div class="flex-shrink-0 align-self-center me-3">
                                        <h4>Pakan Ayam</h4>
                                    </div>
                                    <div class="flex-grow-1">
                                        @if ($pakanTotal->isEmpty())
                                            <p>Stok Kosong</p>
                                        @else
                                            <h4 class="mb-0">{{ number_format($pakanTerbaru->stok_sisa, 2, ',', '.') }} Kg</h4>
                                            @if ($pakanTerbaru->stok_sisa > 50) 
                                                <p class="fw-medium text-success">
                                                    <i class="mdi mdi-check-circle-outline"></i> Stok Aman
                                                </p>
                                            @elseif ($pakanTerbaru->stok_sisa > 0 && $pakanTerbaru->stok_sisa <= 50)
                                                <p class="fw-medium text-warning">
                                                    <i class="mdi mdi-alert-circle-outline"></i> Stok Menipis!
                                                </p>
                                            @else
                                                <p class="fw-medium text-danger">
                                                    <i class="mdi mdi-close-circle-outline"></i> Stok Habis!
                                                </p>
                                            @endif
                                            
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mini-stats-wid">
                            <div class="card-body">                               
                                <div class="d-flex">                                   
                                    <div class="flex-shrink-0 align-self-center me-3">
                                        <div class="avatar-sm rounded-circle bg-warning mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-warning">
                                                <i class="mdi mdi-egg-outline font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                     <div class="flex-shrink-0 align-self-center me-3">
                                        <h4>Telur Bagus</h4>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0">{{ $totalTelurBagus }} Butir</h4>
                                        <p class="fw-medium text-success">Total Telur Bagus</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end row -->

                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                        <h4 class="card-title mb-5">Transaksi Penjualan Telur</h4>


                        @forelse ($pelangganTerbaru as $pelanggan )
                            <div class="row">
                                <div class="col-8">
                                    <div class="card" style="background-color: rgba(204, 204, 204, 0.489);">
                                        <div class="card-body p-0 pt-2 ps-2">
                                            <div class="d-flex">                                   
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0 fw-bold">Jual Telur</h6>
                                                     <p class="fw-medium text-secondary">{{ \Carbon\Carbon::parse($pelanggan->tanggal)->translatedFormat('d F Y') }}</p>
                                                </div>
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <h6>Rp. {{ number_format($pelanggan->total_harga) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @empty
                            
                        @endforelse
                        
                        <div class="text-center mt-4"><a href="{{ route('pelanggan.index') }}" class="btn btn-warning waves-effect waves-light btn-sm">Lihat Detail Penjualan <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                    </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
    
@endsection