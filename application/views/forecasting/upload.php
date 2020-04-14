<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Data

                            <?php
                            if (!empty($message)) {
                                echo $message . "wkwkwk";
                            }
                            ?>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url(); ?>anggota/unggah" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="customFile">Foto</label>
                                <div class="custom-file">
                                    <input name="foto" type="file" class="custom-file-input" id="foto">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
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