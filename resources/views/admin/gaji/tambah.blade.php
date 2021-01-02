@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Gaji</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('root.gaji.store') }}">
                        @csrf

                        <div class="form row">

                            <div class="form-group col-md-6">
                                <label for="gajilembur">Gaji Lembur</label>
                                <input id="gajilembur" type="text" class="form-control @error('gajilembur') is-invalid @enderror" name="gajilembur"  required autocomplete="name" autofocus>

                                @error('gajilembur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gajibonus">Gaji Bonus</label>
                                <input id="gajibonus" type="text" class="form-control @error('gajibonus') is-invalid @enderror" name="gajibonus"  required autocomplete="name" autofocus>

                                @error('gajibonus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="form-group col-md-6">
                                <label for="gajibln">Gaji Bulan</label>
                                <input id="gajibln" type="text" class="form-control @error('gajibln') is-invalid @enderror" name="gajibln"  required autocomplete="name" autofocus>

                                @error('gajibln')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gajitotal">Total Gaji</label>
                                <input id="gajitotal" type="text" class="form-control @error('gajitotal') is-invalid @enderror" name="gajitotal"  required autocomplete="name" autofocus>

                                @error('gajitotal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_karyawan" class="col-md-2 col-form-label text-md-right">Karyawan</label>

                            <div class="col-md-10">
                                <select id="id_karyawan" class="form-control @error('id_karyawan') is-invalid @enderror" name="id_karyawan"  required>
                                    @foreach ($diff as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                @error('id_karyawan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-0">
                                <button type="submit" class="btn btn-primary">
                                    Buat
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-warning">
                                    Hitung
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