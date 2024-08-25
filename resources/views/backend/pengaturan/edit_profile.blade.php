@extends('backend.template')
@section('content')
    @include('backend.pengaturan.index')
    <div class="card-akun-body">
        <div class="card-body pt-3">
            <div class="tab-pane fade show active profile-overview" id="profile-edit" style="width: 76vw;">
                <form action="{{ route('update_profile_umkm') }}" id="edit_profile_form" method="post">
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
                                value="{{ old('nama_lengkap') ? old('nama_lengkap') : $user->nama_lengkap }}"
                                type="text" class="form-control" id="nama_lengkap">
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
                    <div class="row mb-3">
                        <label for="nama_usaha" class="col-md-4 col-lg-3 col-form-label">Nama Usaha UMKM</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="nama_usaha"
                                value="{{ old('nama_usaha') ? old('nama_usaha') : $user->nama_usaha }}" type="text"
                                class="form-control" id="nama_usaha">
                            @if ($errors->any('nama_usaha'))
                                <span class="text-danger">{{ $errors->first('nama_usaha') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="jenis_kelamin"
                                value="{{ old('jenis_kelamin') ? old('jenis_kelamin') : $user->jenis_kelamin }}"
                                type="text" class="form-control" id="jenis_kelamin">
                            @if ($errors->any('jenis_kelamin'))
                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi_umkm" class="col-md-4 col-lg-3 col-form-label">Deskripsi Usaha</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="deskripsi_umkm"
                                value="{{ old('deskripsi_umkm') ? old('deskripsi_umkm') : $user->deskripsi_umkm }}"
                                type="text" class="form-control" id="deskripsi_umkm">
                            @if ($errors->any('deskripsi_umkm'))
                                <span class="text-danger">{{ $errors->first('deskripsi_umkm') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat UMKM</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="alamat" value="{{ old('alamat') ? old('alamat') : $user->alamat }}"
                                type="text" class="form-control" id="deskripsi_usaha">
                            @if ($errors->any('alamat'))
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
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
