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
                    <form action="<?= base_url(); ?>buku/simpan" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="id_buku" value="<?= $data['id_buku']; ?>">
                            <div class="form-group">
                                <label for="nama">Judul Buku</label>
                                <input name="nama" value="<?= $data['nama']; ?>" type="text" class="form-control" required id="nama" placeholder="Masukkan Nama...">
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input name="pengarang" value="<?= $data['pengarang']; ?>" type="text" class="form-control" required id="nama" placeholder="Pengarang...">
                            </div>
                            <div class="form-group">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input name="tahun_terbit" value="<?= $data['tahun_terbit']; ?>" type="text" class="form-control" id="tahun_terbit" placeholder="Tahun Terbit...">
                            </div>
                            <div class="form-group">
                                <label for="tempat_terbit">Tempat Terbit</label>
                                <input value="<?= $data['tempat_terbit']; ?>" name="tempat_terbit" type="text" class="form-control" id="tempat_terbit" placeholder="Tempat Terbit...">
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