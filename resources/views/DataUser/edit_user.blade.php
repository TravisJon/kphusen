@extends('layout.master')
@section('title', 'Edit Data User')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data User</div>
                </div>
                @foreach ($data as $db)
                    <form class="need-validation" action="{{ url('/update_user', ['id' => $db->id]) }}" method="post"
                        enctype="multypart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $db->id }}"> <br />
                        <div class="card-body">
                            <div class="row">
                                <!-- Kolom Pertama -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Masukkan Nama" name="nama" value="{{ $db->nama }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Masukkan Email" name="email" value="{{ $db->email }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">No. Hp</label>
                                        <input type="number" class="form-control" id="email"
                                            placeholder="Masukkan No.Hp" name="no_telepon" value="{{ $db->no_telepon }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Alamat</label>
                                        <input type="text" class="form-control" id="email"
                                            placeholder="Masukkan Alamat" name="alamat" value="{{ $db->alamat }}">
                                    </div>
                                </div>

                                <!-- Kolom Kedua -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleSelect">Role</label>
                                        <select class="form-select" id="exampleSelect" name="role_id" value="">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $role->id == $db->role_id ? 'selected' : '' }}>
                                                    {{ $role->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fileInput">Foto</label>
                                        <input type="file" class="form-control" id="fileInput" name="foto">
                                        @if ($db->foto)
                                            <img src="{{ asset('storage/users/' . $db->foto) }}" alt="Current Picture"
                                                style="width: 150px; height: auto; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password"
                                            name="password">
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah
                                            password</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action d-flex justify-content-between">
                            <a href="{{ url('/data_user') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection
