@extends('backend.template')
@section('content')
    @include('backend.pengaturan.index')
    <div class="card-akun-body">
        <div class="card-body pt-3">
            <div class="tab-pane fade show active profile-overview" id="profile-edit" style="width: 76vw;">
                <form action="{{ route('update_profile') }}" id="edit_profile_form" method="post">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="nama_lengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="nama_lengkap"
                                value="{{ old('nama_lengkap') ? old('nama_lengkap') : $user->nama_lengkap }}" type="text"
                                class="form-control" id="nama_lengkap">
                            @if ($errors->any('nama_lengkap'))
                                <span class="text-danger">{{ $errors->first('nama_lengkap') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class=" col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="email" value="{{ old('email') ? old('email') : $user->email }}" type="email"
                                class="form-control" id="email">
                            @if ($errors->any('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_hp" class="col-md-4 col-lg-3 col-form-label">Nomor Telepon</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="no_hp" value="{{ old('no_hp') ? old('no_hp') : $user->no_hp }}" type="text"
                                class="form-control" id="no_hp">
                            @if ($errors->any('no_hp'))
                                <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-orange" style="font-weight: 700">Simpan Profile</button>
                    </div>
                    <div id="loading-overlay" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
