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

                            <form action="{{ route('produksi.store') }}" method="POST">
                                @csrf
                                {{-- <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingnameInput" placeholder="Enter Name">
                                    <label for="floatingnameInput">Tanngal Produksi</label>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingemailInput" name="tanggal_produksi" placeholder="Tanggal Produksi">
                                            <label for="floatingemailInput">Tanggal Produksi</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelectGrid" name="kandang_id" aria-label="Floating label select example">
                                                <option>Pilih</option>
                                                @foreach ($kandang as $item)
                                                  <option value="{{ $item->id }}">{{ $item->kandang }}</option>                                                    
                                                @endforeach
                                            </select>
                                            <label for="floatingSelectGrid">Pilih Kandang</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="jumlah_ayam" id="jmlAyam" placeholder="Jumlah Ayam">
                                            <label for="jmlAyam">Jumlah Ayam</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="jumlah_telur" id="jmlTelur" placeholder="Jumlah Telur">
                                            <label for="jmlTelur">Jumlah Telur</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="berat_total" id="beratTotal" placeholder="Berat Total (Kg)">
                                            <label for="beratTotal">Berat Total (Kg)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="telur_bagus" id="telurBagus" placeholder="Telur Bagus">
                                            <label for="telurBagus">Telur Bagus</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="telur_rusak" id="telurRusak" placeholder="Telur Rusak">
                                            <label for="telurRusak">Telur Rusak</label>
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
                                            <input type="number" class="form-control" name="pakan_digunakan" id="pakanDigunakan" placeholder="Pakan Digunakan">
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