@extends('components.app')
@section('content')
    <h3 class="text-center mb-3 fw-bolder">Profile</h3>
    <div class="container d-flex justify-content-center shadow bg-light rounded-4 text-center" style="padding: 30px;">
            <form action="{{ route('update') }}" method="post" style="width:300px;" enctype="multipart/form-data">
                @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
             @if ($user->gambar)
                <img src="{{ Storage::url($user->gambar) }}" alt="gambar-profile" class="img-fluid mb-3" style="max-height:200px; max-width:200px">.
            @else
                <p>Tidak Ada Gambar yang diupload</p>
            @endif
             <div class="mb-3">
                <input type="file" class="form-control g-col-6" id="formGroupExampleInput" placeholder="Nama User" name="gambar" value="{{ $user->gambar }}">
            </div>
            @error('gambar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label ">Nama User</label>
                <input type="text" class="form-control g-col-6" id="formGroupExampleInput" placeholder="Nama User" name="name" value="{{ $user->name }}">
            </div>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Email</label>
                <input type="email" disabled class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Email" name="email" value="{{ $user->email }}">
            </div>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Usia</label>
                <input type="text" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Usia" name="usia" value="{{ $user->usia }}">
            </div>
            @error('usia')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Alamat</label>
                <input type="text" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Alamat" name="alamat" value="{{ $user->alamat }}">
            </div>
            @error('alamat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Telepon</label>
                <input type="number" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Telepon" name="telepon" value="{{ $user->telepon }}">
            </div>
            @error('telepon')
                <div class="text-danger">{{ $message }}</div>
            @enderror
             <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Password</label>
                <input type="password" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="" name="password" value="{{ $user->password }}">
            </div>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-primary" type="submit">EDIT DATA</button>
            </div>
            <div class="d-grid gap-2">
                @if (Session::has('success'))
                    <span class="alert alert-success">{{ session('success') }}</span>
                @endif
                @if (Session::has('fail'))
                    <span class="alert alert-success">{{ session('fail') }}</span>
                @endif
            </div>
         </form>
    </div>
@endsection
