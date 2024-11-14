@extends('components.app')

@section('content')
<a href="/product" class="">Product</a> / <a href="/product/edit/{{ $EditPro['id'] }}">Edit</a>
        <h3 class="text-center mb-3 fw-bolder">FORM EDIT</h3>

    <div class="container d-flex justify-content-center shadow bg-light rounded-4 text-center" style="padding: 30px;">
            <form action="" method="post" style="width:300px;">
                @csrf
                <input type="hidden" name="edit_id" value="{{ $EditPro['id'] }}">
             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label ">Nama Produk</label>
                <input type="text" class="form-control g-col-6" id="formGroupExampleInput" placeholder="Nama Produk" name="name_product" value="{{ $EditPro['name_product'] }}">
            </div>
            @error('name_product')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Deskripsi</label>
                <input type="text" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Deskripsi" name="description" value="{{ $EditPro['description'] }}">
            </div>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Harga</label>
                <input type="number" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Harga" name="price" value="{{ $EditPro['price'] }}">
            </div>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Kategori</label>
                <select class="form-select" name="category_id" id="" class="">
                    @foreach ($Category_data as $ac)
                        <option value="{{ $ac['id'] }}"{{ $EditPro->category_id == $ac->id ? 'selected' : ''}}>{{ $ac['name_category'] }}</option>
                    @endforeach
                </select>
            </div>
            @error('kategori')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Edit Data</button>
                <a href="/product" class="btn btn-danger" type="submit">BACK TO DATA</a>
            </div>
         </form>
    </div>
@endsection
