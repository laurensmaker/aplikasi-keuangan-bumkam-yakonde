@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-warning waves-effect waves-light">
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

                        {{-- Form edit pelanggan --}}
                        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <!-- Tanggal Penjualan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="tanggalPenjualan" 
                                               name="tanggal" 
                                               value="{{ old('tanggal', $pelanggan->tanggal) }}" required>
                                        <label for="tanggalPenjualan">Tanggal Penjualan</label>
                                    </div>
                                </div>

                                <!-- Nama Pelanggan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="namaPelanggan" 
                                               name="nama_pelanggan" 
                                               value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" required>
                                        <label for="namaPelanggan">Nama Pelanggan</label>
                                    </div>
                                </div>

                                <!-- Alamat -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="alamat" 
                                               name="alamat_pelanggan" 
                                               value="{{ old('alamat_pelanggan', $pelanggan->alamat_pelanggan) }}" required>
                                        <label for="alamat">Alamat</label>
                                    </div>
                                </div>

                                <!-- Nomor HP -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="noHp" 
                                               name="no_hp_pelanggan" 
                                               value="{{ old('no_hp_pelanggan', $pelanggan->no_hp_pelanggan) }}" required>
                                        <label for="noHp">No HP (WA)</label>
                                    </div>
                                </div>

                                <!-- Jenis Satuan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="jenisSatuan" name="jenis_satuan" required>
                                            <option value="">-- Pilih Jenis Satuan --</option>
                                            <option value="kg" {{ old('jenis_satuan', $pelanggan->jenis_satuan) == 'kg' ? 'selected' : '' }}>Per Kilogram (Kg)</option>
                                            <option value="papan" {{ old('jenis_satuan', $pelanggan->jenis_satuan) == 'papan' ? 'selected' : '' }}>Per Papan</option>
                                        </select>
                                        <label for="jenisSatuan">Jenis Satuan</label>
                                    </div>
                                </div>

                                <!-- Jumlah -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="jumlah" id="jumlah" step="0.01"
                                               value="{{ old('jumlah', $pelanggan->jumlah) }}" required>
                                        <label for="jumlah">Jumlah (sesuai satuan)</label>
                                    </div>
                                </div>

                                <!-- Harga per satuan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="harga_per_satuan" id="harga" step="0.01"
                                               value="{{ old('harga_per_satuan', $pelanggan->harga_per_satuan) }}" required>
                                        <label for="harga">Harga per Satuan (Rp)</label>
                                    </div>
                                </div>

                                <!-- Total harga otomatis -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="totalHarga" name="total_harga" 
                                               value="{{ number_format($pelanggan->total_harga, 0, ',', '.') }}" readonly>
                                        <label for="totalHarga">Total Harga (Rp)</label>
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

<script>
document.addEventListener('input', function() {
    const jumlah = parseFloat(document.getElementById('jumlah').value) || 0;
    const harga = parseFloat(document.getElementById('harga').value) || 0;
    const total = jumlah * harga;
    document.getElementById('totalHarga').value = total.toLocaleString('id-ID');
});
</script>
@endsection
