<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>home" class="brand-link">
        <img src="<?= base_url(); ?>assets/images/forecasting.jpg" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>FORECASTING</b> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                if ($user['foto'] != null) {
                    $foto = $user['foto'];
                } else {
                    $foto = "images.jpeg";
                }
                ?>
                <img src="<?= base_url(); ?>assets/uploads/foto/<?= $foto; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['nama']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= base_url(); ?>home" class="nav-link <?php if ($active == "dashboard") {
                                                                            echo "active";
                                                                        } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>kemiskinan" class="nav-link <?php if ($active == "kemiskinan") {
                                                                                echo "active";
                                                                            } ?>">
                        <i class="nav-icon fas fa-atlas"></i>
                        <p>
                            Kemiskinan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>forecasting" class="nav-link <?php if ($active == "forecasting") {
                                                                                echo "active";
                                                                            } ?>">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Forecasting
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>pegawai" class="nav-link <?php if ($active == "pegawai") {
                                                                            echo "active";
                                                                        } ?>">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            User Account
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>user/profil" class="nav-link <?php if ($active == "profil") {
                                                                                echo "active";
                                                                            } ?>">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>user/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>