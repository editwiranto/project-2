<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center mb-3 fw-bolder">REGISTER</h3>

    <div class="container d-flex justify-content-center shadow bg-light rounded-4 text-center" style="padding: 30px;">
            <form action="{{ route('register') }}" method="post" style="width:300px;" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <input type="file" class="form-control g-col-6" id="formGroupExampleInput" placeholder="" name="gambar" value="">
                @error('gambar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label ">Nama User</label>
                <input type="text" class="form-control g-col-6" id="formGroupExampleInput" placeholder="Nama User" name="name" value="{{ old('name') }}" >
            </div>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Email</label>
                <input type="email" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Email" name="email" value="">
            </div>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Usia</label>
                <input type="text" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Usia" name="usia" value="">
            </div>
            @error('usia')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Alamat</label>
                <input type="text" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Alamat" name="alamat" value="">
            </div>
            @error('alamat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Telepon</label>
                <input type="number" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="Telepon" name="telepon" value="">
            </div>
            @error('telepon')
                <div class="text-danger">{{ $message }}</div>
            @enderror
             <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Password</label>
                <input type="password" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="" name="password" value="">
            </div>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control g-col-6" id="formGroupExampleInput2" placeholder="" name="password_confirmation" value="">
            </div>
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">REGISTER</button>
            </div>
         </form>
    </div>
</body>
</html>
