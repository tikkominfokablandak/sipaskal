@extends('layouts.app')

@section('title')
    | Buat Surat Baru
@endsection

@section('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Registrasi Surat Masuk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/surat-masuk') }}">Surat Masuk</a></li>
            <li class="breadcrumb-item active">Registrasi Surat Masuk</li>
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
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">IDENTITAS PENGIRIM SURAT</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Pengirim</label>

                                <select id="pengirim" class="form-control form-control-sm @error('hak_akses') is-invalid @enderror" style="width: 100%;" name="pengirim" required oninvalid="this.setCustomValidity('Mohon pilih pengirim dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="username">{{ __('Nama Pengirim') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <input id="nama_pengirim" type="text" class="form-control form-control-sm @error('nama_pengirim') is-invalid @enderror" placeholder="Masukan Nama Pengirim ..." name="nama_pengirim" value="{{ old('nama_pengirim') }}" required autocomplete="username" autofocus oninvalid="this.setCustomValidity('Mohon isi Nama Pengirim terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('nama_pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="username">{{ __('Jabatan Pengirim') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <input id="username" type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Masukan Nama Pengguna ..." name="username" value="{{ old('username') }}" required autocomplete="username" autofocus oninvalid="this.setCustomValidity('Mohon isi Nama Pengguna terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="username">{{ __('Instansi Pengirim') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <input id="username" type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Masukan Nama Pengguna ..." name="username" value="{{ old('username') }}" required autocomplete="username" autofocus oninvalid="this.setCustomValidity('Mohon isi Nama Pengguna terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            
                <div class="card-header">
                    <h3 class="card-title">DETAIL ISI SURAT</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username">{{ __('Jenis Surat') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="pengirim" class="form-control form-control-sm @error('hak_akses') is-invalid @enderror" style="width: 100%;" name="pengirim" required oninvalid="this.setCustomValidity('Mohon pilih pengirim dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="username">{{ __('Sifat Surat') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="pengirim" class="form-control form-control-sm @error('hak_akses') is-invalid @enderror" style="width: 100%;" name="pengirim" required oninvalid="this.setCustomValidity('Mohon pilih pengirim dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="username">{{ __('Tingkat Urgensi') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="pengirim" class="form-control form-control-sm @error('hak_akses') is-invalid @enderror" style="width: 100%;" name="pengirim" required oninvalid="this.setCustomValidity('Mohon pilih pengirim dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="username">{{ __('Nomor Surat') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <input id="nama_pengirim" type="text" class="form-control form-control-sm @error('nama_pengirim') is-invalid @enderror" placeholder="Masukan Nama Pengirim ..." name="nama_pengirim" value="{{ old('nama_pengirim') }}" required autocomplete="username" autofocus oninvalid="this.setCustomValidity('Mohon isi Nama Pengirim terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('nama_pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="username">{{ __('Tanggal Surat') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control form-control-sm datetimepicker-input" data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>

                                @error('nama_pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="username">{{ __('Tanggal Diterima') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <input id="nama_pengirim" type="text" class="form-control form-control-sm @error('nama_pengirim') is-invalid @enderror" placeholder="Masukan Nama Pengirim ..." name="nama_pengirim" value="{{ old('nama_pengirim') }}" required autocomplete="username" autofocus oninvalid="this.setCustomValidity('Mohon isi Nama Pengirim terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('nama_pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{ __('Hal') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <textarea name="hal" rows="3" class="form-control" id="hal" placeholder="Masukkan hal..."></textarea>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Isi Ringkas') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <textarea name="hal" rows="8" class="form-control" id="hal" placeholder="Masukkan hal..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">File Surat
                                    <small style="color:red"><b>*</b></small>
                                </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="customFile" name="foto">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <small style="color:red">
                                        Format yang didukung: .PDF
                                    </small>
                                </div>

                                @error('customFile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <h3 class="card-title">TUJUAN</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Grup Tujuan</label>

                                <select id="pengirim" class="form-control form-control-sm @error('hak_akses') is-invalid @enderror" style="width: 100%;" name="pengirim" required oninvalid="this.setCustomValidity('Mohon pilih pengirim dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Utama
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="pengirim" class="form-control form-control-sm @error('hak_akses') is-invalid @enderror" style="width: 100%;" name="pengirim" required oninvalid="this.setCustomValidity('Mohon pilih pengirim dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tembusan</label>

                                <select id="pengirim" class="form-control form-control-sm @error('hak_akses') is-invalid @enderror" style="width: 100%;" name="pengirim" required oninvalid="this.setCustomValidity('Mohon pilih pengirim dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
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

    //Date picker
    // $('#reservationdate').datetimepicker({
    //     format: 'L'
    // })
})

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

<!-- date-range-picker -->
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script type="text/javascript">
    $('#customFile').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });
</script>

<script>
      $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
</script>
@endsection