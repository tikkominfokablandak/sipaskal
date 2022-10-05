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
          <h1 class="m-0">Registrasi Surat Keluar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/surat-masuk') }}">Surat Keluar</a></li>
            <li class="breadcrumb-item active">Registrasi Surat Keluar</li>
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
              <form method="POST" action="{{ route('naskah-keluar.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">DETAIL ISI SURAT</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="username">{{ __('Jenis Surat') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="jenis_surat" class="form-control" style="width: 100%;" name="id_jenissurat" required oninvalid="this.setCustomValidity('Mohon pilih pengirim dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    @foreach ($jenissurat as $item)
                                        <option value="{{ $item->id }}">{{ $item->jenis_surat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Sifat Surat') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="sifat_surat" class="form-control" style="width: 100%;" name="sifat_surat" required oninvalid="this.setCustomValidity('Mohon pilih Sifat Surat dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    <option value="BIASA">BIASA</option>
                                    <option value="RAHASIA">RAHASIA</option>
                                    <option value="SANGAT RAHASIA">SANGAT RAHASIA</option>
                                    <option value="TERBATAS">TERBATAS</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Tingkat Urgensi') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="tingkat_urgen" class="form-control" style="width: 100%;" name="tingkat_urgen" required oninvalid="this.setCustomValidity('Mohon pilih Tingkat Urgensi dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    <option value="BIASA">BIASA</option>
                                    <option value="SEGERA">SEGERA</option>
                                    <option value="SANGAT SEGERA">SANGAT SEGERA</option>
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label for="username">{{ __('Klasifikasi') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="pengirim" class="form-control form-control-sm @error('hak_akses') is-invalid @enderror" style="width: 100%;" name="pengirim" required oninvalid="this.setCustomValidity('Mohon pilih pengirim dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>

                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label>{{ __('Nomor Surat') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <input id="no_surat" type="text" class="form-control" placeholder="Masukan Nomor Surat ..." name="no_surat" value="{{ old('no_surat') }}" required autocomplete="no_surat" oninvalid="this.setCustomValidity('Mohon isi Nomor Surat terlebih dahulu!')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">File Surat
                                    <small style="color:red"><b>*</b></small>
                                </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="file_surat">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <small style="color:red">
                                        Format yang didukung: .DOC dan .DOCX
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>{{ __('Hal') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <textarea name="perihal" rows="3" class="form-control" id="hal" placeholder="Masukkan hal..."></textarea>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Isi Ringkas') }}
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <textarea name="isi" rows="12" class="form-control" id="isi" placeholder="Masukkan isi..."></textarea>
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
                            {{-- <div class="form-group">
                                <label>Grup Tujuan</label>

                                <select id="grup-tujuan" class="form-control" style="width: 100%;" name="grup-tujuan">
                                    <option value=""></option>

                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label>Tujuan Internal
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="tujuan-internal" class="form-control" style="width: 100%;" name="id_tujuan" required oninvalid="this.setCustomValidity('Mohon pilih Tujuan terlebih dahulu')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    @foreach ($internal as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->nama_jabatan }} - {{ $item->nama_unitkerja }} - {{ $item->nama_opd }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tembusan</label>

                                <select id="tembusan" class="form-control" style="width: 100%;" name="id_tembusan" required oninvalid="this.setCustomValidity('Mohon pilih Tembusan terlebih dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    @foreach ($tembusan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->nama_jabatan }} - {{ $item->nama_unitkerja }} - {{ $item->nama_opd }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-header">
                    <h3 class="card-title">VERIFIKATOR DAN PENANDATANGAN SURAT</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Verifikator
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="verifikator" class="form-control form-control-sm" style="width: 100%;" name="id_verifikator" required oninvalid="this.setCustomValidity('Mohon pilih verifikator dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    @foreach ($verifikator as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->nama_jabatan }} - {{ $item->nama_unitkerja }} - {{ $item->nama_opd }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penandatangan
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="penandatangan" class="form-control form-control-sm" style="width: 100%;" name="id_ttd" required oninvalid="this.setCustomValidity('Mohon pilih penandatangan dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    @foreach ($tandatangan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->nama_jabatan }} - {{ $item->nama_unitkerja }} - {{ $item->nama_opd }}</option>
                                    @endforeach
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
    $('#jenis_surat').select2({
        placeholder: "Pilih Jenis Surat",
        theme: 'bootstrap4'
    });

    $('#sifat_surat').select2({
        placeholder: "Pilih Sifat Surat",
        theme: 'bootstrap4'
    });

    $('#tingkat_urgen').select2({
        placeholder: "Pilih Tingkat Urgensi",
        theme: 'bootstrap4'
    });

    $('#tujuan-internal').select2({
        placeholder: "",
        theme: 'bootstrap4'
    });

    $('#tembusan').select2({
        placeholder: "",
        theme: 'bootstrap4'
    });

    $('#tujuan-eksternal').select2({
        placeholder: "",
        theme: 'bootstrap4'
    });

    $('#verifikator').select2({
        placeholder: "",
        theme: 'bootstrap4'
    });

    $('#penandatangan').select2({
        placeholder: "",
        theme: 'bootstrap4'
    });

    bsCustomFileInput.init();
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
@endsection