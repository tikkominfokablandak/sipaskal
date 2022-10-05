<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('assets/img/sipaskal/sipaskal-logo.png') }}" alt="SIPASKAL Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">S I P A S K A L</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('assets/img/profil/'.Auth::user()->foto) }}" style="width:35px" class="img-circle elevation-2" alt="{{ Auth::user()->nama }}">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ ( (request()->is('dashboard')) ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          @if(auth()->user()->id_role == 1)
          <li class="nav-item {{ ( (request()->is('users*')) or (request()->is('opd*')) or (request()->is('unitkerja*')) or (request()->is('jabatan*')) ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ( (request()->is('users*')) or (request()->is('opd*')) or (request()->is('unitkerja*')) or (request()->is('jabatan*')) ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Administrasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('opd.index') }}" class="nav-link {{ (request()->is('opd*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OPD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('unitkerja.index') }}" class="nav-link {{ (request()->is('unitkerja*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Kerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('jabatan.index') }}" class="nav-link {{ (request()->is('jabatan*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth()->user()->id_role == 3)
          <li class="nav-item {{ ( (request()->is('surat-masuk*')) or (request()->is('surat-keluar*')) or (request()->is('surat-disposisi*')) ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ( (request()->is('surat-masuk*')) or (request()->is('surat-keluar*')) or (request()->is('surat-disposisi*')) ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Surat Dinas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('surat-masuk.create') }}" class="nav-link {{ ( (request()->is('surat-masuk/create')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrasi Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('surat-keluar.create') }}" class="nav-link {{ ( (request()->is('surat-keluar/create')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrasi Surat Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('surat-masuk.index') }}" class="nav-link {{ ( (request()->is('surat-masuk')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('surat-keluar.index') }}" class="nav-link {{ ( (request()->is('surat-keluar')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Surat Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('surat-disposisi.index') }}" class="nav-link {{ ( (request()->is('surat-disposisi*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disposisi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ( (request()->is('log-surat-masuk*')) or (request()->is('log-surat-keluar*')) or (request()->is('log-disposisi*')) ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ( (request()->is('log-surat-masuk*')) or (request()->is('log-surat-keluar*')) or (request()->is('log-disposisi*')) ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Log Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('log-surat-masuk.index') }}" class="nav-link {{ ( (request()->is('log-surat-masuk*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('log-surat-keluar.index') }}" class="nav-link {{ ( (request()->is('log-surat-keluar*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('log-disposisi.index') }}" class="nav-link {{ ( (request()->is('log-disposisi*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disposisi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ( (request()->is('daftar-penandatangan*')) or (request()->is('daftar-verifikator*')) or (request()->is('daftar-tujuan*')) or (request()->is('daftar-grup-tujuan*')) or (request()->is('daftar-tembusan*')) ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ( (request()->is('daftar-penandatangan*')) or (request()->is('daftar-verifikator*')) or (request()->is('daftar-tujuan*')) or (request()->is('daftar-grup-tujuan*')) or (request()->is('daftar-tembusan*')) ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('daftar-penandatangan.index') }}" class="nav-link {{ ( (request()->is('daftar-penandatangan*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Penandatangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('daftar-verifikator.index') }}" class="nav-link {{ ( (request()->is('daftar-verifikator*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Verifikator</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tujuan.index') }}" class="nav-link {{ ( (request()->is('daftar-tujuan*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Tujuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('daftar-grup-tujuan.index') }}" class="nav-link {{ ( (request()->is('daftar-grup-tujuan*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Grup Tujuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('daftar-tembusan.index') }}" class="nav-link {{ ( (request()->is('daftar-tembusan*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Tembusan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth()->user()->id_role == 4)
          <li class="nav-item">
            <a href="surat/tandatangan" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Tandatangan Surat
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="surat/verifikasi" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Verifikasi Surat
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Surat Dinas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="suratkeluar/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrasi Surat Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="surat/utama" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="daftar-surat-keluar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Surat Keluar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Disposisi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="surat/disposisi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Disposisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="log-disposisi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log Disposisi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="surat/tembusan" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Daftar Tembusan
              </p>
            </a>
          </li>
          @endif


          {{-- ADMIN OPD TDNE --}}
          @if(auth()->user()->id_role == 5)
          <li class="nav-item {{ ( (request()->is('surat-masuk*')) or (request()->is('naskah-keluar*')) or (request()->is('surat-disposisi*')) or (request()->is('template-naskah*')) ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ( (request()->is('surat-masuk*')) or (request()->is('naskah-keluar*')) or (request()->is('surat-disposisi*'))  or (request()->is('template-naskah*')) ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Naskah Dinas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
                <a href="{{ route('surat-masuk.create') }}" class="nav-link {{ ( (request()->is('surat-masuk/create')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrasi Naskah Masuk</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ route('naskah-keluar.create') }}" class="nav-link {{ ( (request()->is('naskah-keluar/create')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buat Naskah Keluar</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('surat-masuk.index') }}" class="nav-link {{ ( (request()->is('surat-masuk')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Naskah Masuk</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ route('naskah-keluar.index') }}" class="nav-link {{ ( (request()->is('naskah-keluar')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Naskah Keluar</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('surat-disposisi.index') }}" class="nav-link {{ ( (request()->is('surat-disposisi*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disposisi</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ route('template-naskah.index') }}" class="nav-link {{ ( (request()->is('template-naskah')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Template Naskah</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- <li class="nav-item {{ ( (request()->is('log-surat-masuk*')) or (request()->is('log-surat-keluar*')) or (request()->is('log-disposisi*')) ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ( (request()->is('log-surat-masuk*')) or (request()->is('log-surat-keluar*')) or (request()->is('log-disposisi*')) ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Log Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('log-surat-masuk.index') }}" class="nav-link {{ ( (request()->is('log-surat-masuk*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('log-surat-keluar.index') }}" class="nav-link {{ ( (request()->is('log-surat-keluar*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('log-disposisi.index') }}" class="nav-link {{ ( (request()->is('log-disposisi*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disposisi</p>
                </a>
              </li>
            </ul>
          </li> --}}

          <li class="nav-item {{ ( (request()->is('daftar-penandatangan*')) or (request()->is('daftar-verifikator*')) or (request()->is('daftar-tujuan*')) or (request()->is('daftar-grup-tujuan*')) or (request()->is('daftar-tembusan*')) ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ( (request()->is('daftar-penandatangan*')) or (request()->is('daftar-verifikator*')) or (request()->is('daftar-tujuan*')) or (request()->is('daftar-grup-tujuan*')) or (request()->is('daftar-tembusan*')) ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('daftar-penandatangan.index') }}" class="nav-link {{ ( (request()->is('daftar-penandatangan*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Penandatangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('daftar-verifikator.index') }}" class="nav-link {{ ( (request()->is('daftar-verifikator*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Verifikator</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tujuan.index') }}" class="nav-link {{ ( (request()->is('daftar-tujuan*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Tujuan</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('daftar-grup-tujuan.index') }}" class="nav-link {{ ( (request()->is('daftar-grup-tujuan*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Grup Tujuan</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ route('daftar-tembusan.index') }}" class="nav-link {{ ( (request()->is('daftar-tembusan*')) ) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Tembusan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>