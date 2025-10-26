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

       
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <a href="{{ route('produksi.create') }}" class="btn btn-warning waves-effect waves-light">
                        <i class="bx bx-plus font-size-16 align-middle me-2"></i> Produk Telur
                    </a>

                        <div class="page-title-right mb-3">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownDownload" data-bs-toggle="dropdown" aria-expanded="false">
                                Download Laporan
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownDownload">
                                <li>
                                    <a class="dropdown-item" href="{{ route('laporan.cetak', ['jenis' => 'produksi']) }}">
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

                        <h4 class="card-title">Produksi Telur</h4>
                        <p class="card-title-desc">Prduksi Telur Harian.</p>

                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th data-priority="1">Tanggal Produksi</th>
                                        <th data-priority="3">Kandang</th>
                                        <th data-priority="1">Jumlah Ayam</th>
                                        <th data-priority="3">Jumlah Telur</th>
                                        <th data-priority="3">Berat Total</th>
                                        <th data-priority="3">Telur Bagus</th>
                                        <th data-priority="6">Telur Rusak</th>
                                        <th data-priority="6">Pakan digunakan</th>
                                        <th data-priority="6">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produksi as $index => $item)
                                            <tr>
                                                <th>{{ $index+1 }}</th>
                                                <td>{{ $item->tanggal_produksi }}</td>
                                                <td>{{ $item->kandang->kandang }}</td>
                                                <td>{{ $item->jumlah_ayam }}</td>
                                                <td>{{ $item->jumlah_telur }}</td>
                                                <td>{{ $item->berat_total }}</td>
                                                <td>{{ $item->telur_bagus }}</td>
                                                <td>{{ $item->telur_rusak }}</td>
                                                <td>{{ $item->pakan_digunakan }}</td>
                                                <td class="d-flex gap-2">
                                                {{-- <a href="{{ route('produksi.edit', $item->id) }}" class="btn btn-success  waves-effect btn-label waves-light"><i class="bx bx-pencil label-icon"></i> Edit</a> --}}
                                                <form action="{{ route('produksi.destroy', $item->id) }}" method="POST" class="d-inline form-hapus">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-label waves-effect waves-light btn-hapus">
                                                        <i class="bx bx-trash label-icon"></i> Hapus
                                                    </button>
                                                </form>
                                                    <script>
                                                    document.addEventListener('DOMContentLoaded', function () {
                                                        const buttons = document.querySelectorAll('.btn-hapus');
                                                        
                                                        buttons.forEach(button => {
                                                            button.addEventListener('click', function (e) {
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


                                                </td>
                                            </tr>
                                        @endforeach
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