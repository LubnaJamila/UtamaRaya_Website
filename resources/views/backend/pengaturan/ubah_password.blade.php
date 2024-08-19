@extends('backend.template')
@section('content')
    @include('backend.pengaturan.index')
    <div class="card-akun-body">
        <div class="card-body pt-3">
            <div class="tab-pane fade show active profile-overview" id="profile-change-password" style="width: 76vw;">
                <form action="{{ route('update_password') }}" method="post">
                    @if ($message = Session::get('succsess'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($error = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $error }}</p>
                        </div>
                    @endif
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="old_password" type="password" class="form-control" id="old_password">
                            @if ($errors->any('old_password'))
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="new_password" type="password" class="form-control" id="new_password">
                            @if ($errors->any('new_password'))
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="confirm_password" type="password" class="form-control" id="confirm_password">
                            @if ($errors->any('confirm_password'))
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-orange" style="font-weight: 700">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
