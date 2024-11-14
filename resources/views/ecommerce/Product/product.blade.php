@extends('components.app')
@section('content')
    <div class="d-grid gap-2 col-2 mx-auto my-3">
        <a href="/product/add" class=" btn btn-outline-primary">Tambah</a>
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
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Price</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>

            @if (count($proData) > 0)
                @foreach ($proData as $no=>$pd)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $pd['name_product'] }}</td>
                        <td>{{ $pd['description'] }}</td>
                        <td>{{ $pd['price'] }}</td>
                        <td>{{ $pd->Category->name_category }}</td>
                        <td>
                            <a href="/product/edit/{{ $pd['id'] }}" class="btn btn-success">Edit</a>
                            <a href="/product/hapus/{{ $pd['id'] }}" class="btn btn-danger" onclick="return confirm('Yakin Hapus ??')">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
@endsection
