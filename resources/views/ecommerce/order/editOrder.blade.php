@extends('components.app')

@section('content')
<a href="/order" class="">Order</a> / <a href="/order/edit/{{ $edit_data['id'] }}">Edit</a>
        <h3 class="text-center mb-3 fw-bolder">FORM EDIT</h3>

    <div class="container d-flex justify-content-center shadow bg-light rounded-4 text-center" style="padding: 30px;">
            <form action="" method="post" style="width:300px;">
                @csrf
                <input type="hidden" name="order_id" value="{{ $edit_data['id'] }}">
             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label ">Nama Pengorder</label>
                <select name="user_id" id="" class="">
                    @foreach ( $user_data as $ud)
                        <option value="{{ $ud['id'] }}"{{ $edit_data->user_id == $ud->id ? 'selected' : "" }}>{{ $ud['name'] }}</option>
                    @endforeach
                </select>
            </div>
            @error('name_product')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">total</label>
                <input type="number" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Total" name="total" value="{{ $edit_data['total'] }}">
            </div>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Status</label>
                <select name="status" id="">
                    <option value="Lunas" {{ $edit_data['status'] == "Lunas" ? 'selected' : '' }}>Lunas</option>
                    <option value="Belum Lunas" {{ $edit_data['status'] == "Belum Lunas" ? 'selected' : '' }} >Belum Lunas</option>
                </select>
            </div>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Tambah</button>
                <a href="/product" class="btn btn-danger" type="submit">BACK TO DATA</a>
            </div>
         </form>
    </div>
@endsection
