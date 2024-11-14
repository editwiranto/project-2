@extends('components.app')

@section('content')
<a href="/order" class="">Order</a> / <a href="/order/add/">Tambah</a>
        <h3 class="text-center mb-3 fw-bolder">FORM TAMBAH</h3>

    <div class="container d-flex justify-content-center shadow bg-light rounded-4 text-center" style="padding: 30px;">
            <form action="" method="post" style="width:300px;">
                @csrf
             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label ">Nama Pengorder</label>
                <select name="user_id" id="" class="">
                    @foreach ( $user_data as $ud)
                        <option value="{{ $ud['id'] }}">{{ $ud['name'] }}</option>
                    @endforeach
                </select>
            </div>
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">total</label>
                <input type="number" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Total" name="total">
            </div>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Status</label>
                <select name="status" id="">
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                </select>
            </div>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Tambah</button>
                <a href="/order" class="btn btn-danger" type="submit">BACK TO DATA</a>
            </div>
         </form>
    </div>
@endsection
