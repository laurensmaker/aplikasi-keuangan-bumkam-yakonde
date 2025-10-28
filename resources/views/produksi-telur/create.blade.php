@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Peringatan!',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Tutup'
                })
            </script>
        @endif

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <a href="{{ route('produksi.index') }}" class="btn btn-warning waves-effect waves-light">
                        <i class="bx bx-left-arrow-alt font-size-16 align-middle me-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('produksi.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" name="tanggal_produksi" id="floatingTanggal"
                                            value="{{ old('tanggal_produksi') }}" placeholder="Tanggal Produksi">
                                        <label for="floatingTanggal">Tanggal Produksi</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="kandang_id" id="floatingKandang" aria-label="Pilih kandang">
                                            <option value="">Pilih</option>
                                            @foreach ($kandang as $item)
                                                <option value="{{ $item->id }}" {{ old('kandang_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->kandang }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="floatingKandang">Pilih Kandang</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="jumlah_ayam" id="jmlAyam"
                                            value="{{ old('jumlah_ayam') }}" placeholder="Jumlah Ayam">
                                        <label for="jmlAyam">Jumlah Ayam</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="jumlah_telur" id="jmlTelur"
                                            value="{{ old('jumlah_telur') }}" placeholder="Jumlah Telur">
                                        <label for="jmlTelur">Jumlah Telur</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="berat_total" id="beratTotal"
                                            value="{{ old('berat_total') }}" placeholder="Berat Total (Kg)">
                                        <label for="beratTotal">Berat Total (Kg)</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="telur_bagus" id="telurBagus"
                                            value="{{ old('telur_bagus') }}" placeholder="Telur Bagus">
                                        <label for="telurBagus">Telur Bagus</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="telur_rusak" id="telurRusak"
                                            value="{{ old('telur_rusak') }}" placeholder="Telur Rusak">
                                        <label for="telurRusak">Telur Rusak</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="nama_pakan" id="floatingPakan" aria-label="Pilih pakan">
                                            <option value="">Pilih</option>
                                            <option value="Jagung Giling" {{ old('nama_pakan') == 'Jagung Giling' ? 'selected' : '' }}>Jagung Gilin</option>
                                            <option value="Bekatul (dedak halus)" {{ old('nama_pakan') == 'Bekatul (Dedak Halus)' ? 'selected' : '' }}>Bekatul (Dedak Halus)</option>
                                            <option value="Sorghum" {{ old('nama_pakan') == 'Sorghum' ? 'selected' : '' }}>Sorghum</option>
                                        </select>
                                        <label for="floatingPakan">Pilih Pakan</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="pakan_digunakan" id="pakanDigunakan"
                                            value="{{ old('pakan_digunakan') }}" placeholder="Pakan Digunakan">
                                        <label for="pakanDigunakan">Jumlah Pakan Digunakan (Kg)</label>
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
