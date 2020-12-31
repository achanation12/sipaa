@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Karyawan
                    <a class="btn btn-success float-right btn-sm" href="{{ route('root.karyawan.create') }}">Tambah</a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th colspan="3"  class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->notelp }}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{ Route('root.karyawan.edit', $user->id) }}">Edit</a></td>

                            <td>
                            <form action=" {{route('root.karyawan.destroy',$user)}}" method="POST"
                            onsubmit="return confirm('{{ trans('Semua data terkait akan terhapus, anda yakin?')}}');">
                                @csrf
                                <input type="hidden" name="_method" value="Delete">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                            </form>
                            </td>
                            <td><a class="btn btn-secondary btn-sm" href="{{ Route('root.karyawan.show', $user->id) }}">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
