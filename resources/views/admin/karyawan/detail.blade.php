@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Karyawan</div>

                <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-2">Nama</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->name }}</label>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-2">email</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->email }}</label>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-2">Tempat Lahir</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->tempatlahir }}</label>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-2">Tanggal Lahir</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->tanggallahir }}</label>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-2">Jenis Kelamin</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->jeniskelamin }}</label>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-2">Agama</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->agama }}</label>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-2">No Telp</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->notelp }}</label>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-2">Alamat</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->alamat }}</label>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h6> <i>Dibuat {{ $karyawan->created_at }}</i></h6>
                        </div>
                        <div class="col-md-6">
                            <h6> <i>Diubah {{ $karyawan->updated_at }}</i></h6>
                        </div>
                    </div>
                    <hr>

                    @if (($karyawan->gajis)== true)
                    <div class="row">
                        <label for="name" class="col-md-2">Gaji Bonus</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->gajis->gajibonus }}</label>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-2">Gaji Lembur</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->gajis->gajilembur }}</label>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-2">Gaji Bulanan</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->gajis->gajibln }}</label>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-2">Gaji Total</label>
                        <label for=":" class="col-md-0">:</label>
                        <label for="nameisi" class="col-md-8">{{ $karyawan->gajis->gajitotal }}</label>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <h6> <i>Dibuat {{ $karyawan->gajis->created_at }}</i></h6>
                        </div>
                        <div class="col-md-6">
                            <h6> <i>Diubah {{ $karyawan->gajis->updated_at }}</i></h6>
                        </div>
                    </div>
                    @else
                    <div class="text-center">
                        <h2>Belum memiliki data gaji.</h2>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
