@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Biodata') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('biodata.store') }}">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id_user }}">
                            {{-- Input NIS/NIK --}}
                            <div class="row mb-3">
                                <label for="nis_nik" class="col-md-4 col-form-label text-md-end">{{ __('NIS/NIK') }}</label>

                                <div class="col-md-6">
                                    <input id="nis_nik" type="text"
                                        class="form-control @error('nis_nik') is-invalid @enderror" name="nis_nik" required
                                        autocomplete="nis_nik">

                                    @error('nis_nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End Input NIS/NIK --}}

                            {{-- Input nama --}}
                            <div class="row mb-3">
                                <label for="nama"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama" required
                                        autocomplete="nama">

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End Input nama --}}


                            {{-- Input telp --}}
                            <div class="row mb-3">
                                <label for="telp"
                                    class="col-md-4 col-form-label text-md-end">{{ __('No Telepon') }}</label>

                                <div class="col-md-6">
                                    <input id="telp" type="text"
                                        class="form-control @error('telp') is-invalid @enderror" name="telp" required
                                        autocomplete="telp">

                                    @error('telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End Input telp --}}

                            {{-- Jenis kelamin --}}
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
                            {{-- End Jenis Kelamin --}}

                            {{-- Button Send --}}
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Kirim') }}
                                    </button>
                                </div>
                            </div>
                            {{-- End button --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
