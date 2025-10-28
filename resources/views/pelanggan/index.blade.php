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
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-warning waves-effect waves-light">
                        <i class="bx bx-plus font-size-16 align-middle me-2"></i> Pelanggan
                    </a>

                    {{-- <div class="page-title-right">
                        <div class="card bg-info">
                            <div class="card-body">
                               <strong>Total Stok : 400</strong>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Pelanggan</h4>
                        <p class="card-title-desc">Data Penjualan Telur.</p>

                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th data-priority="6">Tanggal Beli</th>
                                        <th data-priority="1">Nama Pelanggan</th>
                                        <th data-priority="1">Alamat </th>
                                        <th data-priority="1">No HP </th>
                                        <th data-priority="3">Jenis Satuan </th>
                                        <th data-priority="3">Jumlah Beli </th>
                                        <th data-priority="3">Harga Per Satuan </th>
                                        <th data-priority="3">Total Harga</th>
                                        <th data-priority="6">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pelanggan as $index => $item)
                                            <tr>
                                                <th>{{ $index+1 }}</th>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                                <td>{{ $item->nama_pelanggan }}</td>
                                                {{-- <td>{{ $item->stok_awal }}</td> --}}
                                                <td>{{ $item->alamat_pelanggan }}</td>
                                                <td>{{ $item->no_hp_pelanggan }}</td>
                                                <td>{{ $item->jenis_satuan }}</td>
                                                <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                                <td>{{ number_format($item->harga_per_satuan, 0, ',', '.') }}</td>
                                                <td>{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                                {{-- <td>{{ $item->harga_per_satuan }}</td> --}}
                                                {{-- <td>{{ $item->total_harga }}</td> --}}
                                                <td class="d-flex gap-2">
                                                {{-- <a href="{{ route('pelanggan.edit', $item->id) }}" class="btn btn-success  waves-effect btn-label waves-light"><i class="bx bx-pencil label-icon"></i> Edit</a> --}}
                                                <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" class="d-inline form-hapus">
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