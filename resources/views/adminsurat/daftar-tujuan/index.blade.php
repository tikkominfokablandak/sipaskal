@extends('layouts.app')

@section('title')
    | Daftar Tujuan
@endsection

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar Tujuan - Daftar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Daftar Tujuan</li>
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
            <div class="card-header">
              <div class="col-2">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-user-plus"></i> Tambah Baru
                  </button>
                  <div class="dropdown-menu">
                    <button type="button" class="btn dropdown-item" data-toggle="modal" data-target="#modal-tambah-internal">Internal</button>
                    <button type="button" class="btn dropdown-item" data-toggle="modal" data-target="#modal-tambah-eksternal">Eksternal</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <div id="accordion">
                <div class="card card-default">
                  <div class="card-header">
                    <h4 class="card-title w-100">
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        Tujuan Internal
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Kepada</th>
                          <th width="8"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($internal as $item)
                        <tr>
                          <td>{{ $item->nama }} - {{ $item->nama_jabatan }} - {{ $item->nama_unitkerja }} - {{ $item->nama_opd }}</td>
                          <td>
                            <button type="button" class="btn btn-sm btn-danger">
                              <i class="far fa-trash-alt"></i>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card card-default">
                  <div class="card-header">
                    <h4 class="card-title w-100">
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        Tujuan Eksternal
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <table id="eksternal" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Instansi</th>
                          <th>Alamat</th>
                          <th>Kota / Kabupaten</th>
                          <th width="50"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($eksternal as $item)
                        <tr>
                          <td>{{ $item->nama_tujuan }}</td>
                          <td>{{ $item->jabatan_tujuan }}</td>
                          <td>{{ $item->instansi_tujuan }}</td>
                          <td>{{ $item->alamat }}</td>
                          <td>{{ $item->kotakab }}</td>
                          <td>
                            <button type="button" class="btn btn-sm btn-info">
                              <i class="far fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger">
                              <i class="far fa-trash-alt"></i>
                            </button>
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->

    <div class="modal fade" id="modal-tambah-internal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="fas fa-plus" style="color:rgb(0, 86, 167)"></i> Form Tujuan Internal Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('internal.store') }}" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            <div class="form-group">
              <label>OPD</label>

              <select id="select_opd" name="id_opd" data-placeholder="Pilih OPD" class="form-control" style="width: 100%;" required oninvalid="this.setCustomValidity('Mohon pilih OPD dahulu!')" oninput="setCustomValidity('')">
              </select>
            </div>

            <div class="form-group">
                <label>Unit Kerja</label>

                <select id="select_unitkerja" name="id_unitkerja" data-placeholder="Pilih Unit Kerja" class="form-control" style="width: 100%;" required oninvalid="this.setCustomValidity('Mohon pilih Unit Kerja dahulu!')" oninput="setCustomValidity('')">
                </select>
            </div>

            <div class="form-group">
                <label>Pengguna
                  <small style="color:red"><b>*</b></small>
                </label>

                <select id="select_user" class="form-control" style="width: 100%;" name="id_internal" data-placeholder="Pilih Pengguna" required oninvalid="this.setCustomValidity('Mohon pilih Pengguna dahulu!')" oninput="setCustomValidity('')">
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-tambah-eksternal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="fas fa-plus" style="color:rgb(0, 86, 167)"></i> Form Tujuan Eksternal Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('eksternal.store') }}" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            <div class="form-group">
              <label>Nama
                <small style="color:red"><b>*</b></small>
              </label>

              <input type="text" class="form-control form-control-sm" placeholder="Masukan Nama Tujuan ..." name="nama_tujuan" value="{{ old('nama_tujuan') }}" required autocomplete="nama_tujuan" autofocus oninvalid="this.setCustomValidity('Mohon isi nama tujuan terlebih dahulu!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
              <label>Jabatan
                <small style="color:red"><b>*</b></small>
              </label>

              <input type="text" class="form-control form-control-sm" placeholder="Masukan Jabatan Tujuan ..." name="jabatan_tujuan" value="{{ old('jabatan_tujuan') }}" required autocomplete="jabatan_tujuan" autofocus oninvalid="this.setCustomValidity('Mohon isi jabatan tujuan terlebih dahulu!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
              <label>Instansi
                <small style="color:red"><b>*</b></small>
              </label>

              <input type="text" class="form-control form-control-sm" placeholder="Masukan Instansi Tujuan ..." name="instansi_tujuan" value="{{ old('instansi_tujuan') }}" required autocomplete="instansi_tujuan" autofocus oninvalid="this.setCustomValidity('Mohon isi instansi tujuan terlebih dahulu!')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group">
              <label>Alamat
                <small style="color:red"><b>*</b></small>
              </label>

              <textarea class="form-control" name="alamat" id="" cols="20" rows="5"></textarea>
            </div>

            <div class="form-group">
              <label>Kota / Kabupaten
                <small style="color:red"><b>*</b></small>
              </label>

              <input type="text" class="form-control form-control-sm" placeholder="Masukan Kota / Kabupaten Tujuan ..." name="kotakab" value="{{ old('kotakab') }}" required autocomplete="kotakab" autofocus oninvalid="this.setCustomValidity('Mohon isi kota / kabupaten tujuan terlebih dahulu!')" oninput="setCustomValidity('')">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </section>
@endsection

@push('javascript-internal')
<script>
$(document).ready(function() {

    //  select opd:start
    $('#select_opd').select2({
        theme: 'bootstrap4',
        allowClear: true,
        ajax: {
            url: "{{ route('get-opd.select') }}",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                    return {
                        text: item.nama_opd,
                        id: item.id
                    }
                    })
                };
            }
        }
    });
    //  select opd:end

    //  Event on change select opd:start
    $('#select_opd').change(function() {
        //clear select
        $('#select_unitkerja').empty();
        $("#select_user").empty();
        //set id
        let opdID = $(this).val();
        if (opdID) {
            $('#select_unitkerja').select2({
                theme: 'bootstrap4',
                allowClear: true,
                ajax: {
                    url: "{{ route('get-unitkerja.select') }}?opdID=" + opdID,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama_unitkerja,
                                id: item.id
                            }
                        })
                    };
                    }
                }
            });
        } else {
            $('#select_unitkerja').empty();
            $("#select_user").empty();
        }
    });
    //  Event on change select opd:end

    //  Event on change select unit kerja:start
    $('#select_unitkerja').change(function() {
        //clear select
        $("#select_user").empty();
        //set id
        let unitkerjaID = $(this).val();
        if (unitkerjaID) {
            $('#select_user').select2({
                theme: 'bootstrap4',
                allowClear: true,
                ajax: {
                    url: "{{ route('get-user.select') }}?unitkerjaID=" + unitkerjaID,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
                                id: item.id
                            }
                        })
                    };
                    }
                }
            });
        } else {
            $("#select_user").empty();
        }
    });
    //  Event on change select unitkerja:end

    // EVENT ON CLEAR
    $('#select_opd').on('select2:clear', function(e) {
    $("#select_unitkerja").select2(
            {theme: 'bootstrap4',}
        );
        $("#select_user").select2(
            {theme: 'bootstrap4',}
        );
    });

    $('#select_unitkerja').on('select2:clear', function(e) {
    $("#select_user").select2(
        {theme: 'bootstrap4',}
        );
    });
});
</script>
@endpush

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
    $("#eksternal").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
$(function () {
    $('#id_user').select2({
        placeholder: "Pilih Verifikator",
        theme: 'bootstrap4'
    });
});
</script>
@endsection