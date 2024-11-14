@extends('components.app')
@section('content')
    <div class="d-grid gap-2 col-2 mx-auto my-3">
        <a href="{{ route('orderitem') }}" class=" btn btn-outline-primary">Tambah</a>
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
                <th>Nama Pembeli</th>
                <th>Nama Product</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @if (count($data) > 0)
                @foreach ($data as $no=>$d)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $d->User->name }}</td>
                        <td>{{ $d->Product->name_product }}</td>
                        <td>{{ $d['quantity'] }}</td>
                        <td>
                                @if ($d->Product->id == $d->product_id)
                                    {{ $d->Product->price }}
                                @endif
                        </td>
                        <td>
                                @if ($d->Product->id == $d->product_id)
                                    {{ $d->Product->description }}
                                @endif
                        </td>
                        <td>{{ $d->order->status }}</td>
                        <td>
                            <a href="/orderitem/edit/{{ $d['id'] }}" class="btn btn-success">Edit</a>
                            <a href="orderitem/hapus/{{ $d['id'] }}" class="btn btn-danger" onclick="return confirm('Yakin ?')">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
@endsection
