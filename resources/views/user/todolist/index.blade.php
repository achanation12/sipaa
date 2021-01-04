@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">todolist
                    <a class="btn btn-success float-right btn-sm" href="{{ route('root.todolist.create') }}">Tambah</a>
                </div>


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dari</th>
                                <th>Judul</th>
                                <th>Untuk</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th colspan="3"  class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todolist as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->forCreators->name }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->forUsers->name }}</td>
                                <td>{{ date_format($item->created_at, 'd-m-Y H:i:s') }}</td>
                                <td>{{ date_format(date_create($item->batas), 'd-m-Y H:i:s') }}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{ Route('root.todolist.edit', $item->id) }}">Edit</a></td>

                                <td>
                                <form action=" {{route('root.todolist.destroy',$item)}}" method="POST"
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
                                <td><a class="btn btn-secondary btn-sm" href="{{ Route('root.todolist.show', $item->id) }}">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $todolist->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
