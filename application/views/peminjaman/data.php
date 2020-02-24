<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <!-- Modal Tambah -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <form action="<?= base_url(); ?>peminjaman/simpan" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Input Data Peminjaman</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form start -->
                                            <input type="hidden" name="status" value="1">
                                            <div class="form-group">
                                                <label>Judul Buku</label>
                                                <select name="buku" class="form-control select2bs4" style="width: 100%;">
                                                    <?php foreach ($list_buku as $buku) : ?>
                                                        <option value="<?= $buku['id_buku']; ?>">
                                                            <?= $buku['nama'] . " | <span class='text-danger'>" . $buku['tahun_terbit'] . " | " . $buku['pengarang'] . "</span>"; ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Peminjam</label>
                                                <select name="peminjam" class="form-control select2bs4" style="width: 100%;">
                                                    <?php foreach ($list_anggota as $data) : ?>
                                                        <option value="<?= $data['id_anggota']; ?>">
                                                            <?= $data['nama']; ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                                <input name="tanggal_pinjam" type="text" class="form-control" required id="tanggal_peminjam" placeholder="dd/mm/yyyy" value="<?= date('d/m/Y'); ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="text-primary">Tabel Peminjaman Perpustakaan</h3>
                        </div>
                        <div class="col-md-2 text-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong">
                                <span class="nav-icon fas fa-plus"></span> <b>Tambah</b>
                            </button>
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
                                <th>Peminjam</th>
                                <th>Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th width="125">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($list_peminjaman as $dat) : ?>
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
                                    <td><?= $dat['peminjam']; ?></td>
                                    <td><?= $dat['buku']; ?></td>
                                    <td><?= $dat['tanggal_pinjam']; ?></td>
                                    <td><?= $dat['tanggal_kembali']; ?></td>
                                    <td>
                                        <?php if ($dat['status'] == '1') { ?>
                                            <a href="<?= base_url(); ?>peminjaman/kembalikan/<?= $dat['id_peminjaman']; ?>" class="btn btn-danger btn-sm">
                                                <span class="nav-icon fas fa-atlas"></span> <b>Dipinjam</b>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url(); ?>peminjaman/pinjam/<?= $dat['id_peminjaman']; ?>" class="btn btn-success btn-sm">
                                                <span class="nav-icon fas fa-eye"></span> <b>Dikembalikan</b>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data" onclick="select_data('<?= $dat['id_peminjaman']; ?>','<?= $dat['id_anggota']; ?>','<?= $dat['id_buku']; ?>','<?= $dat['tanggal_pinjam']; ?>','<?= $dat['tanggal_kembali']; ?>','<?= $dat['status']; ?>');">
                                            <i class="nav-icon fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url(); ?>peminjaman/hapus/<?= $dat['id_peminjaman']; ?>" class="btn btn-danger btn-sm tombol-hapus">
                                            <i class="nav-icon fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach ?>
                        </tbody>
                    </table>
                    <!-- Modal Ubah -->
                    <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <form action="<?= base_url(); ?>peminjaman/simpan" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Input Data Peminjaman</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <div class="card-body">
                                            <input type="hidden" id="ubah_id_peminjaman" name="id_peminjaman">
                                            <div class="form-group">
                                                <label>Judul Buku</label>
                                                <select name="buku" id="buku" class="form-control select2bs4" style="width: 100%;">
                                                    <?php foreach ($list_buku as $buku) : ?>
                                                        <option value="<?= $buku['id_buku']; ?>">
                                                            <?= $buku['nama'] . " | <span class='text-danger'>" . $buku['tahun_terbit'] . " | " . $buku['pengarang'] . "</span>"; ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Peminjam</label>
                                                <select name="peminjam" id="peminjam" class="form-control select2bs4" style="width: 100%;">
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
                                                <input name="tanggal_pinjam" type="text" class="form-control" required id="ubah_tanggal_pinjam" placeholder="dd/mm/yyyy">
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_kembali">Tanggal Kembali</label>
                                                <input name="tanggal_kembali" type="text" class="form-control" id="ubah_tanggal_kembali" placeholder="dd/mm/yyyy">
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="status" class="form-control select2bs4" style="width: 100%;">
                                                    <option value="1">Dipinjam</option>
                                                    <option value="2">Dikembalikan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<script>
    function select_data($id, $peminjam, $buku, $pinjam, $kembali, $status) {
        $('#ubah_id_peminjaman').val($id);
        $('#peminjam').val($peminjam);
        $('#buku').val($buku);
        $('#ubah_tanggal_pinjam').val($pinjam);
        $('#ubah_tanggal_kembali').val($kembali);
        $('#status').val($status);
    }
</script>
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