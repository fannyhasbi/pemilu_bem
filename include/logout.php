<?php
date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y-m-d H:i:s');

$query = "UPDATE admin SET last_seen = '". $waktu ."' WHERE username = '". $_SESSION['username'] ."'";

if(mysqli_query($koneksi,$query)){
	session_destroy();
	header("Location: admin.php");
} else {
	echo "Gagal logout";
}
?>