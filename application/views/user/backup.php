<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <?php
            // if ($this->session->flashdata('flash-danger')) {
            //     echo '<p class="alert alert-danger text-center">' . $this->session->flashdata('flash-danger') . '</p>';
            // }
            // if ($this->session->flashdata('flash-warning')) {
            //     echo '<p class="alert alert-warning text-center">' . $this->session->flashdata('flash-warning') . '</p>';
            // }
            ?>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg text-center">
                    <p class="text-center">
                        <img class="mr-3" src="<?= base_url(); ?>assets/images/unugiri.png" height="150" width="150" alt="">
                    </p>

                    <h2 class="text-center">FORECASTING</h2>
                    <h3 class="text-center">ANGKA KEMISKINAN DI INDONESIA<h3>
                </p>
                <br>
                <p class="text-center" style="font-size: 18px;">
                    Silahkan Login !!
                </p>
                <form action="<?= base_url(); ?>user/signin" method="post">
                    <div class="input-group mb-3">
                        <input required type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input required type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block btn-flat">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>



</body>