@extends('layouts.mainadmin')
@section('content')



    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('pegawai.dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('kategori.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Kategori</span>
                </a>
            </li><!-- End Kategori Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('rak.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Rak</span>
                </a>
            </li><!-- End Kategori Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('member.index') }}">
                    <i class="bi bi-menu-button-wide"></i><span>Member</span>
                </a>
            </li><!-- End Components Nav -->

            <!-- End Buku -->
            <li class="nav-item">
                <a class="nav-link active" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Buku</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content active " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('bukuinduk.index') }}">
                            <i class="bi bi-circle"></i><span>Buku Induk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bukuanak.index') }}">
                            <i class="bi bi-circle"></i><span>Buku Anak</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Buku -->

            {{-- Start Peminjaman --}}
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Peminjaman</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tables-general.html">
                            <i class="bi bi-circle"></i><span>Peminjaman Online</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transaksi.index') }}">
                            <i class="bi bi-circle"></i><span>Peminjaman Offline</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Peminjaman --}}


        </ul>

    </aside><!-- End Sidebar-->
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card" id="input">
                        <div class="card-body">
                            <h5 class="card-title">Input Kategori</h5>

                            <!-- Horizontal Form -->
                            <form action='{{ route('bukuinduk.store') }}' method='post'>
                                @csrf
                                <div class="row mb-3">
                                    <label for="id_bukuinduk" class="col-sm-2 col-form-label">ID Buku</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_bukuinduk" name="id_bukuinduk"
                                            value="{{ Session::get('id_bukuinduk') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                      <select class="form-select" aria-label="Default select example" name="kategori" >
                                        <option selected>Pilih Kategori</option>
                                        @foreach ($kategories as $kategori)
                                            <option name="kategori" value="{{ $kategori->id_kat }}">{{ $kategori->kategori }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Rak</label>
                                    <div class="col-sm-10">
                                      <select class="form-select" aria-label="Default select example" name="rak">
                                        <option value="-" selected>Pilih Rak</option>
                                        @foreach ($raks as $rak)
                                        <option name="rak" value="{{ $rak->rak }}">{{ $rak->rak }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                <div class="row mb-3">
                                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="judul" name="judul"
                                            value="{{ Session::get('judul') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="penulis" name="penulis"
                                            value="{{ Session::get('penulis') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="penerbit" name="penerbit"
                                            value="{{ Session::get('penerbit') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                                    <div class="col-sm-10">
                                        <input type="year" class="form-control" id="tahun_terbit" name="tahun_terbit"
                                            value="{{ Session::get('tahun_terbit') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="isbn" name="isbn"
                                            value="{{ Session::get('isbn') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jml_hal" class="col-sm-2 col-form-label">Jumlah Halaman</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" id="jml_hal" name="jml_hal"
                                        value="{{ Session::get('jml_hal') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="sinopsis" name="sinopsis"
                                            value="{{ Session::get('sinopsis') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" id="stok" name="stok"
                                        value="{{ Session::get('stok') }}">
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Buku</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" id="jumlah" name="jumlah"
                                        value="{{ Session::get('jumlah') }}">
                                    </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="sampul" name="sampul">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ebook" class="col-sm-2 col-form-label">File E-Book</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="ebook" name="ebook">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" id="harga" name="harga"
                                        value="{{ Session::get('harga') }}">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>

                </div>
            </div>
            </div>


            </div>
            </div>
        </section>


    </main><!-- End #main -->
