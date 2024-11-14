@extends('components.app')
@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-sriped text-center">
            <tr>
                <th colspan="7">E-COMMERCE</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Nama Produk</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Lunas</th>
            </tr>

            @if (count($orderitem)>0)
                @foreach ($orderitem as $no=>$oi)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $oi->User->name }}</td>
                        <td>{{ $oi->Product->name_product }}</td>
                        <td>{{ $oi['quantity'] }}</td>
                        <td>{{ $oi->Product->price }}</td>
                        <td>{{ $oi->Product->description }}</td>
                        <td>{{ $oi->order->status }}</td>
                    </tr>
                @endforeach
            @endif

            </table>
        </div>
    </div>
@endsection
