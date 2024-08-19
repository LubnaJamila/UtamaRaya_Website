@extends('backend.template')
@section('content')
    <div class="container dashboard-validasi mt-4">
        <h5 class="card-title mb-2">Data Rekening</h5>
        <a type="button" class="btn btn-info" href="{{ route('rekening.create') }}">
            <i class="fas fa-plus"></i> Tambah Rekening
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" width="100%">
                <thead>
                    <tr class="text-center">
                        <th>Nama Pemilik</th>
                        <th>Nama Bank</th>
                        <th>No Rekening</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rohayati</td>
                        <td>BRI</td>
                        <td>143009846728</td>
                        <td>
                            <a href="{{ route('rekening.edit') }}" class="btn btn-warning mb-1" >
                                <i class="fas fa-edit ml-2"></i>
                            </a>
                            <a style="font-weight: 800" class="btn btn-danger mb-1">
                                <i class="fas fa-trash ml-2"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
