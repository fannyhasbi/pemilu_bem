<?php
require_once "function/function.php";
session_start();
if(!isset($_SESSION['status'])){
	echo "404 Not Found";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator Dashboard</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Dashboard Administrator</h1>
	<p>Username: <?php echo $_SESSION['username'];?> | Nama : <?php echo $_SESSION['nama_admin'];?></p>
	<ul>
		<li><a href="dashboard.php?data=sementara">Hasil sementara</a></li>
		<li><a href="dashboard.php?data=belum">Data belum memilih</a></li>
		<li><a href="dashboard.php?data=sudah">Data sudah memilih</a></li>
		<li><a href="dashboard.php?data=perhitungan">Perhitungan</a></li>
		<li><a href="dashboard.php?data=logout">Logout</a></li>
	</ul>

	<?php
	if(isset($_GET['data'])){
		define('LOGIN_ADMIN', TRUE); //Authorization pada folder include

		switch($_GET['data']){
			case 'sementara':
				include "include/sementara.php";
				break;

			case 'belum':
				include "include/belum_memilih.php";
				break;

			case 'sudah':
				include "include/sudah_memilih.php";
				break;

			case 'perhitungan':
				include "include/perhitungan.php";
				break;

			case 'logout':
				include "include/logout.php";
				break;

			default: echo "404 Not Found"; break;
		}
	}

	?>
</body>
</html>