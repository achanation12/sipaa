@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Gaji
                    <button type="submit" id="hitung" name="hitung" onclick="hitung()" class="btn btn-success btn-sm float-right">
                        Hitung
                    </button>

                    <script>
                        function hitung(){
                            var lembur = document.getElementById("gajilembur").value;
                            var bonus = document.getElementById("gajibonus").value;
                            var bulan = document.getElementById("gajibln").value;

                            jumlah = parseFloat(lembur)+parseFloat(bonus)+parseFloat(bulan);

                            $("#gajitotal").val(jumlah);
                        }
                    </script>

                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('root.gaji.update', $gaji) }}">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form row">

                            <div class="form-group col-md-6">
                                <label for="gajilembur">Gaji Lembur</label>
                                <input id="gajilembur" type="text" class="form-control @error('gajilembur') is-invalid @enderror" name="gajilembur" value="{{ $gaji->gajilembur }}"  required autocomplete="name" autofocus>

                                @error('gajilembur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gajibonus">Gaji Bonus</label>
                                <input id="gajibonus" type="text" class="form-control @error('gajibonus') is-invalid @enderror" name="gajibonus" value="{{ $gaji->gajibonus }}"  required autocomplete="name" autofocus>

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
                                <input id="gajibln" type="text" class="form-control @error('gajibln') is-invalid @enderror" name="gajibln" value="{{ $gaji->gajibln }}"  required autocomplete="name" autofocus>

                                @error('gajibln')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gajitotal">Total Gaji</label>
                                <input id="gajitotal" type="text" class="form-control @error('gajitotal') is-invalid @enderror" name="gajitotal" value="{{ $gaji->gajitotal }}"  required autocomplete="name" autofocus>

                                @error('gajitotal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="id_karyawan" class="col-md-0 col-form-label text-md-right">User</label>
                                    <select id="id_karyawan" class="form-control @error('id_karyawan') is-invalid @enderror" name="id_karyawan"  required>
                                    <option value="{{ $gaji->id_karyawan }}" selected >{{ $gaji->karyawans->name }}</option>
                                    @foreach ($diff as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                @error('id_karyawan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>

                                <button type="submit" class="btn btn-primary">
                                    Ubah
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
