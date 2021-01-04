@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Todolist</div>

                <div class="card-body">
                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="date">Tanggal</label>
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror datepicker" name="date"  required autocomplete="name" autofocus>

                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            <button class="btn btn-success btn-sm" type="submit" onclick="start()">Gernate</button>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="time">Waktu</label>
                            <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" value=" "  required autocomplete="name" autofocus>

                            @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <script>
                        function start(){

                        var date = document.getElementById("date").value;
                        var time = document.getElementById("time").value;

                        datetime = date + " " + time + ":00";

                        $("#batas").val(datetime);
                        }
                    </script>

                    <form method="POST" action="{{ route('root.todolist.store') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                            <label for="batas" class="col-md-0 col-form-label text-md-right">Selesai s/d</label>
                            <input type="text" name="batas" id="batas" class="form-control @error('batas') is-invalid @enderror">

                                @error('batas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form row">

                            <div class="form-group col-md-6">
                                <label for="creator">Dari</label>
                                <select name="creator" id="creator" class="form-control @error('creator') is-invalid @enderror">
                                    <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }}</option>
                                </select>

                                @error('creator')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="for">Untuk</label>
                                <select name="for" id="for" class="form-control @error('for') is-invalid @enderror">
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                @error('for')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                            <label for="judul" class="col-md-0 col-form-label text-md-right">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror">

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                            <label for="isi" class="col-md-0 col-form-label text-md-right">Tugas</label>
                            <textarea name="isi" id="isi" cols="30" rows="10" class="form-control @error('isi') is-invalid @enderror"></textarea>

                                @error('isi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
