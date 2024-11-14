@extends('components.app')
@section('content')
    <div class="d-grid gap-2 col-2 mx-auto my-3">
        <a href="/order/add/" class=" btn btn-outline-primary">Tambah</a>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif
    <table class="table table-striped text-center table-hover">
            <tr class="table-primary">
                <th>No</th>
                <th>Nama Pengorder</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @if (count($OrderData) > 0)
                @foreach ($OrderData as $no=>$od)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $od->User->name }}</td>
                        <td>{{ $od['total'] }}</td>
                        <td>{{ $od['status'] }}</td>
                        <td>
                            <a href="/order/edit/{{ $od['id'] }}" class="btn btn-success">Edit</a> |
                            <a href="/order/hapus/{{ $od['id'] }}" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus ??')">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
@endsection
