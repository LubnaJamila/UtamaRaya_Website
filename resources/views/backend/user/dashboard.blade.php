@extends('backend.template')
@section('content')
    <style>
        .modal-content {
            border-radius: 8px;
        }

        .modal-title {
            font-weight: 700;
            font-family: var(--font-second);
            color: #8B0000
        }

        .btn-warning {
            background-color: #FFC107;
            color: #000;
        }

        .modal-content label {
            font-weight: 700;
            font-family: var(--font-primary);
            color: #000
        }

        .modal-content select,
        .modal-content textarea,
        .modal-content input {
            border-color: #8B0000
        }
    </style>
    <div class="container dashboard-umkm mt-4">
        <h5 class="card-title mb-2">Dashboard </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Nama Akomodasi</th>
                        <th>Status Booking</th>
                        <th>Tanggal Booking</th>
                        <th>Tanggal Check In</th>
                        <th>Durasi</th>
                        <th>Tanggal Check Out</th>
                        <th>DP</th>
                        <th>Bukti Transaksi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hotel Sunset Deluxe</td>
                        <td><span class="btn-status">Menunggu Validasi</span></td>
                        <td>2011/04/20</td>
                        <td>2021/04/24</td>
                        <td>2 days</td>
                        <td>2021/04/26</td>
                        <td>100.000</td>
                        <td><img src="{{ asset('backend/assets/img/water_page.png') }}" alt="Foto Produk"
                                class="img-thumbnail" style="max-width: 150px">
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger mb-1" style="font-weight: 800" data-bs-toggle="modal"
                                data-bs-target="#cancellationModal">
                                Batalkan
                            </a>
                            <a href="#" style="font-weight: 800" class="btn btn-warning mb-1" data-bs-toggle="modal"
                                data-bs-target="#rescheduleModal">
                                Re-Schedule
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel">Re-Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="checkIn" class="form-label">Check In</label>
                            <input type="date" class="form-control" id="checkIn" required>
                        </div>
                        <div class="mb-3">
                            <label for="checkOut" class="form-label">Check Out</label>
                            <input type="date" class="form-control" id="checkOut" required>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-info" id="searchButton"><i
                                    class="lni lni-search-alt"></i></button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-orange">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cancellationModal" tabindex="-1" aria-labelledby="cancellationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancellationModalLabel">Ajukan Pembatalan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="col-lg-12 col-md-6 mb-3">
                            <label for="cancellationReason" class="form-label">Alasan Pembatalan</label>
                            <textarea class="form-control" id="cancellationReason" rows="3" required></textarea>
                        </div>
                        <div class="col-lg-12 col-md-6 mb-3">
                            <label for="bankAccount" class="form-label">Pilih Rekening</label>
                            <select class="form-select" id="bankAccount" required>
                                <option value="" disabled selected>Pilih Rekening</option>
                                <option value="bank1">BRI</option>
                                <option value="bank2">Mandiri</option>
                                <option value="bank2">BCA</option>
                                <option value="bank2">Bank Lainnya</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label for="accountNumber" class="form-label">Masukkan No Rekening</label>
                                    <input type="text" class="form-control" id="accountNumber" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mb-3">
                                    <label for="accountHolderName" class="form-label">Nama Pemilik Rekening</label>
                                    <input type="text" class="form-control" id="accountHolderName" required>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-orange">Kirim</button>
                </div>
            </div>
        </div>
    </div>
@endsection

