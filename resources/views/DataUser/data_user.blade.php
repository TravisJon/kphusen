@extends('layout.master')
@section('title', 'Data User')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data User</h4>
                        <div class="ms-auto">
                            <a class="btn btn-dark btn-round ms-2" href="/pdf_user" target="_blank">
                                <i class="fa fa-plus"></i>
                                PDF
                            </a>
                            <button class="btn btn-primary btn-round ms-2" href="{{ url('/add_user') }}"
                                data-bs-toggle="modal" data-bs-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Add Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold"> Add</span>
                                        <span class="fw-light"> Data User </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="'needs-validation" action="{{ url('/store_user') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama</label>
                                                    <input id="addName" type="text" class="form-control"
                                                        placeholder="Masukkan Nama" name="nama" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 pe-0">
                                                <div class="form-group form-group-default">
                                                    <label>Email</label>
                                                    <input id="addPosition" type="text" class="form-control"
                                                        placeholder="Masukkan Email" name="email" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>No.Hp</label>
                                                    <input id="addOffice" type="number" class="form-control"
                                                        placeholder="Masukkan No.Hp" name="no_telepon" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 pe-0">
                                                <div class="form-group form-group-default">
                                                    <label>Alamat</label>
                                                    <input id="addOffice" type="text" class="form-control"
                                                        placeholder="Masukkan Alamat" name="alamat" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Role</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="role_id">
                                                        @foreach ($roles as $r)
                                                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pe-0">
                                                <div class="form-group form-group-default">
                                                    <label>Foto</label>
                                                    <input id="addOffice" type="file" class="form-control"
                                                        name="foto" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Password</label>
                                                    <input id="addOffice" type="password" class="form-control"
                                                        placeholder="Password" name="password" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" id="addRowButton" class="btn btn-primary">
                                                Add
                                            </button>
                                            <a href="{{ url('/data_user') }}" type="submit" class="btn btn-danger">
                                                Close
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No.Hp</th>
                                    <th>Alamat</th>
                                    <th>Role</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No.Hp</th>
                                    <th>Alamat</th>
                                    <th>Role</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($db as $data)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->no_telepon }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->role->nama }}</td>
                                        <td>
                                            @if ($data->foto == null)
                                                <img src="{{ asset('Template/assets/img/iconprofil.png') }}" alt="Picture"
                                                    style="width: 40px;">
                                            @else
                                                <img src="{{ asset('storage/users/' . $data->foto) }}" alt="Picture"
                                                    style="width: 40px;">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ url('/edit_user', ['id' => $data->id]) }}" type="button"
                                                    data-bs-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete_user', $data->id) }}" type="button"
                                                    data-bs-toggle="tooltip" title=""
                                                    class="btn btn-link btn-danger" data-confirm-delete="true">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
