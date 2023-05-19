@extends('layouts.backend')

@section('css')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js')
  <!-- jQuery (required for DataTables plugin) -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

  <!-- Page JS Plugins -->
  <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

  <!-- Page JS Code -->
  @vite(['resources/js/pages/datatables.js'])
@endsection

@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-2">
            Data Kendaraan
          </h1>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="javascript:void(0)">Database</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              Data Kendaraan
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">

    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">
            <a href="#modalAddUnit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddUnit">Tambah Unit Baru</a>
        </h3>
      </div>
      <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full fs-sm">
          <thead>
            <tr>
              <th class="text-center" style="width: 80px;">ID</th>
              <th>Nama</th>
              <th class="d-none d-sm-table-cell" style="width: 30%;">Gambar</th>
              <th>Jenis</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($boats as $boat)
            <tr>
                <td>{{ $boat->id }}</td>
                <td>{{ $boat->nama }}</td>
                <td><img src="{{ $boat->linkgambar }}" alt="{{ $boat->nama }}" width="100"></td>
                <td>{{ $boat->jenis }}</td>
                <td>{{ $boat->harga }}</td>
                <td>
                    <a href="{{ route('boats.edit', ['boat' => $boat->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('boats.destroy', ['boat' => $boat->id]) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                    </form>
                  </td>


            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- END Dynamic Table Full -->
  </div>
  <!-- END Page Content -->

  <!-- Modal Add Unit -->
<div class="modal fade" id="modalAddUnit" tabindex="-1" role="dialog" aria-labelledby="modalAddUnitTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('boats.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddUnitTitle">Tambah Unit Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="linkgambar" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="linkgambar" name="linkgambar" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" required>
                      </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Sewa</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
