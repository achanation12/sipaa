@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gaji
                    <a class="btn btn-success float-right btn-sm" href="{{ route('root.gaji.create') }}">Tambah</a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Bulan</th>
                            <th>Bonus</th>
                            <th>Lembur</th>
                            <th>Total</th>
                            <th>No Telp</th>
                            <th colspan="3"  class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gaji as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->karyawans->name }}</td>
                            <td>{{ $item->gajibln }}</td>
                            <td>{{ $item->gajibonus }}</td>
                            <td>{{ $item->gajilembur }}</td>
                            <td>{{ $item->gajitotal }}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{ Route('root.gaji.edit', $item->id) }}">Edit</a></td>

                            <td>
                            <form action=" {{route('root.gaji.destroy',$item)}}" method="POST"
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
                            <td><a class="btn btn-secondary btn-sm" href="{{ Route('root.karyawan.show', $item->id_karyawan) }}">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $gaji->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
