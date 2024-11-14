@extends('components.app')

@section('content')
<div style="margin-top: -20px">
    <a href="/category" class="">Kategori</a> / <a href="/category/edit/{{ $editData['id'] }}">Edit</a>
</div>
        <h3 class="text-center mb-3 fw-bolder">FORM EDIT</h3>

    <div class="container d-flex justify-content-center shadow bg-light rounded-4 text-center" style="padding: 30px;">
            <form action="" method="post" style="width:300px;">
                @csrf
                <input type="hidden" name="edit_id" value="{{ $editData['id'] }}">
             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label ">Nama Category</label>
                <input type="text" class="form-control g-col-6" id="formGroupExampleInput" placeholder="Nama Category" name="name_category" value="{{ $editData['name_category'] }}">
            </div>
            @error('name_category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">EDIT DATA</button>
                <a href="/category" class="btn btn-danger" type="submit">BACK TO DATA</a>
            </div>
         </form>
    </div>
@endsection
