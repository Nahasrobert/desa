<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Admin</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="admin/assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>

<!-- [ auth-signin ] start -->

<body>
    <div class="auth-wrapper">
        <div class="auth-content text-center">
            <img src="admin/assets/images/logo.png" alt="" class="img-fluid mb-4">
            <div class="card borderless">
                <div class="row align-items-center ">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="mb-3 f-w-400">Login Admin</h4>
                            <hr>

                            <form action="{{ route('adminLoginPost') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email address" required>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        required>
                                </div>
                                <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Save credentials.</label>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary mb-4">Login</button>
                                <hr>
                                {{-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html"
                                        class="f-w-400">Reset</a></p>
                                <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ auth-signin ] end -->

    <!-- Required Js -->
    <script src="admin/assets/js/vendor-all.min.js"></script>
    <script src="admin/assets/js/plugins/bootstrap.min.js"></script>
    <script src="admin/assets/js/pcoded.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script>
        @if (session('error'))
            swal({
                title: "Error!",
                text: "{{ session('error') }}",
                type: "error",
                confirmButtonText: "OK"
            });
        @endif
        @if (session('success'))
            <
            script >
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }); <
            />
        @endif
    </script>
</body>

</html>
