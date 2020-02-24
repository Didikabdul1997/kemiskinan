<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url(); ?>pegawai/simpan" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="id_pegawai" value="<?= $data['id_pegawai']; ?>">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input name="nama" value="<?= $data['nama']; ?>" type="text" class="form-control" required id="nama" placeholder="Masukkan Nama...">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input name="jabatan" value="<?= $data['jabatan']; ?>" type="text" class="form-control" required id="nama" placeholder="Jabatan...">
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" name="jk">
                                    <option value="1" <?php if ($data['jk'] == 1) {
                                                            echo "selected";
                                                        } ?>>Laki-laki</option>
                                    <option value="2" <?php if ($data['jk'] == 2) {
                                                            echo "selected";
                                                        } ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input name="tempat_lahir" value="<?= $data['tempat_lahir']; ?>" type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir...">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input value="<?= $data['tanggal_lahir']; ?>" name="tanggal_lahir" type="text" class="form-control" id="tanggal_lahir" placeholder="dd/mm/yyyy">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat ..."><?= $data['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input value="<?= $data['username']; ?>" name="username" type="text" class="form-control" id="username" placeholder="Username...">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input value="<?= $data['password']; ?>" name="password" type="password" class="form-control" id="password" placeholder="Password...">
                            </div>
                            <div class="form-group">
                                <label for="customFile">Foto</label>
                                <div class="custom-file">
                                    <input name="foto" type="file" class="custom-file-input" id="foto">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input type="submit" class="btn btn-warning" name="submit" value="Simpan">
                        </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>