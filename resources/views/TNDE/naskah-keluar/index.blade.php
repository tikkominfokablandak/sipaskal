@extends('layouts.app')

@section('title')
    | Daftar Surat Keluar
@endsection

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Surat Keluar - Daftar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Daftar Surat Keluar</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Surat</th>
                  <th>Nomor Surat</th>
                  <th>Hal</th>
                  <th>Asal Surat</th>
                  <th>Tingkat Urgensi</th>
                  <th>Status Verifikator</th>
                  <th>Status Penandatangan</th>
                  <th>Status Kirim</th>
                  <th width="10">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($naskahkeluar as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->no_surat }}</td>
                  <td>{{ $item->perihal }}</td>
                  <td>{{ $item->nama }} - {{ $item->nama_unitkerja }}</td>
                  <td>{{ $item->tingkat_urgen }}</td>
                  <td align="center"><span class="badge bg-warning">BELUM</span></td>
                  <td align="center"><span class="badge bg-warning">BELUM</span></td>
                  <td align="center"><span class="badge bg-warning">BELUM</span></td>
                  <td align="center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary btn-block dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="{{ url('naskah-keluar/'.$item->id) }}" style="color:blue">
                            <i class="fa fa-info-circle"></i>
                              Detail
                          </a>
                          <a class="dropdown-item" href="{{ url('naskah-keluar/'.$item->id.'/edit') }}" style="color:#ffc107" hover>
                            <i class="fa fa-edit"></i>
                              Edit
                          </a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection