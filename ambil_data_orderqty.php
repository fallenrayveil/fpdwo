<?php
include_once('koneksi.php');

// Query untuk mengambil data dari tabel fakta_penjualan
$query = "SELECT CONCAT(YEAR(tgllengkap), ' ', MONTHNAME(tgllengkap)) AS date, SUM(OrderQty) as orderqty
FROM fakta_penjualan fp 
JOIN dimensi_waktu dw ON dw.Date_ID = fp.Date_ID 
GROUP BY YEAR(tgllengkap), MONTH(tgllengkap);";

$result = mysqli_query($koneksi, $query);

// Simpan hasil query ke dalam array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Mengirim data dalam format JSON
echo json_encode($data);
?>