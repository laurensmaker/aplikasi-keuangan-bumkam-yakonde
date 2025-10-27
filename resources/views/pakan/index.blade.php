@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="container-fluid">
      

        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
        @endif
        
        
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <a href="{{ route('pakan.create') }}" class="btn btn-warning waves-effect waves-light">
                        <i class="bx bx-plus font-size-16 align-middle me-2"></i> Stok Masuk
                    </a>

                    {{-- <div class="page-title-right mb-3">
                        <div>
                            <strong>Filter Pakan</strong>
                            <select id="filterPakan" class="form-select form-select-sm mt-2 w-auto d-inline-block">
                                <option value="all">Semua Pakan</option>
                                <option value="Jagung Giling">Pakan Jagung Giling</option>
                                <option value="Bekatul">Pakan Bekatul</option>
                                <option value="Sorghum">Pakan Sorghum</option>
                            </select>
                        </div>
                    </div> --}}

                    <div class="page-title-right mb-3">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownDownload" data-bs-toggle="dropdown" aria-expanded="false">
                                Download Laporan
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownDownload">
                                <li>
                                    <a class="dropdown-item" href="{{ route('laporan.cetak', ['jenis' => 'pakan']) }}">
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


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Pakan</h4>
                        <p class="card-title-desc">Data Pakan.</p>

                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tabelPakan" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th data-priority="1">Nama Pakan</th>
                                        <th data-priority="3">Stok Awal (Kg)</th>
                                        <th data-priority="3">Stok Masuk (Kg)</th>
                                        <th data-priority="6">Harga Per (Kg)</th>
                                        <th data-priority="6">Tanggal Masuk</th>
                                        {{-- <th data-priority="6">Total Stok/Stok Akhir</th> --}}
                                        <th data-priority="6">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pakan as $index => $item)
                                        <tr data-pakan="{{ $item->nama_pakan }}">
                                            <th>{{ $index + 1 }}</th>
                                            <td>{{ $item->nama_pakan }}</td>
                                            <td>{{ number_format($item->stok_awal, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->stok_masuk, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->harga_per_kg, 0, ',', '.') }}</td>
                                            {{-- <td>{{ $item->harga_per_kg }}</td> --}}
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}</td>
                                            {{-- <td><strong class="bg-warning p-2">{{ $item->stok_sisa }}</strong></td> --}}
                                            <td class="d-flex gap-2">

                                                <form action="{{ route('pakan.destroy', $item->id) }}" method="POST" class="d-inline form-hapus">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-label waves-effect waves-light btn-hapus">
                                                        <i class="bx bx-trash label-icon"></i> Hapus
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- ================== SCRIPT FILTER ================== --}}
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const filterSelect = document.getElementById('filterPakan');
                        const rows = document.querySelectorAll('#tabelPakan tbody tr');

                        // Saat dropdown berubah
                        filterSelect.addEventListener('change', function() {
                            const filterValue = this.value.toLowerCase();

                            rows.forEach(row => {
                                const namaPakan = row.getAttribute('data-pakan').toLowerCase();
                                if (filterValue === 'all' || namaPakan.includes(filterValue)) {
                                    row.style.display = '';
                                } else {
                                    row.style.display = 'none';
                                }
                            });
                        });

                        // Konfirmasi hapus (kode asli kamu tetap dipertahankan)
                        const buttons = document.querySelectorAll('.btn-hapus');
                        buttons.forEach(button => {
                            button.addEventListener('click', function(e) {
                                const form = this.closest('.form-hapus');
                                Swal.fire({
                                    title: 'Yakin ingin menghapus data ini?',
                                    text: "Data yang dihapus tidak bisa dikembalikan!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Ya, hapus!',
                                    cancelButtonText: 'Batal'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        form.submit();
                                    }
                                });
                            });
                        });
                    });
                    </script>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

    
@endsection