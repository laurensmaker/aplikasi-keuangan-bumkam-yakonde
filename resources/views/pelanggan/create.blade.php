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

                        <form action="{{ route('pelanggan.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <!-- Tanggal Penjualan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="tanggalPenjualan" name="tanggal" placeholder="Tanggal Penjualan" required>
                                        <label for="tanggalPenjualan">Tanggal Penjualan</label>
                                    </div>
                                </div>

                                <!-- Nama Pelanggan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="namaPelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
                                        <label for="namaPelanggan">Nama Pelanggan</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="alamat" name="alamat_pelanggan" placeholder="Alamat" required>
                                        <label for="alamat">Alamat</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="noHp" name="no_hp_pelanggan" placeholder="No HP (WA)" required>
                                        <label for="noHp">No HP (WA)</label>
                                    </div>
                                </div>

                                <!-- Jenis Satuan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="jenisSatuan" name="jenis_satuan" required>
                                            <option value="">-- Pilih Jenis Satuan --</option>
                                            <option value="kg">Per Kilogram (Kg)</option>
                                            <option value="rak">Per Rak</option>
                                        </select>
                                        <label for="jenisSatuan">Jenis Satuan</label>
                                    </div>
                                </div>

                                <!-- Jumlah -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="jumlah" id="jumlah" step="0.01" placeholder="Jumlah" required>
                                        <label for="jumlah">Jumlah (sesuai satuan)</label>
                                    </div>
                                </div>

                                <!-- Harga per satuan -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="harga_per_satuan" id="harga" step="0.01" placeholder="Harga per Satuan" required>
                                        <label for="harga">Harga per Satuan (Rp)</label>
                                    </div>
                                </div>

                                <!-- Total harga otomatis -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="totalHarga" name="total_harga" readonly placeholder="Total Harga">
                                        <label for="totalHarga">Total Harga (Rp)</label>
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

<script>
document.addEventListener('input', function() {
    const jumlah = parseFloat(document.getElementById('jumlah').value) || 0;
    const harga = parseFloat(document.getElementById('harga').value) || 0;
    const total = jumlah * harga;
    document.getElementById('totalHarga').value = total.toLocaleString('id-ID');
});
</script>
@endsection