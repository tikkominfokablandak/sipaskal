@extends('layouts.app')

@section('title')
    | Tambah Pengguna
@endsection

@section('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengguna</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/users') }}">Pengguna</a></li>
            <li class="breadcrumb-item active">Tambah Pengguna</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus"></i> Form Pengguna Baru</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nip">{{ __('Nomor Induk Pegawai') }}</label>

                                <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" placeholder="Masukan Nomor Induk Pegawai ..." required autocomplete="nip" autofocus oninvalid="this.setCustomValidity('Mohon isi NIP terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nik">{{ __('Nomor Induk Kependudukan') }}</label>

                                <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" placeholder="Masukan Nomor Induk Kependudukan ..." name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus oninvalid="this.setCustomValidity('Mohon isi NIK terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap">{{ __('Nama Lengkap') }}</label>

                                <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Masukan Nama Lengkap ..." name="nama" value="{{ old('nama') }}" required autocomplete="nama_lengkap" autofocus oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('nama_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_hp">{{ __('Nomor Seluler / WhatsApp') }}</label>

                                <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukan Nomor WhatsApp ..." name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus oninvalid="this.setCustomValidity('Mohon isi Nomor Seluler terlebih dahulu!')" oninput="setCustomValidity('')">
                                <small>Disarankan nomor yang digunakan <b><i>WhatsApp</i></b></small>

                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="username">{{ __('Nama Pengguna') }}</label>

                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Nama Pengguna ..." name="username" value="{{ old('username') }}" required autocomplete="username" autofocus oninvalid="this.setCustomValidity('Mohon isi Nama Pengguna terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>

                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email ..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus oninvalid="this.setCustomValidity('Mohon isi Email terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Kata Sandi') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter ..." name="password" required autocomplete="new-password" oninvalid="this.setCustomValidity('Mohon isi Password terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Konfirmasi Kata Sandi') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ketik ulang kata sandi ..." required autocomplete="new-password" oninvalid="this.setCustomValidity('Mohon ketik ulang sandi dahulu!')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Hak Akses</label>

                                <select id="hak_akses" class="form-control @error('hak_akses') is-invalid @enderror" style="width: 100%;" name="id_role" required oninvalid="this.setCustomValidity('Mohon pilih Hak Akses dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    @foreach ($role as $item)
                                    <option value="{{ $item->id }}">{{$item->nama_role}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>OPD</label>

                                <select id="select_opd" name="id_opd" data-placeholder="Pilih OPD" class="form-control @error('select_opd') is-invalid @enderror" style="width: 100%;" required oninvalid="this.setCustomValidity('Mohon pilih OPD dahulu!')" oninput="setCustomValidity('')">
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Unit Kerja</label>

                                <select id="select_unitkerja" name="id_unitkerja" data-placeholder="Pilih Unit Kerja" class="form-control @error('select_unitkerja') is-invalid @enderror" style="width: 100%;" required oninvalid="this.setCustomValidity('Mohon pilih Unit Kerja dahulu!')" oninput="setCustomValidity('')">
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>

                                <select id="select_jabatan" class="form-control @error('select_jabatan') is-invalid @enderror" style="width: 100%;" name="id_jabatan" data-placeholder="Pilih Jabatan" required oninvalid="this.setCustomValidity('Mohon pilih Jabatan dahulu!')" oninput="setCustomValidity('')">
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Grup Jabatan</label>

                                <select id="grup_jabatan" class="form-control @error('grup_jabatan') is-invalid @enderror" style="width: 100%;" name="pangkat" required oninvalid="this.setCustomValidity('Mohon pilih Grup Jabatan dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    <option value="Menteri">Menteri</option>
                                    <option value="Kepala LPNK">Kepala LPNK</option>
                                    <option value="Eselon I">Eselon I</option>
                                    <option value="Eselon II">Eselon II</option>
                                    <option value="Eselon III / Koordinator">Eselon III / Koordinator</option>
                                    <option value="Eselon IV / Sub-Koordinator">Eselon IV / Sub-Koordinator</option>
                                    <option value="Fungsional Tertentu">Fungsional Tertentu</option>
                                    <option value="Fungsional Umum">Fungsional Umum</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Pimpinan Daerah">Pimpinan Daerah</option>
                                    <option value="Panglima">Panglima</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jenis Pengguna</label>

                                <select id="jenis_user" class="form-control @error('jenis_user') is-invalid @enderror" style="width: 100%;" name="jenis_user" required oninvalid="this.setCustomValidity('Mohon pilih Jenis Pengguna dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    <option value="PNS">PNS</option>
                                    <option value="PPPK">PPPK</option>
                                    <option value="Pekerja Harian Lepas">Pekerja Harian Lepas</option>
                                    <option value="PPNPN">PPNPN</option>
                                    <option value="Tenaga Harian Lepas">Tenaga Harian Lepas</option>
                                    <option value="PTT (Pekerja Tidak Tetap)">PTT (Pekerja Tidak Tetap)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="customFile" name="foto">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <small style="color:red">
                                        *Format lampiran yang diperbolehkan *.JPG, *.PNG
                                    <br/>*Ukuran maksimal file 2 MB
                                    </small>
                                </div>

                                @error('customFile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="col-md-12 mb-2">
                                <img id="preview-image" src="https://identix.state.gov/qotw/images/no-photo.gif" alt="preview foto" style="max-height: 150px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ URL::to('/users') }}">
                        <button type="button" class="btn btn-default">
                            <i class="fas fa-arrow-circle-left"></i> Kembali
                        </button>
                    </a>
                  <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
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
        $("#select_jabatan").empty();
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
            $("#select_jabatan").empty();
        }
    });
    //  Event on change select opd:end

    //  Event on change select unit kerja:start
    $('#select_unitkerja').change(function() {
        //clear select
        $("#select_jabatan").empty();
        //set id
        let unitkerjaID = $(this).val();
        if (unitkerjaID) {
            $('#select_jabatan').select2({
                theme: 'bootstrap4',
                allowClear: true,
                ajax: {
                    url: "{{ route('get-jabatan.select') }}?unitkerjaID=" + unitkerjaID,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama_jabatan,
                                id: item.id
                            }
                        })
                    };
                    }
                }
            });
        } else {
            $("#select_jabatan").empty();
        }
    });
    //  Event on change select unitkerja:end

    // EVENT ON CLEAR
    $('#select_opd').on('select2:clear', function(e) {
    $("#select_unitkerja").select2(
            {theme: 'bootstrap4',}
        );
        $("#select_jabatan").select2(
            {theme: 'bootstrap4',}
        );
    });

    $('#select_unitkerja').on('select2:clear', function(e) {
    $("#select_jabatan").select2(
        {theme: 'bootstrap4',}
        );
    });
});
</script>
@endpush

@section('script')
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
$(function () {
    $('#grup_jabatan').select2({
        placeholder: "Pilih Grup Jabatan",
        theme: 'bootstrap4'
    });

    $('#hak_akses').select2({
        placeholder: "Pilih Hak Akses",
        theme: 'bootstrap4'
    });

    $('#jenis_user').select2({
        placeholder: "Pilih Jenis Pengguna",
        theme: 'bootstrap4'
    });

    bsCustomFileInput.init();
});

var has_errors = {{ $errors->count() > 0 ? 'true' : 'false' }};

if ( has_errors ){
    Swal.fire({
        title: 'Gagal menyimpan data!',
        icon: 'error',
        html: jQuery("#ERROR_COPY").html(),
        showCloseButton: true,
        timer: 5000,
        timerProgressBar: true,
    })
}
</script>
<!-- bs-custom-file-input -->
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script type="text/javascript">
    $('#customFile').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });
</script>
@endsection