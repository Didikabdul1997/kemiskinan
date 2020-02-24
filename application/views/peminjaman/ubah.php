<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Data Peminjaman</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url(); ?>peminjaman/simpan" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="id_peminjaman" value="<?= $data['id_peminjaman']; ?>">
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <select name="buku" class="form-control select2bs4" style="width: 100%;">
                                    <?php foreach ($list_buku as $buku) : ?>
                                        <option value="<?= $buku['id_buku']; ?>" <?php if ($buku['id_buku'] == $data['id_buku']) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                            <?= $buku['nama'] . " | <span class='text-danger'>" . $buku['tahun_terbit'] . " | " . $buku['pengarang'] . "</span>"; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Peminjam</label>
                                <select name="peminjam" class="form-control select2bs4" style="width: 100%;">
                                    <?php foreach ($list_anggota as $anggota) : ?>
                                        <option value="<?= $anggota['id_anggota']; ?>" <?php if ($anggota['id_anggota'] == $data['id_anggota']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                            <?= $anggota['nama']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <input value="<?= $data['tanggal_pinjam']; ?>" name="tanggal_pinjam" type="text" class="form-control" required id="tanggal_pinjam" placeholder="dd/mm/yyyy">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kembali">Tanggal Kembali</label>
                                <input value="<?= $data['tanggal_kembali']; ?>" name="tanggal_kembali" type="text" class="form-control" id="tanggal_kembali" placeholder="dd/mm/yyyy">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control select2bs4" style="width: 100%;">
                                    <?php if ($data['status'] != "2") {
                                        $dipinjam = "selected";
                                        $dikembalikan = "";
                                    } else {
                                        $dikembalikan = "selected";
                                        $dipinjam = "";
                                    } ?>
                                    <option value="1" <?= $dipinjam; ?>>Dipinjam</option>
                                    <option value="2" <?= $dikembalikan; ?>>Dikembalikan</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                        </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Page script -->
<script>
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>