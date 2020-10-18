<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Profile Image -->
                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <ol>
                            <li>
                                <b>Dashboard</b>
                                <p style="text-align:justify"> Halaman ini berfungsi sebagai tempat penampil grafik hasil dari peramalan yang sudah dilakukan sebelumnya. Pada bagian atas dari halaman dashboard adalah hasil 4 perhitungan terakhir yang ditampilkan dalam bentuk kesimpulan terkait dengan peningkatan maupun penurunan yang terjadi. Pada bagian bawah dari halaman dashboard terdapat grafik pertahun yang diambilkan dari 8 tahun terakhir peramalan.</p>
                            </li>
                            <li>
                                <b>Actual</b>
                                <p style="text-align:justify">Halaman ini berisi tentang data masa lalu berdasarkan data kemiskinan yang di dapat dari Badan Pusat Statistik. Data masa lalu ini akan berfungsi sebagai acuan dalam melakukan peramalan menggunakan metode <i>moving average</i>.</p>
                                <p style="text-align:justify">Dalam melakukan input data disini disediakan tombol untuk tambah data yang nantinya akan memunculkan form input data yang meliputi tahun, bulan dan jumlah.Pada saat memasukkan data tidak dapat dipungkiri bahwa akan membutuhkan sebuah fungsi untuk edit data. Form ini berfungsi untuk merevisi inputan yang salah atau berubah sesuai yang diinginkan. Sebagai salah satu fitur untuk menghilangkan data yang tidak diinginkan, disediakan sebuah tombol hapus pada setiap masing-masing data. Tombol hapus tersebut akan memberikan sebuah jendela konfirmasi apakah data tersebut benar-benar akan dihapus atau tidak.</p>
                            </li>
                            <li><b>Forecast</b>
                                <p style="text-align:justify">Proses peramalan dapat dilakukan pada halaman forecast ini. Sebelum melakukan proses perhitungan, pengguna di suruh untuk menginputkan periode dan tahun akhir. Periode yang dimaksud adalah rentang waktu yang akan digunakan dalam membuat rata-rata pada metode <i>moving average</i>. Sedangkan tahun akhir yang dikehendaki adalah tahun yang nantinya menjadi akhir dari perhitungan <i>moving average</i>.</p>
                                <p style="text-align:justify">Perhitungan yang telah dilakukan berdasarkan periode dan tahun akhir yang di inputkan akan menghasilkan peramalan data masa depan berdasarkan data aktual yang di hitung menggunakan metode moving average. Keluaran pada tabel berupa data tahun, bulan, jumlah, forecast, e, e^2 dan APE. Sedangkan hasil kesimpulan dari semua data tersebut disajikan di atas table. Hasil kesimpulan yang di tampilkan berupa SSE (sum Squared Error), MSE (Mean Squared Errror), RMSE (Root Mean Squared Error) dan MAPE (Mean Absolute Percentage Error).</p>
                            </li>
                            <li><b>User Account</b>
                                <p style="text-align:justify">Pengguna yang mencapat akses untuk halaman ini hanya pengguna dengan level Administrator. Pada halaman ini Administrator dapat menambah, mengubah dan menghapus pengguna lain. Hak akses untuk masing-masing pengguna berdasarkan levelnya adalah sebagaimana berikut:</p>
                                <ol type="a">
                                    <li>
                                        Administrator
                                        <p style="text-align:justify">Pengguna level ini mampu menggunakan seluruh akses aplikasi seperti : Home, Aktual, Forecast, User Account, Profil dan Logout.</p>
                                    </li>
                                    <li>
                                        Kepala
                                        <p style="text-align:justify">Pengguna dengan level ini berperan hanya sebagai pengawas atau melakukan proses peramalan. Akses yang didapat pada level ini adalah : home, forecast, profil dan logout.</p>
                                    </li>
                                    <li>
                                        Pegawai
                                        <p style="text-align:justify">Pengguna level pegawai berperan sebagai pengelola data aktual yang nantinya digunakan oleh pengguna dengan level kepala untuk melakukan suatu proses perhitungan peramalan dengan metode moving average. Akses yang didapat pada level ini adalah : home, aktual, profil dan logout. </p>
                                    </li>
                                </ol>
                            </li>
                            <li><b>Profil</b>
                                <p style="text-align:justify">
                                    Halaman ini berisi data lengkap tentang pengguna itu sendiri. Untuk dapat masuk pada halaman ini dapat melalui menu pada sidebar samping kiri atau dengan mengklik ikon nama dan gambar yang terdapat di samping kanan atas. Pada halaman ini pengguna dapat merubah data lengkap mereka sendiri maupun merubah password mereka.
                                </p>
                            </li>
                            <li><b>Logout</b>
                                <p style="text-align:justify">Selesai menggunakan aplikasi, alangkah lebih aman jika pengguna melakukan logout dari sistem supaya semua session yang ada terhapus. Sehingga orang lain yang tidak mempunyai kepentingan di dalamnya tidak bisa menggunakan aplikasi tersebut tanpa mempunyai username dan password yang berlaku.</p>
                            </li>
                            </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>