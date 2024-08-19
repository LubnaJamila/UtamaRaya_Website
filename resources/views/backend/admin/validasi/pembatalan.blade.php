@extends('backend.template')
@section('content')
    <style>
        .card-info {
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            background: #1E90FF;
            border-radius: 10px;
            border: none;
            color: white;
            font-weight: 700
        }

        .card-warning {
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            background: #8B0000;
            border-radius: 10px;
            border: none;
            color: white;
            font-weight: 700
        }

        .card-body {
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
    <div class="container dashboard-validasi mt-4">
        <h5 class="card-title mb-2">Data Pembatalan</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card card-info text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Menunggu Pengaktifan</h5>
                        <hr>
                        <h1 class="card-content">50</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card card-warning text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Jumlah Dibatalkan</h5>
                        <hr>
                        <h1 class="card-content">50</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr class="text-center">
                        <th>Nama </th>
                        <th>Status Pembatalan</th>
                        <th>Total Pengembalian</th>
                        <th>Data Rekening</th>
                        <th>Bukti Pengembalian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rohayati</td>
                        <td class="text-center"><span class= "btn-pembatalan">Diproses </span></td>
                        <td>300.000</td>
                        <td>Mandiri<br>1430009875647<br>Yurika</td>
                        <td><img src="{{ asset('backend/assets/img/water_page.png') }}" alt="Foto Produk"
                                class="img-thumbnail" style="max-width: 150px">
                        </td>
                        <td>
                            <button type="button" class="btn btn-info mb-1" style="font-weight: 800" data-bs-toggle="modal"
                                data-bs-target="#uploadModal">
                                Validasi
                            </button>
                            <a style="font-weight: 800" class="btn btn-warning mb-1">
                                Hub. Wa
                            </a>
                        </td>

                    </tr>
                </tbody>
            </table>

            <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadModalLabel">Upload Bukti Pengembalian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="uploadForm" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="recordId">
                                <div class="mb-3">
                                    <label for="proofImage" class="form-label">Pilih Bukti Pengembalian</label>
                                    <input type="file" class="form-control" id="proofImage" name="proof_image" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
<script></script>
