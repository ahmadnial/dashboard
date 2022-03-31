<?php include 'conn.php';

if (isset($_POST['cari'])) {
    $startDate = $_POST['start'];
    $endDate = $_POST['end'];


    $sql = "SELECT fs_kd_layanan,count (fs_kd_reg) from ta_registrasi where fd_tgl_masuk between
                                      '$startDate' and '$endDate' and fd_tgl_void='3000-01-01' Group by fs_kd_layanan";

    $query = sqlsrv_query($conn, $sql) or die(sqlsrv_errors());;
}

while ($data = sqlsrv_fetch_array($query)) {
    // $data1 = isset($data['fs_kd_layanan']) ? $data['fs_kd_layanan'] : '';
    // $data2 = isset($data['']) ? $data[''] : '';

?>
    <tr>
        <td class="text-muted"><?php echo $data['fs_kd_layanan']; ?></td>
        <td class="w-100 px-0">
            <div class="progress progress-md mx-4">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?php echo $data['']; ?>%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </td>
        <td>
            <h5 class="font-weight-bold mb-0"><?php echo $data['']; ?></h5>
        </td>
    </tr>
<?php } ?>