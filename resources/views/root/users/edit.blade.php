@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Users</div>

                <form action="{{ route('root.users.update', $user) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    @foreach ($roles as $role)
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                            @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                            <label>{{ $role->name }}</label>
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Karyawan</label>

                        <div class="col-md-6">
                            <select name="karyawan" id="karyawan" class="form-control @error('karyawan') is-invalid @enderror">
                                <option value="{{ $user->karyawans->id }}">{{ $user->karyawans->name }}</option>
                                @foreach ($karyawans as $kar)
                                <option value="{{ $kar->id }}">{{ $kar->name }}</option>
                                @endforeach
                            </select>

                            @error('karyawan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
