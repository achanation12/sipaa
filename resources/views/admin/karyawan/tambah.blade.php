@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Karyawan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('root.karyawan.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tempatlahir" class="col-md-4 col-form-label text-md-right">Tempat Lahir</label>

                            <div class="col-md-6">
                                <input id="tempatlahir" type="text" class="form-control @error('tempatlahir') is-invalid @enderror" name="tempatlahir" value="" required autocomplete="tempatlahir" autofocus>

                                @error('tempatlahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgllahir" class="col-md-4 col-form-label text-md-right">Tanggal lahir</label>

                            <div class="col-md-6">
                                <input id="tgllahir" type="date" class="form-control @error('tgllahir') is-invalid @enderror" name="tgllahir" value="{{ old('name') }}" required autocomplete="tgllahir" autofocus>

                                @error('tgllahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jk" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <select name="jk" id="jk" class="form-control @error('jk') is-invalid @enderror" required autocomplete="jk" autofocus>
                                    <option value="pria">pria</option>
                                    <option value="wanita">wanita</option>
                                </select>

                                @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agama" class="col-md-4 col-form-label text-md-right">Agama</label>

                            <div class="col-md-6">
                                <input id="agama" type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" value="" required autocomplete="agama" autofocus>

                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="notelp" class="col-md-4 col-form-label text-md-right">No Telp</label>

                            <div class="col-md-6">
                                <input id="notelp" type="text" class="form-control @error('notelp') is-invalid @enderror" name="notelp" value="" required autocomplete="notelp" autofocus>

                                @error('notelp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                            <div class="col-md-6">
                                <textarea name="alamat" id="alamat" class="form-control @error('notelp') is-invalid @enderror" autocomplete="alamat" autofocus></textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pendidikan" class="col-md-4 col-form-label text-md-right">Pendidikan</label>

                            <div class="col-md-6">
                                <input id="pendidikan" type="text" class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" value="" required autocomplete="pendidikan" autofocus>

                                @error('pendidikan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Buat
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
