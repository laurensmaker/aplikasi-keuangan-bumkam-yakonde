@extends('layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <a href="{{ route('produksi.index') }}" class="btn btn-warning waves-effect waves-light">
                      <i class="bx bx-left-arrow-alt font-size-16 align-middle me-2"></i> Kembali
                    </a>

                        {{-- <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form Layouts</li>
                            </ol>
                        </div> --}}

                    </div>
                </div>
            </div>
            <!-- end page title -->

           
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Floating labels</h5>
                            <p class="card-title-desc">Create beautifully simple form labels that float over your input fields.</p> --}}

                            <form action="{{ route('produksi.update', $produksi->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" name="tanggal_produksi"
                                                value="{{ old('tanggal_produksi', $produksi->tanggal_produksi) }}"
                                                placeholder="Tanggal Produksi">
                                            <label>Tanggal Produksi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="kandang_id">
                                                <option value="">Pilih</option>
                                                @foreach ($kandang as $item)
                                                    <option value="{{ $item->id }}" 
                                                        {{ $item->id == $produksi->kandang_id ? 'selected' : '' }}>
                                                        {{ $item->kandang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label>Pilih Kandang</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="jumlah_ayam"
                                                value="{{ old('jumlah_ayam', $produksi->jumlah_ayam) }}"
                                                placeholder="Jumlah Ayam">
                                            <label>Jumlah Ayam</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="jumlah_telur"
                                                value="{{ old('jumlah_telur', $produksi->jumlah_telur) }}"
                                                placeholder="Jumlah Telur">
                                            <label>Jumlah Telur</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="berat_total"
                                                value="{{ old('berat_total', $produksi->berat_total) }}"
                                                placeholder="Berat Total (Kg)">
                                            <label>Berat Total (Kg)</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="telur_bagus"
                                                value="{{ old('telur_bagus', $produksi->telur_bagus) }}"
                                                placeholder="Telur Bagus">
                                            <label>Telur Bagus</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="telur_rusak"
                                                value="{{ old('telur_rusak', $produksi->telur_rusak) }}"
                                                placeholder="Telur Rusak">
                                            <label>Telur Rusak</label>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelectGrid" name="nama_pakan" aria-label="Floating label select example">
                                                <option>Pilih</option>
                                                <option value="Jagung Giling">Jagung Giling</option>     
                                                <option value="Bekatul">Bekatul (dedak halus)</option>     
                                                <option value="Sorghum">Sorghum</option>   
                                            </select>
                                            <label for="floatingSelectGrid">Pilih Pakan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="pakan_digunakan"
                                                value="{{ old('pakan_digunakan', $produksi->pakan_digunakan) }}"
                                                placeholder="Pakan Digunakan (Kg)">
                                            <label>Pakan Digunakan (Kg)</label>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-warning w-md">Perbarui</button>
                                </div>
                            </form>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    
@endsection