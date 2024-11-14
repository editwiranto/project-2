<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (Session::has('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    <div class="mt-5" style="width: 400px; margin:0 auto;">
        <h1 class="text-center">LOGIN</h1>
        <form class="user" method="post" action="">
        @csrf
            <div class="card-body bg-white rounded shadow-lg p-3 mb-5 bg-body-tertiary text-center d-flex flex-column align-items-center">
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input type="email" class="form-control"
                        id="InputEmail" placeholder="Enter Email Address..." name="email">
                </div>

                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control"
                        id="InputPassword" name="password" placeholder="Password">
                </div>

                <div class="">
                    <button type="submit" class="btn btn-outline-primary mx-3">Login</button>
                    <a href="/register" class="btn btn-outline-danger">Register</a>
                </div>
            </div>
    </form>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
