<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <!-- Modal Tambah -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <form action="<?= base_url(); ?>kemiskinan/simpan" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Input Data Kemiskinan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form start -->
                                            <div class="form-group">
                                                <label for="tahun">Tahun</label>
                                                <input name="tahun" type="text" class="form-control" required id="tahun" placeholder="Tahun" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Bulan</label>
                                                <select name="semester" class="form-control select2bs4" required style="width: 100%;">
                                                    <option value="1">Maret</option>
                                                    <option value="2">September</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah</label>
                                                <input name="jumlah" type="text" class="form-control" required id="jumlah" placeholder="Jumlah">
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
                            <h3 class="text-primary">Tabel Kemiskinan Perpustakaan</h3>
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
                                <th width="70">No</th>
                                <th>Tahun</th>
                                <th>Bulan</th>
                                <th>Jumlah</th>
                                <th width="125">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($list_kemiskinan as $dat) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $dat['tahun']; ?></td>
                                    <td><?php
                                        if ($dat['semester'] == '1') {
                                            echo "Maret";
                                        } else {
                                            echo "September";
                                        }
                                        ?></td>
                                    <td><?= $dat['jumlah']; ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data" onclick="select_data('<?= $dat['id_kemiskinan']; ?>','<?= $dat['tahun']; ?>','<?= $dat['semester']; ?>','<?= $dat['jumlah']; ?>');">
                                            <i class="nav-icon fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url(); ?>kemiskinan/hapus/<?= $dat['id_kemiskinan']; ?>" class="btn btn-danger btn-sm tombol-hapus">
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
                            <form action="<?= base_url(); ?>kemiskinan/simpan" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data kemiskinan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <div class="card-body">
                                            <input type="hidden" id="ubah_id_kemiskinan" name="id_kemiskinan">
                                            <div class="form-group">
                                                <label for="tahun">Tahun</label>
                                                <input name="tahun" type="text" class="form-control" required id="ubah_tahun" placeholder="Tahun" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Bulan</label>
                                                <select name="semester" id="ubah_semester" class="form-control select2bs4" required style="width: 100%;">
                                                    <option value="1">Maret</option>
                                                    <option value="2">September</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah</label>
                                                <input name="jumlah" type="text" class="form-control" required id="ubah_jumlah" placeholder="Jumlah">
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
    function select_data($id, $tahun, $semester, $jumlah) {
        $('#ubah_id_kemiskinan').val($id);
        $('#ubah_tahun').val($tahun);
        $('#ubah_semester').val($semester);
        $('#ubah_jumlah').val($jumlah);
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