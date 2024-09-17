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
                <a class="nav-link active" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Peminjaman</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content active " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tables-general.html">
                            <i class="bi bi-circle"></i><span>Peminjaman Online</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transaksi.index') }}" class="nav-link active">
                            <i class="bi bi-circle"></i><span>Peminjaman Offline</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Peminjaman --}}

        </ul>

    </aside><!-- End Sidebar-->
    <main id="main" class="main">

        {{-- Tabel Data Member  --}}
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Transaksi </h5>

                            <!-- TOMBOL TAMBAH DATA -->
                            <div class="pb-2">
                                <a href='{{ route('transaksi.create') }}' class="btn btn-primary">+ Tambah Data</a>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>ID Buku Anak</th>
                                        <th>Judul</th>
                                        <th>Tanggal Dipinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->nis_nik }}</td>
                                            <td>{{ $item->member->nama }}</td>
                                            <td>{{ $item->id_buku_anak }}</td>
                                            <td>{{ $item->bukuanak->bukuInduk->judul }}</td>
                                            <td>{{ $item->tgl_peminjaman }}</td>
                                            <td>{{ $item->tgl_buku_kembali }}</td>
                                            <td>
                                                {{-- Start Modal Kembalikan Buku --}}
                                                <form action='{{ route('transaksi.update', $item->id_transaksi) }}' method='post'>
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#verticalycentered">
                                                        Kembalikan
                                                    </button>
                                                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Kembalikan Buku</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">{{-- Start Modal Body --}}

                                                                    <div class="col-sm-10">
                                                                        <div class="form-floating mb-3">
                                                                            <input type="date" class="form-control"
                                                                                id="floatingInput" name="tgl_pengembalian">
                                                                            <label for="floatingInput">Tanggal Pengembalian</label>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="row mb-3">
                                                                        <label class="col-sm-2 col-form-label">NIS</label>
                                                                        <div class="col-sm-10">
                                                                            <select class="form-select"
                                                                                aria-label="Default select example"
                                                                                name="jenis_denda">
                                                                                <option selected>Jenis Denda</option>
                                                                                @foreach ($jenis_denda as $jenis_denda)
                                                                                    <option name="jenis_denda"
                                                                                        value="{{ $jenis_denda->jenis_denda }}">
                                                                                        {{ $jenis_denda->jenis_denda }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div> --}}
                                                                </div> End Modal Body

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form><!-- End Horizontal Form -->


                                                {{-- End Modal Kembalikan Buku --}}

                                                <form onsubmit="return confirm('Yakin akan menghapus data?')"
                                                    class='d-inline'
                                                    action="{{ route('transaksi.destroy', $item->id_transaksi) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="submit"
                                                        class="btn btn-danger btn-sm">Del</button>
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
        </section>


    </main><!-- End #main -->
