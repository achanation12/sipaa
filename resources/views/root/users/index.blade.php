@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users
                    <a class="btn btn-success float-right btn-sm" href="{{ route('root.users.create') }}">Tambah</a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th colspan="2"  class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{ Route('root.users.edit', $user->id) }}">Edit</a></td>

                            <td>
                            <form action=" {{route('root.users.destroy',$user)}}" method="POST"
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
