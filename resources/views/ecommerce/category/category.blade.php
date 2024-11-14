@extends('components.app')
@section('content')
    <div class="d-grid gap-2 col-2 mx-auto my-3">
        <a href="/category/add" class=" btn btn-outline-primary">Tambah</a>
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
                <th>Nama Kategory</th>
                <th>Tanggal Pembuatan</th>
                <th>Tanggal Ubah</th>
                <th>Action</th>
            </tr>

            @if (count($all_category) > 0)
                @foreach ($all_category as $no=>$ac)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $ac['name_category'] }}</td>
                        <td>{{ $ac['created_at'] }}</td>
                        <td>{{ $ac['updated_at'] }}</td>
                        <td>
                            <a href="category/edit/{{ $ac['id'] }}" class="btn btn-primary">Edit</a>
                            <a href="category/hapus/{{ $ac['id'] }}" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
@endsection
