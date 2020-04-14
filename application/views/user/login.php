<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/unugiri.png" type="image/png">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/dist/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-4">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="flash-danger" data-flashdata="<?= $this->session->flashdata('flash-danger') ?>"></div>
                                <div class="flash-warning" data-flashdata="<?= $this->session->flashdata('flash-warning') ?>"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <p class="text-center">
                                            <img class="mr-3" src="<?= base_url(); ?>assets/images/unugiri.png" height="150" width="150" alt="">
                                        </p>
                                        <h1 class="h3 text-gray-900 mb-4">FORECASTING</h1>
                                        <h1 class="h4 text-gray-900 mb-4">ANGKA KEMISKINAN INDONESIA</h1>
                                        <br>
                                        <p class="text-center" style="font-size: 18px;">
                                            Silahkan Login !!
                                        </p>
                                    </div>
                                    <form class="user" action="<?= base_url(); ?>user/signin" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center" style="font-size: 15px;">
                                        Teknik Informatika
                                    </div>
                                    <div class="text-center" style="font-size: 13px;">
                                        Universitas Nahdlatul Ulama Sunan Giri Bojonegoro
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/dist/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/dist/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/dist/js/sb-admin-2.min.js"></script>


    <!-- Sweet alert -->
    <script src="<?= base_url(); ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>

</body>

</html>