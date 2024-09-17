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
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-grid"></i>
                    <span>Kategori</span>
                </a>
            </li><!-- End Kategori Nav -->

            <li class="nav-item">
                <a class="nav-link active" href="{{ route('member.index') }}">
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
                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Buku Online</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-layouts.html">
                            <i class="bi bi-circle"></i><span>Buku Offline</span>
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
                        <p class="alert">Informasi : Input Email terlebih dahulu, lalu silahkan input member</p>
                    <div class="card" id="input">
                        <div class="card-body">
                            <h5 class="card-title">Input Member</h5>
                            

                            <!-- Horizontal Form -->
                            <form action='{{ route('member.store') }}' method='post'>
                                @csrf
                                {{-- <input type="hidden" name="id_user" value="{{ Auth::user()->id_user }}"> --}}
                                <div class="row mb-3">
                                    <label for="nis_nik" class="col-sm-2 col-form-label">NIS</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="nis_nik" name="nis_nik"
                                            value="{{ Session::get('nis_nik') }}">
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">ID User</label>
                                    <div class="col-sm-10">
                                      <select class="form-select" aria-label="Default select example" name="id_user" >
                                        <option selected>Pilih ID Use5r</option>
                                        @foreach ($id_users as $id_user)
                                            <option name="id_user" value="{{ $id_user->id_user }}">{{ $id_user->id_user }}</option>
                                            
                                        @endforeach
                                      </select>
                                    </div>
                                  </div> --}}
                                <div class="row mb-3">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ Session::get('nama') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="telp" name="telp"
                                            value="{{ Session::get('telp') }}">
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status"
                                                value="Full">
                                            <label class="form-check-label" for="status">Full</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status"
                                                value="General">
                                            <label class="form-check-label" for="status">General</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk" id="jk"
                                                value="Perempuan">
                                            <label class="form-check-label" for="jk">Perempuan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk" id="jk"
                                                value="Laki-laki">
                                            <label class="form-check-label" for="jk">Laki-laki</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row mb-3">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="foto" name="foto">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>

                </div>
                {{-- Kirim Email --}}
                <div class="col-lg-6">

                    <div class="card" id="input">
                        <div class="card-body">
                            <h5 class="card-title">Input Email</h5>

                            <!-- Horizontal Form -->
                            <form action='{{ route('email.store') }}' method='post'>
                                @csrf
                                {{-- <input type="hidden" name="id_user" value="{{ Users::user()->id_user }}"> --}}
                                {{-- <div class="row mb-3">
                                    <label for="nis" class="col-sm-3 col-form-label">NIS/NIK</label>
                                    <div class="col-sm-10">
                                        <input id="nis" type="number"
                                            class="form-control @error('username') is-invalid @enderror" name="nis"
                                            required>
                                    </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            required autocomplete="current-username"
                                            value="{{ Session::get('username') }}">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input id="password" type="password"
                                            class="form-control 
                                        @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password"
                                            value="{{ Session::get('password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Send</button>
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
