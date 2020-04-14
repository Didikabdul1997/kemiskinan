<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIP<sub style="font-size: 12px">era</sub>K</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  <?php if ($active == "dashboard") {
                                echo "active";
                            } ?>">
        <a class="nav-link" href="<?= base_url(); ?>home">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Peramalan
    </div>

    <li class="nav-item <?php if ($active == "aktual") {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url(); ?>aktual">
            <i class="fas fa-align-left"></i>
            <span>Actual</span></a>
    </li>

    <li class="nav-item <?php if ($active == "forecasting") {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url(); ?>forecasting">
            <i class="fas fa-chart-bar"></i>
            <span>Forecast</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sistem
    </div>

    <li class="nav-item <?php if ($active == "akun") {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url(); ?>akun">
            <i class="fas fa-user-friends"></i>
            <span>User Account</span></a>
    </li>

    <li class="nav-item <?php if ($active == "profil") {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url(); ?>user/profil">
            <i class="fas fa-user-cog"></i>
            <span>Profil</span></a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>user/logout">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>