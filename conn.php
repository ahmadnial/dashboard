<?php
$Server      = '192.168.10.1';
//$Database = array("Database"=>"HOSPITAL");
//$username = 'sa';
//$password = 'b35mart1c5';
$connInfo = array("Database" => "HOSPITAL_TEST", "UID" => "sa", "PWD" => "b35mart1c5");
$conn      = sqlsrv_connect($Server, $connInfo);

// if ($conn) {
//     echo 'Koneksi Berhasil !';
// } else {
//     echo 'Koneksi gagal !';
//     die(print_r(sqlsrv_errors(), true));
// }


//echo '(<script>alert("Gagal tersambung dengan database.")</script>)';
