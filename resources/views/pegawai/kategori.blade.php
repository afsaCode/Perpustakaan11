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
                <a class="nav-link active" href="{{ route('kategori.index') }}">
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
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Kategori</h5>

                            <!-- TOMBOL TAMBAH DATA -->
                            <div class="pb-3">
                                <a href='{{ route('kategori.create') }}' class="btn btn-primary">+ Tambah Data</a>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>
                                            <b>Kategori</b>
                                        </th>
                                        <th>Waktu Peminjaman</th>
                                        <th>Harga Keterlambatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id_kat }}</td>
                                            <td>{{ $item->kategori }}</td>
                                            <td>{{ $item->waktu_peminjaman }}</td>
                                            <td>{{ $item->harga_keterlambatan }}</td>
                                            <td>
                                                <a href='{{ route('kategori.edit', $item->id_kat) }}' class="btn btn-warning btn-sm">Edit</a>
                                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ route('kategori.destroy', $item->id_kat) }}" method="POST">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>

                </div>

            </div>
            </div>


            </div>
            </div>
        </section>


    </main><!-- End #main -->
