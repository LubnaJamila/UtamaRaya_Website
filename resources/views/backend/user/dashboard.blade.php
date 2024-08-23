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
                    <th>Tanggal Check In</th>
                    <th>Tanggal Check Out</th>
                    <th>Total Harga</th>
                    <th>Nomor Kamar</th>
                    <th>Tipe Kamar</th>
                    <th>Rekening Pembayaran</th>
                    <th>Status Booking</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->tanggal_checkin }}</td>
                    <td>{{ $booking->tanggal_checkout }}</td>
                    <td>Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $booking->NoKamar->no_kamar }}</td>
                    <td>{{ $booking->NoKamar->Penginapan->nama_kamar }}</td>
                    <td>{{ $booking->rekPembayaran->nama_bank }} - {{ $booking->rekPembayaran->no_rek }}</td>
                    <td>{{ $booking->status_booking }}</td>
                    <td>
                        <a href="{{ route('reschedule.form', $booking->id_booking) }}"
                            class="btn btn-warning btn-sm">Re-schedule</a>
                        <a href="{{ route('booking.cancel', $booking->id_booking) }}"
                            class="btn btn-danger btn-sm">Pembatalan</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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