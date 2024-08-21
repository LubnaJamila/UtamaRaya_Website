<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utama Raya | Langganan</title>
    <link href="{{ asset('frontend/assets/img/UR-logo.png') }}" rel="icon">
    <link href="{{ asset('frontend/assets/img/UR-logo.png') }}" rel="logo">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quicksand:wght@300..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('backend/assets/new.css') }}">
    <style>
        .content-container {
            padding-top: 20px;

        }
    </style>
</head>

<body>
        <form method="POST" action="{{ route('save_berlangganan') }}" enctype="multipart/form-data">
        @csrf
            <div class="col-lg-6 mb-3">
                    <label for="packageName" class="form-label">Harga Paket Langganan</label>
                    <input type="text" class="form-control" id="packageName" value="{{ $langganan->harga_langganan }}" readonly>
                </div>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label for="bankName" class="form-label">Nama Bank</label>
                    <select id="MetodePembayaran" name="id_rek" class="form-input" required>
                    <option value="">Pilih Bank</option>
                    @foreach ($no_rek_list as $id_rek => $details)
                        <option value="{{ $id_rek }}" 
                        data-rek="{{ $details['no_rek'] }}" 
                        data-pemilik="{{ $details['nama_pemilik'] }}">
                        {{ $details['nama_bank'] }}
                        </option>
                    @endforeach
                </select>
                </div>
                <div id="rekeningDetails" style="display: none;" class="mb-3">
                    <p id="rekeningNo"></p>
                    <p id="pemilikNama"></p>
                </div>
            <div class="mb-3">
                <label for="paymentProof" class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" id="paymentProof" name="bukti_tf" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-orange">Kirim</button>
            </div>
        </div>
    </div>
    </form>
    <script>
document.getElementById('MetodePembayaran').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var rek = selectedOption.getAttribute('data-rek');
    var pemilik = selectedOption.getAttribute('data-pemilik');
    var rekeningNo = document.getElementById('rekeningNo');
    var pemilikNama = document.getElementById('pemilikNama');
    var rekeningDetails = document.getElementById('rekeningDetails');
    
    if (rek && pemilik) {
        rekeningNo.textContent = 'No Rekening: ' + rek;
        pemilikNama.textContent = 'Nama Pemilik: ' + pemilik;
        rekeningDetails.style.display = 'block';
    } else {
        rekeningDetails.style.display = 'none';
        rekeningNo.textContent = '';
        pemilikNama.textContent = '';
    }
});
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend/assets/script.js') }}"></script>
</body>

</html>