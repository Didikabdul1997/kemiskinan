<div class="row">
    <?php
    $jumlah_old = 0;
    ?>
    <?php foreach ($dashboard as $d) : ?>
        <?php
        if ($jumlah_old == 0) {
            $jumlah_old = $d['jumlah'];
            continue;
        }
        if ($jumlah_old < $d['jumlah']) {
            $ket = "Naik";
            $warna = "danger";
            $icon = "up";
        } else {
            $ket = "Turun";
            $warna = "success";
            $icon = "down";
        }
        $selisih = $jumlah_old - $d['jumlah'];
        $selisih = abs(round($selisih / $d['jumlah'] * 100, 3));
        $jumlah_old = $d['jumlah'];
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-<?= $warna; ?> shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 font-weight-bold text-<?= $warna; ?> text-uppercase mb-2"><?= $ket; ?></div>
                            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $d['tahun']; ?> (<?php if ($d['semester'] == 1) {
                                                                                                            echo "Maret";
                                                                                                        } else {
                                                                                                            echo "September";
                                                                                                        } ?>)</div>
                            <div class="h6 mb-0">
                                <?= number_format($d['jumlah'], 0, ',', '.'); ?>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="h5 mb-2 font-weight-bold text-gray-700"><?= $selisih; ?> %</div>
                            <i class="fas fa-angle-double-<?= $icon; ?> fa-3x text-<?= $warna; ?>"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<!-- Grafik -->

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-12">
        <div id="container" class="p-2">

        </div>
    </div>
</div>

<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Peramalan Kemiskinan'
        },
        subtitle: {
            text: '<i>Metode : Moving Average</i>'
        },
        credits: {
            text: 'Teknik Informatika Unugiri'
        },
        xAxis: {
            categories: [
                <?php foreach ($grafik['tahun'] as $tah) : ?> "<?= $tah['tahun']; ?>",
                <?php endforeach; ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (Jiwa)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Maret',
            data: [
                <?php foreach ($grafik['maret'] as $mar) : ?>
                    <?= $mar['jumlah']; ?>,
                <?php endforeach; ?>
            ]

        }, {
            name: 'September',
            data: [
                <?php foreach ($grafik['september'] as $mar) : ?>
                    <?= $mar['jumlah']; ?>,
                <?php endforeach; ?>
            ]

        }]
    });
</script>