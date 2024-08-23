@extends('backend.template')

@section('content')
<div class="container mt-4">
    <h5 class="card-title mb-2">Upload Bukti Pengembalian</h5>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pembatalan.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id_booking" value="{{ $booking->id_booking }}">

                <div class="mb-3">
                    <label for="proof_image" class="form-label">Pilih Bukti Pengembalian</label>
                    <input type="file" class="form-control" id="proof_image" name="proof_image" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Upload dan Validasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection