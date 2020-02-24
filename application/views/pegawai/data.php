<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="text-primary">Tabel Pegawai Perpustakaan</h3>
                        </div>
                        <div class="col-md-2">
                            <?php if ($user['jabatan'] == "Kepala" or $user['jabatan'] == "Operator") : ?>
                                <a href="<?= base_url(); ?>pegawai/tambah" class="btn btn-success btn-block">
                                    <span class="nav-icon fas fa-plus tombol-tambah"></span> <b>Tambah</b>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="pegawai" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>
                                    Foto
                                </th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <?php if ($user['jabatan'] == "Kepala" or $user['jabatan'] == "Operator") : ?>
                                    <th width="125">Action</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($list_pegawai as $dat) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td>
                                        <?php if ($dat['foto'] != null) {
                                            $foto = $dat['foto'];
                                        } else {
                                            $foto = "images.jpeg";
                                        } ?>
                                        <img src="<?= base_url() . 'assets/uploads/foto/' . $foto; ?>" alt="Image Not Found" class="img-circle" width="50" height="auto">
                                    </td>
                                    <td><?= $dat['nama']; ?></td>
                                    <td><?= $dat['jabatan']; ?></td>
                                    <td><?php if ($dat['jk'] == 1) {
                                            echo "Laki-laki";
                                        } else {
                                            echo "Perempuan";
                                        }; ?></td>
                                    <td><?= $dat['tempat_lahir']; ?>, <?= $dat['tanggal_lahir']; ?></td>
                                    <td><?= $dat['alamat']; ?></td>
                                    <td><?= $dat['username']; ?></td>
                                    <?php if ($user['jabatan'] == "Kepala" or $user['jabatan'] == "Operator") : ?>
                                        <td>
                                            <a href="<?= base_url(); ?>pegawai/ubah/<?= $dat['id_user']; ?>" class="btn btn-warning btn-sm">
                                                <i class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url(); ?>pegawai/hapus/<?= $dat['id_user']; ?>" class="btn btn-danger btn-sm tombol-hapus" onclick="return confirm('Anda yakin hapus : <?= $dat['nama']; ?>');">
                                                <i class="nav-icon fas fa-trash"></i>
                                            </a>
                                        </td>
                                    <?php endif ?>
                                </tr>
                            <?php $i++;
                            endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function() {
        $("#pegawai").DataTable();
    });
</script>