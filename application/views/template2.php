<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul; ?></title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/unugiri.png" type="image/png">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/dist/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">

    <script src="https://code.highcharts.com/highcharts.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view("include/navbar"); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("include/sidebar"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>home">Home</a></li>
                                <li class="breadcrumb-item active"><?= $judul; ?></li>
                            </ol>
                        </div><!-- /.col -->
                        <!-- Flash messages -->
                        <div class="col-md-12">
                            <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-success') ?>"></div>
                            <div class="flash-danger" data-flashdata="<?= $this->session->flashdata('flash-danger') ?>"></div>
                            <div class="flash-warning" data-flashdata="<?= $this->session->flashdata('flash-warning') ?>"></div>
                            <!-- <?php
                                    if ($this->session->flashdata('flash-success')) {
                                        echo '<br/>';
                                        echo '<p class="alert alert-success">' . $this->session->flashdata('flash-success') . '</p>';
                                    }
                                    if ($this->session->flashdata('flash-danger')) {
                                        echo '<br/>';
                                        echo '<p class="alert alert-danger">' . $this->session->flashdata('flash-danger') . '</p>';
                                    }
                                    if ($this->session->flashdata('flash-warning')) {
                                        echo '<br/>';
                                        echo '<p class="alert alert-warning">' . $this->session->flashdata('flash-warning') . '</p>';
                                    }
                                    ?> -->
                        </div>
                    </div><!-- /.row -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php $this->load->view($pages);
            ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view("include/footer.php"); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
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