<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0 font-weight-bold text-primary">Tabel Kemiskinan</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong">
                                <span class="nav-icon fas fa-plus"></span> <b>Tambah</b>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="70">No</th>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Jumlah</th>
                                    <th width="200">Action</th>
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
                                            <a class="btn btn-sm btn-warning btn-icon-split" style="color: white;" data-toggle="modal" data-target="#edit-data" onclick="select_data('<?= $dat['id_kemiskinan']; ?>','<?= $dat['tahun']; ?>','<?= $dat['semester']; ?>','<?= $dat['jumlah']; ?>');">
                                                <span class="icon text-white-55">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="<?= base_url(); ?>aktual/hapus/<?= $dat['id_kemiskinan']; ?>" class="btn btn-sm btn-danger btn-icon-split tombol-hapus">
                                                <span class="icon text-white-55">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- Modal Tambah -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url(); ?>aktual/simpan" method="post" enctype="multipart/form-data">
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
<!-- Modal Edit -->
<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url(); ?>aktual/simpan" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Kemiskinan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <input type="hidden" id="ubah_id_kemiskinan" name="ubah_id_kemiskinan">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input name="tahun" type="text" id="ubah_tahun" class="form-control" required id="tahun" placeholder="Tahun" value="">
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
                        <input name="jumlah" id="ubah_jumlah" type="text" class="form-control" required id="jumlah" placeholder="Jumlah">
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
<script type="text/javascript">
    function select_data($id, $tahun, $semester, $jumlah) {
        $('#ubah_id_kemiskinan').val($id);
        $('#ubah_tahun').val($tahun);
        $('#ubah_semester').val($semester);
        $('#ubah_jumlah').val($jumlah);
    }
</script>


<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/dist/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/dist/js/demo/datatables-demo.js"></script>