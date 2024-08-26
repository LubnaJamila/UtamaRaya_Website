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
            <a href="{{ route('pembatalan') }}">
                <div class="card card-info text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Pengjuan Pembatalan</h5>
                        <hr>
                        <h1 class="card-content">{{ $jumlahPengajuanPembatalan }}</h1>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 mb-3">
            <a href="{{ route('dibatalkan') }}">
                <div class="card card-warning text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Dibatalkan</h5>
                        <hr>
                        <h1 class="card-content">{{ $jumlahDibatalkan }}</h1>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>
<div class="card-body">
    <h5 class="card-title mb-2">Data Pengajuan Pembatalan</h5>
    <div class="table-responsive">
        <table id="example" class="table table-striped" width="100%">
            <thead>
                <tr class="text-center">
                    <th>Nama </th>
                    <th>Nama Kamar</th>
                    <th>No Kamar</th>
                    <th>Tanggal Checkin</th>
                    <th>Tanggal Checkout</th>
                    <th>Bukti Transfer DP</th>
                    <th>Data Rekening Pengembalian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->User->nama_lengkap }}</td>
                    <td class="text-center"><span
                            class="btn-status">{{ $booking->Nokamar->Penginapan->nama_kamar }}</span></td>
                    <td class="text-center"><span class="btn-status">{{ $booking->Nokamar->no_kamar }}</span></td>
                    <td>{{ $booking->tanggal_checkin }}</td>
                    <td>{{ $booking->tanggal_checkout }}</td>
                    <td><a href="{{ asset($booking->bukti_tf) }}" target="_blank">
                            <img src="{{ asset($booking->bukti_tf) }}" alt="Bukti Transfer" class="img-thumbnail"
                                style="max-width: 150px">
                        </a>
                    </td>
                    <td>{{ $booking->nama_bank_tamu }} - {{ $booking->no_rek_tamu }} -
                        {{ $booking->nama_pemilik_tamu }}
                    </td>
                    <td>
                        <a href="#" class="btn btn-info mb-1" style="font-weight: 800" data-bs-toggle="modal"
                            data-bs-target="#validasiModal" data-id="{{ $booking->id_booking }}">
                            Validasi
                        </a>
                        <a href="https://wa.me/62{{ $booking->User->no_hp }}" target="_blank"
                            class="btn btn-warning mb-1" style="font-weight: 800">
                            Hub. Wa
                        </a>
                    </td>
                </tr>
                @endforeach
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
                        <form id="uploadForm" action="{{ route('pembatalan.upload') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id_booking" id="recordId">
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    var uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));

    document.querySelectorAll('.btn-info').forEach(function(button) {
        button.addEventListener('click', function() {
            var bookingId = this.getAttribute('data-id');
            document.getElementById('recordId').value = bookingId;
            uploadModal.show();
        });
    });
});
</script>