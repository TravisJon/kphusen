@extends('layout.master')
@section('title', 'Data Produk')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Produk</h4>
                        <div class="ms-auto">
                            <a class="btn btn-dark btn-round ms-2" href="/pdf_produk" target="_blank">
                                <i class="fa fa-plus"></i>
                                PDF
                            </a>
                            <button class="btn btn-primary btn-round ms-2" href="{{ url('/add_produk') }}"
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
                                        <span class="fw-light"> Data Produk </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="'needs-validation" action="{{ url('/store_produk') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kode Produk</label>
                                                    <input type="text" class="form-control" name="kode_produk"
                                                        value="{{ $newCode }}" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-6 pe-0">
                                                <div class="form-group form-group-default">
                                                    <label>Kategori</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="kategori_id">
                                                        <option value="" disabled selected>Pilih Kategori</option>
                                                        @foreach ($kategori as $k)
                                                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Produk</label>
                                                    <input id="addOffice" type="text" class="form-control"
                                                        placeholder="Masukkan Nama Produk" name="nama_produk" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 pe-0">
                                                <div class="form-group form-group-default">
                                                    <label>Stok</label>
                                                    <input id="addOffice" type="number" class="form-control"
                                                        placeholder="Masukkan Stok" name="stok" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Harga Beli</label>
                                                    <input id="addOffice" type="number" class="form-control"
                                                        placeholder="Masukkan Harga Beli" name="harga_beli" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 pe-0">
                                                <div class="form-group form-group-default">
                                                    <label>Harga Jual</label>
                                                    <input id="addOffice" type="number" class="form-control"
                                                        placeholder="Masukkan Harga Jual" name="harga_jual" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Satuan</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="satuan_id">
                                                        <option value="" disabled selected>Pilih Satuan</option>
                                                        @foreach ($satuan as $s)
                                                            <option value="{{ $s->id }}">{{ $s->nama_satuan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" id="addRowButton" class="btn btn-primary">
                                                Add
                                            </button>
                                            <a href="{{ url('/produk') }}" type="submit" class="btn btn-danger">
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
                                    <th>Kode Produk</th>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Satuan</th>
                                    <th>Hari/Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Produk</th>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Satuan</th>
                                    <th>Hari/Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($db as $data)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode_produk }}</td>
                                        <td>{{ $data->kategori->nama_kategori }}</td>
                                        <td>{{ $data->nama_produk }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>Rp.{{ number_format($data->harga_beli) }}</td>
                                        <td>Rp.{{ number_format($data->harga_jual) }}</td>
                                        <td>{{ $data->satuan->nama_satuan }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ url('/edit_produk', ['id' => $data->id]) }}" type="button"
                                                    data-bs-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete_produk', $data->id) }}" type="button"
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
