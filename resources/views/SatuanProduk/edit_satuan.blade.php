@extends('layout.master')
@section('title', 'Edit Satuan')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Satuan</div>
                </div>
                @foreach ($data as $db)
                    <form class="need-validation" action="{{ url('/update_satuan', ['id' => $db->id]) }}" method="post"
                        enctype="multypart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $db->id }}"> <br />
                        <div class="card-body">
                            <div class="row">
                                <!-- Kolom Pertama -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama Satuan</label>
                                        <input type="text" class="form-control" id="name"placeholder="Satuan Produk"
                                            name="nama_satuan" value="{{ $db->nama_satuan }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action d-flex justify-content-between">
                            <a href="{{ url('/satuan') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection
