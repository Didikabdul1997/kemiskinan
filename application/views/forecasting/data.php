<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-0 font-weight-bold text-primary">Peramalan Kemiskinan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <input name="periode" type="text" class="form-control" required id="periode" placeholder="Periode">
                        </div>
                        <div class="col-md-2">
                            <input name="tahunakhir" type="text" class="form-control" required id="tahunakhir" placeholder="Tahun Akhir">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success" id="proses">
                                <span class="nav-icon fas fa-chart-area"></span> <b>Process</b>
                            </button>
                        </div>
                    </div>
                    <div class="row col-md-7 mt-3" id="hasil">

                    </div>
                    <div class="row col mt-3">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="forecast_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="70">No</th>
                                        <th>Tahun</th>
                                        <th>Bulan</th>
                                        <th>Jumlah</th>
                                        <th>Forecast</th>
                                        <th>E</th>
                                        <th>E^2</th>
                                        <th>APE</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('#forecast_table').dataTable();
        tabel_forecast();
    });

    $('#proses').on('click', function() {
        tabel_forecast();
    });

    function load_hasil() {
        var periode = $("#periode").val();
        var tahunakhir = $("#tahunakhir").val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>forecasting/get_hasil',
            async: true,
            data: {
                periode: periode,
                tahunakhir: tahunakhir
            },
            dataType: 'json',
            success: function(data) {
                $('#periode').val(data.periode);
                $('#tahunakhir').val(data.tahunakhir);
                var html = `
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Hasil</th>
                                        <th></th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>SSE</td>
                                        <td>:</td>
                                        <td>` + data.sse + `</td>
                                        <td>(Sum Squared Error)</td>
                                    </tr>
                                    <tr>
                                        <td>MSE</td>
                                        <td>:</td>
                                        <td>` + data.mse + `</td>
                                        <td>(Mean Squared Error)</td>
                                    </tr>
                                    <tr>
                                        <td>RMSE</td>
                                        <td>:</td>
                                        <td>` + data.rmse + `</td>
                                        <td>(Root Mean Squared Error)</td>
                                    </tr>
                                    <tr>
                                        <td>MAPE</td>
                                        <td>:</td>
                                        <td>` + data.mape + ` %</td>
                                        <td>(Mean Absolute Percentage Error)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `;
                $('#hasil').html(html);
            }
        });
    }

    // Load table
    function tabel_forecast() {
        $('#forecast_table').DataTable().clear().destroy();
        $('#hasil').html('');
        var periode = $("#periode").val();
        var tahunakhir = $("#tahunakhir").val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>forecasting/get_tb_forecast',
            async: true,
            data: {
                periode: periode,
                tahunakhir: tahunakhir
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    if (data[i].semester == 1) {
                        semester = "Maret";
                    } else {
                        semester = "September";
                    }
                    if (data[i].ape != null) {
                        ape = data[i].ape + " %";
                    } else {
                        ape = data[i].ape;
                    }
                    html += '<tr>' +
                        '<td class="text-center">' + (i + 1) + '</td>' +
                        '<td>' + data[i].tahun + '</td>' +
                        '<td>' + semester + '</td>' +
                        '<td>' + data[i].jumlah + '</td>' +
                        '<td>' + data[i].forecast + '</td>' +
                        '<td>' + data[i].e + '</td>' +
                        '<td>' + data[i].e2 + '</td>' +
                        '<td>' + ape + '</td>' +
                        '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);
                $('#forecast_table').dataTable();
                load_hasil();
            }
        });
    }
</script>


<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/dist/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/dist/js/demo/datatables-demo.js"></script>