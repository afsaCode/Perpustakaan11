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
                <a class="nav-link active" href="{{ route('rak.index') }}">
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
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Buku</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
                            <h5 class="card-title">Input Rak</h5>

                            <!-- Horizontal Form -->
                            <form action='{{ route('rak.store') }}' method='post'>
                                @csrf
                                <div class="row mb-3">
                                    <label for="id_rak" class="col-sm-2 col-form-label">Id Rak</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_rak" name="id_rak"
                                            value="{{ Session::get('id_rak') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="rak" class="col-sm-2 col-form-label">Rak</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="rak" name="rak"
                                            value="{{ Session::get('rak') }}">
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
