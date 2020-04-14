<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="text-primary">Tabel Akun</h3>
                        </div>
                        <div class="col-md-2 text-right">
                            <?php if ($user['jabatan'] == "Kepala" or $user['jabatan'] == "Operator") : ?>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
                                    <span class="nav-icon fas fa-plus"></span> <b>Tambah</b>
                                </button>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="akun" class="table table-bordered table-striped">
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
                                    <th width="100">Action</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($list_akun as $dat) : ?>
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
                                            <a class="btn btn-sm btn-warning btn-icon-split" style="color: white;" data-toggle="modal" data-target="#modal-edit" onclick="select_data('<?= $dat['id_user']; ?>','<?= $dat['nama']; ?>','<?= $dat['jabatan']; ?>','<?= $dat['jk']; ?>','<?= $dat['tempat_lahir']; ?>','<?= $dat['tanggal_lahir']; ?>','<?= $dat['alamat']; ?>','<?= $dat['username']; ?>','<?= $dat['password']; ?>');">
                                                <span class="icon text-white-55">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="<?= base_url(); ?>akun/hapus/<?= $dat['id_user']; ?>" class="btn btn-sm btn-danger mt-1 btn-icon-split tombol-hapus">
                                                <span class="icon text-white-55">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
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
<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url(); ?>akun/simpan" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_user" id="ubah_id_user">
                    <div class="form-group">
                        <label for="ubah_nama">Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" required id="ubah_nama" placeholder="Masukkan Nama...">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="ubah_jk">
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ubah_jabatan">Jabatan</label>
                        <input name="jabatan" type="text" class="form-control" required id="ubah_jabatan" placeholder="Jabatan...">
                    </div>
                    <div class="form-group">
                        <label for="ubah_tempat_lahir">Tempat Lahir</label>
                        <input name="tempat_lahir" type="text" class="form-control" id="ubah_tempat_lahir" placeholder="Masukkan Tempat Lahir...">
                    </div>
                    <div class="form-group">
                        <label for="ubah_tanggal_lahir">Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="text" class="form-control" id="ubah_tanggal_lahir" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="form-group">
                        <label for="ubah_alamat">Alamat</label>
                        <textarea name="alamat" id="ubah_alamat" class="form-control" rows="3" placeholder="Alamat ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ubah_username">Username</label>
                        <input name="username" type="text" class="form-control" id="ubah_username" placeholder="Username...">
                    </div>
                    <div class="form-group">
                        <label for="ubah_password">Password</label>
                        <input name="password" type="password" class="form-control" id="ubah_password" placeholder="Password...">
                    </div>
                    <div class="form-group">
                        <label for="ubah_foto">Foto</label>
                        <div class="custom-file">
                            <input name="foto" type="file" class="custom-file-input" id="ubah_foto">
                            <label class="custom-file-label" for="foto">Choose file</label>
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

<script type="text/javascript">
    function select_data($id, $nama, $jabatan, $jk, $tempat_lahir, $tanggal_lahir, $alamat, $username, $password) {
        $('#ubah_id_user').val($id);
        $('#ubah_nama').val($nama);
        $('#ubah_jabatan').val($jabatan);
        $('#ubah_jk').val($jk);
        $('#ubah_tempat_lahir').val($tempat_lahir);
        $('#ubah_tanggal_lahir').val($tanggal_lahir);
        $('#ubah_alamat').val($alamat);
        $('#ubah_username').val($username);
        $('#ubah_password').val($password);
    }
</script>
<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url(); ?>akun/simpan" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Input Data Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" required id="nama" placeholder="Masukkan Nama...">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input name="jabatan" type="text" class="form-control" required id="jabatan" placeholder="Jabatan...">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir...">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="text" class="form-control" id="tanggal_lahir" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" id="username" placeholder="Username...">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password...">
                    </div>
                    <div class="form-group">
                        <label for="customFile">Foto</label>
                        <div class="custom-file">
                            <input name="foto" type="file" class="custom-file-input" id="foto">
                            <label class="custom-file-label" for="foto">Choose file</label>
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

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/dist/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/dist/js/demo/datatables-demo.js"></script>