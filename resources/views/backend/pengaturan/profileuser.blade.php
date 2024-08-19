@extends('backend.template')
@section('content')
    @include('backend.pengaturan.index')
    <div class="card-akun-body">
        <div class="card-body pt-3">
            <div class="tab-content">
                <div class="tab-pane fade show active profile-overview" id="profile-overview" style="width: 76vw;">
                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label" style="font-weight: 700">Nama Lengkap</div>
                        <div class="col-lg-9 col-md-8">: {{ $user->nama_lengkap }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label" style="font-weight: 700">Email</div>
                        <div class="col-lg-9 col-md-8">: {{ $user->email }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label" style="font-weight: 700">Nomor Telepon</div>
                        <div class="col-lg-9 col-md-8">: {{ $user->no_hp }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
