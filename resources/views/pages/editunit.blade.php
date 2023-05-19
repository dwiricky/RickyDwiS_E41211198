@extends('layouts.backend')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">Edit Unit</h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{ route('boats.index') }}">DataTables</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Edit Unit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Unit</h3>
            </div>
            <div class="block-content block-content-full">

                <form method="POST" action="{{ route('boats.update', ['boat' => $boat->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $boat->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="linkgambar">Gambar</label>
                        <input type="text" class="form-control" id="linkgambar" name="linkgambar" value="{{ $boat->linkgambar }}" required>
                        <small id="gambarHelp" class="form-text text-muted">Masukkan URL gambar atau path file gambar.</small>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $boat->jenis }}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $boat->harga }}" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Update Unit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
