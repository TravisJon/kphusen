@extends('layout.master')
@section('title', 'Edit Produk')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Produk</div>
                </div>
                @foreach ($data as $db)
                    <form class="need-validation" action="{{ url('/update_produk', ['id' => $db->id]) }}" method="post"
                        enctype="multypart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $db->id }}"> <br />
                        <div class="card-body">
                            <div class="row">
                                <!-- Kolom Pertama -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Kode Produk</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Kode"
                                            name="kode_produk" value="{{ $db->kode_produk }}" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect">Kategori</label>
                                        <select class="form-select" id="exampleSelect" name="kategori_id" value="">
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->id }}"
                                                    {{ $k->id == $db->kategori_id ? 'selected' : '' }}>
                                                    {{ $k->nama_kategori }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input id="addOffice" type="text" class="form-control"
                                            placeholder="Masukkan Nama Produk" name="nama_produk"
                                            value="{{ $db->nama_produk }}" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input id="addOffice" type="number" class="form-control"
                                            placeholder="Masukkan Stok" name="stok" value="{{ $db->stok }}"
                                            required />
                                    </div>
                                </div>

                                <!-- Kolom Kedua -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Harga Beli</label>
                                        <input id="addOffice" type="number" class="form-control"
                                            placeholder="Masukkan Harga Beli" name="harga_beli"
                                            value="{{ $db->harga_beli }}" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Jual</label>
                                        <input id="addOffice" type="number" class="form-control"
                                            placeholder="Masukkan Harga Jual" name="harga_jual"
                                            value="{{ $db->harga_jual }}" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect">Satuan</label>
                                        <select class="form-select" id="exampleSelect" name="satuan_id">
                                            <option value="" disabled selected>Pilih Satuan</option>
                                            @foreach ($satuan as $s)
                                                <option value="{{ $s->id }}"
                                                    {{ $s->id == $db->satuan_id ? 'selected' : '' }}>
                                                    {{ $s->nama_satuan }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action d-flex justify-content-between">
                            <a href="{{ url('/produk') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection
