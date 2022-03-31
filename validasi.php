<?php
                            // panggil file koneksi
                            include "conn.php";

                            //validasi tombol date picker
                            if (isset($_POST['gass'])) {
                              $startDate = $_POST['start'];
                              $endDate = $_POST['end'];
                              $sql = "SELECT fs_kd_reg,fd_tgl_masuk,fs_kd_petugas,fs_mr,fs_kd_layanan,fs_kd_tipe_jaminan,fs_kd_layanan_akhir,fs_kd_medis 
                            from TA_REGISTRASI where FD_TGL_MASUK between '$startDate' and '$endDate' and FS_KD_LAYANAN ='IGD01' ";
                              $no = 1;
                              //eksekusi query menampilkan data dari tabel
                              $query = sqlsrv_query($conn, $sql) or die(sqlsrv_errors());;