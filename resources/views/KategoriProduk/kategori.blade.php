@extends('layout.master')
@section('title', 'Kategori Produk')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Kategori Produk</h4>
                        <div class="ms-auto">
                            <a class="btn btn-dark btn-round ms-2" href="/pdf_kategori" target="_blank">
                                <i class="fa fa-plus"></i>
                                PDF
                            </a>
                            <button class="btn btn-primary btn-round ms-2" href="{{ url('/add_kategori') }}"
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
                                        <span class="fw-light"> Kategori Produk </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="'needs-validation" action="{{ url('/store_kategori') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Produk</label>
                                                    <input id="addName" type="text" class="form-control"
                                                        placeholder="Kategori Produk" name="nama_kategori" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" id="addRowButton" class="btn btn-primary">
                                                Add
                                            </button>
                                            <a href="{{ url('/kategori') }}" type="submit" class="btn btn-danger">
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
                                    <th>Nama Produk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($db as $data)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_kategori }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ url('/edit_kategori', ['id' => $data->id]) }}" type="button"
                                                    data-bs-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete_kategori', $data->id) }}" type="button"
                                                    data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                    data-confirm-delete="true">
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
