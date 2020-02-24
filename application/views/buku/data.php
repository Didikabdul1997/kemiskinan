<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="text-primary">Tabel Buku Perpustakaan</h3>
                        </div>
                        <div class="col-md-2">
                            <a href="<?= base_url(); ?>buku/tambah" class="btn btn-success btn-block">
                                <span class="nav-icon fas fa-plus"></span> <b>Tambah</b>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabel" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>
                                    Foto
                                </th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Tempat Terbit</th>
                                <th width="125">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($list_buku as $dat) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td>
                                        <?php if ($dat['foto'] != null) {
                                                $foto = $dat['foto'];
                                            } else {
                                                $foto = "book.png";
                                            } ?>
                                        <img src="<?= base_url() . 'assets/uploads/book/' . $foto; ?>" alt="Image Not Found" width="50" height="auto">
                                    </td>
                                    <td><?= $dat['nama']; ?></td>
                                    <td><?= $dat['pengarang']; ?></td>
                                    <td><?= $dat['tahun_terbit']; ?></td>
                                    <td><?= $dat['tempat_terbit']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>buku/ubah/<?= $dat['id_buku']; ?>" class="btn btn-warning btn-sm">
                                            <i class="nav-icon fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url(); ?>buku/hapus/<?= $dat['id_buku']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin hapus : <?= $dat['nama']; ?>');">
                                            <i class="nav-icon fas fa-trash"></i>
                                        </a>
                                    </td>
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
        $("#tabel").DataTable();
    });
</script>