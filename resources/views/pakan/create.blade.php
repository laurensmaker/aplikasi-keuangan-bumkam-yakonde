@extends('layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <a href="{{ route('pakan.index') }}" class="btn btn-warning waves-effect waves-light">
                      <i class="bx bx-left-arrow-alt font-size-16 align-middle me-2"></i> Kembali
                    </a>

                        {{-- <div class="page-title-right">
                            <div class="card">
                                <div class="card-body">
                                    Total Stok
                                </div>
                            </div>
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

                            <form action="{{ route('pakan.store') }}" method="POST">
                                @csrf
                                {{-- <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingnameInput" placeholder="Enter Name">
                                    <label for="floatingnameInput">Tanngal Produksi</label>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingemailInput" name="tanggal_masuk" placeholder="Tanggal Masuk">
                                            <label for="floatingemailInput">Tanggal Masuk</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelectGrid" name="nama_pakan" aria-label="Floating label select example">
                                                <option>Pilih</option>
                                                <option value="Jagung Giling">Jagung Giling</option>     
                                                <option value="Bekatul (dedak halus)">Bekatul (dedak halus)</option>     
                                                <option value="Sorghum">Sorghum</option>     
                                            </select>
                                            <label for="floatingSelectGrid">Nama Pakan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="stok_masuk" id="stokMasuk" placeholder="Stok Masuk (Kg)">
                                            <label for="stokMasuk">Stok Masuk (Kg)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="harga_per_kg" id="stokMasuk" placeholder="Harga Per Kg">
                                            <label for="stokMasuk">Harga Per Kg</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-warning w-md">Simpan</button>
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