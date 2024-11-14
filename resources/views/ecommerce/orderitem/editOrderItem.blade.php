@extends('components.app')

@section('content')
<a href="/orderitem" class="">Order Item</a> / <a href="/orderitem/edit/{{ $orderitem['id'] }}">Edit</a>
        <h3 class="text-center mb-3 fw-bolder">FORM EDIT</h3>

    <div class="container d-flex justify-content-center shadow bg-light rounded-4 text-center" style="padding: 30px;">
            <form action="" method="post" style="width:300px;">
                @csrf
            <input type="hidden" name="id" value="{{ $orderitem['id'] }}">
             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label ">Nama</label>
                <select name="user_id" id="">
                    @foreach ($user_id as $uid)
                        <option value="{{ $uid['id'] }}" {{ $orderitem->user_id == $uid->id ? 'selected' : '' }}>{{ $uid['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label ">Nama Produk</label>
                <select name="product_id" id="">
                    @foreach ($product_id as $pid)
                        <option value="{{ $pid['id'] }}" {{ $orderitem->product_id == $pid->id ? 'selected' : '' }}>{{ $pid['name_product'] }}</option>
                    @endforeach
                </select>
            </div>
            @error('product_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Quantity</label>
                <input type="number" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Quantity" name="quantity" value="{{ $orderitem['quantity'] }}">
            </div>
            @error('quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label ">Status</label>
                <select name="order_id" id="" >
                    @foreach ($order_id as $oid)
                        <option value="{{ $oid['id'] }}" {{ $orderitem->order_id == $oid->id ? 'selected' : '' }}>{{ $oid['status'] }}</option>
                    @endforeach
                </select>
            </div>
            @error('order_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Tambah</button>
                <a href="/orderitem" class="btn btn-danger" type="submit">BACK TO DATA</a>
            </div>
         </form>
    </div>
@endsection
