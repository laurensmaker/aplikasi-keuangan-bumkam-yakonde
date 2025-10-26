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
                           <form action="{{ route('pakan.update', $pakan->id) }}" 
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Tanggal Masuk -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" 
                                                name="tanggal_masuk" 
                                                value="{{ old('tanggal_masuk', $pakan->tanggal_masuk ?? '') }}"
                                                required>
                                            <label for="tanggal_masuk">Tanggal Masuk</label>
                                        </div>
                                    </div>

                                    <!-- Nama Pakan -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="nama_pakan" required>
                                                <option value="">Pilih</option>
                                                <option value="Jangung Giling" {{ (old('nama_pakan', $pakan->nama_pakan ?? '') == 'Jangung Giling') ? 'selected' : '' }}>Jangung Giling</option>
                                                <option value="Bekatul (dedak halus)" {{ (old('nama_pakan', $pakan->nama_pakan ?? '') == 'Bekatul (dedak halus)') ? 'selected' : '' }}>Bekatul (dedak halus)</option>
                                                <option value="Sorghum" {{ (old('nama_pakan', $pakan->nama_pakan ?? '') == 'Sorghum') ? 'selected' : '' }}>Sorghum</option>
                                            </select>
                                            <label for="nama_pakan">Nama Pakan</label>
                                        </div>
                                    </div>

                                    <!-- Stok Masuk -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" 
                                                name="stok_masuk"
                                                value="{{ old('stok_masuk', $pakan->stok_masuk ?? '') }}"
                                                placeholder="Stok Masuk (Kg)" required>
                                            <label for="stokMasuk">Stok Masuk (Kg)</label>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-warning w-md">
                                        {{ isset($pakan) ? 'Update' : 'Simpan' }}
                                    </button>
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