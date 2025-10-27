@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="container-fluid">
              
        
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    {{-- <a href="{{ route('pakan.create') }}" class="btn btn-warning waves-effect waves-light">
                        <i class="bx bx-plus font-size-16 align-middle me-2"></i> Stok Keluar
                    </a> --}}

                     <div class="page-title-right mb-3">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownDownload" data-bs-toggle="dropdown" aria-expanded="false">
                                Download Laporan
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownDownload">
                                <li>
                                    <a class="dropdown-item" href="{{ route('laporan.cetak', ['jenis' => 'keuangan', 'bulan' => request('bulan'),  'tahun' => request('tahun')]) }}">
                                        <i class="bx bxs-file-pdf me-2 text-danger"></i> Download PDF
                                    </a>
                                </li>
                                {{-- <li>
                                    <a class="dropdown-item" href="">
                                        <i class="bx bxs-file me-2 text-success"></i> Download Excel
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="GET" action="{{ route('keuangan.keuangan') }}" class="row g-3 align-items-end">
                                @csrf
                                <div class="col-md-3">
                                    <label for="bulan" class="form-label">Pilih Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="">-- Semua Bulan --</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                                                {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="tahun" class="form-label">Pilih Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value="">-- Semua Tahun --</option>
                                        @for ($t = 2023; $t <= now()->year; $t++)
                                            <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>
                                                {{ $t }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary btn-sm">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Keuangan</h4>
                        <p class="card-title-desc">Laporan Keuangan.</p>

                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                    <tr>
                                        {{-- <th>No</th> --}}
                                        {{-- <th data-priority="1">Tanggal Produksi</th> --}}
                                        <th data-priority="3">Pemasukan </th>
                                        <th data-priority="6">Pengeluaran</th>
                                        <th data-priority="1">Keuntungan</th>
                                        {{-- <th data-priority="6">Aksi</th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                            <tr>
                                                {{-- <th>{{ $index+1 }}</th> --}}
                                                <th>Rp. {{ $pemasukanRp }}</th>
                                                <th>Rp. {{ $pengeluaranRp }}</th>
                                                <th>Rp. {{ $keuntunganRp }}</th>
                                                {{-- <td>{{ \Carbon\Carbon::parse($tanggal_keluar)->format('d-m-Y') }}</td> --}}
                                                
                                            </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
    
@endsection