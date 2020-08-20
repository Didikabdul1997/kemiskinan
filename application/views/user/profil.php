<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-success card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <?php
              if ($user['foto'] != null) {
                $foto = $user['foto'];
              } else {
                $foto = "images.jpeg";
              }
              ?>
              <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>assets/uploads/foto/<?= $foto; ?>" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?= $user['nama']; ?></h3>
            <?php
            if ($user['jabatan'] == 1) {
              $jab = "Administrator";
            } else if ($user['jabatan'] == 2) {
              $jab = "Kepala";
            } else {
              $jab = "Pegawai";
            }
            ?>
            <p class="text-muted text-center"><b>Jabatan :</b> <?= $jab; ?></p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Ubah Profil Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= base_url(); ?>user/simpan" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id_user" value="<?= $this->session->userdata('user_id'); ?>">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input name="nama" value="<?= $data['nama']; ?>" type="text" class="form-control" required id="nama" placeholder="Masukkan Nama...">
              </div>
              <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <?php if ($user['jabatan'] == 1) {
                  $jab = "";
                } else {
                  $jab = "disabled";
                ?>
                  <input type="hidden" name="jabatan" value="<?= $data['jabatan']; ?>">
                <?php
                } ?>
                <select class="form-control" name="jabatan" <?= $jab; ?> id="ubah_jabatan">
                  <option value="3" <?php if ($data['jabatan'] == 3) : echo "selected";
                                    endif; ?>>Pegawai</option>
                  <option value="2" <?php if ($data['jabatan'] == 2) : echo "selected";
                                    endif; ?>>Kepala</option>
                  <option value="1" <?php if ($data['jabatan'] == 1) : echo "selected";
                                    endif; ?>>Administrator</option>
                </select>
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
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>