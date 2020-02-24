<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item mr-2">
        </li>
        <li class="nav-item mr-2">
            <a class="btn btn-success btn-sm" href="<?= base_url(); ?>user/profil">
                <i class="fas fa-user"></i> Profil
            </a>
        </li>
        <li class="nav-item">
            <a class="btn btn-danger btn-sm" href="<?= base_url(); ?>user/logout">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</nav>