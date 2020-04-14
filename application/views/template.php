<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/unugiri.png" type="image/png">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/dist/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/fontawesome/css/all.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/dist/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- highchart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/dist/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/dist/vendor/jquery-easing/jquery.easing.min.js"></script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->


    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("include/sidebar"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("include/navbar"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-success') ?>"></div>
                    <div class="flash-danger" data-flashdata="<?= $this->session->flashdata('flash-danger') ?>"></div>
                    <div class="flash-warning" data-flashdata="<?= $this->session->flashdata('flash-warning') ?>"></div>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><b><?= $judul; ?></b></h1>
                        <ol class="breadcrumb px-5" style="background-color: white;">
                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>home">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $judul; ?></li>
                        </ol>
                    </div>

                    <!-- Page -->
                    <?php $this->load->view($pages); ?>
                    <!-- End Page -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <?php $this->load->view("include/footer"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/dist/js/sb-admin-2.min.js"></script>

    <!-- Sweet alert -->
    <script src="<?= base_url(); ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
</body>

</html>