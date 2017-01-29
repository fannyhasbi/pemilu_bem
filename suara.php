<?php
require_once "function/function.php";
session_start();

if(isset($_SESSION['status'])){
	if($_SESSION['status'] == 'login'){
		if(!isset($_POST['pilih'])){
			echo "Anda belum memilih";
		}
		else {
			$nim = $_SESSION['nim'];
			$pilihan = $_POST['kandidat'];
			
			//Waktu
			date_default_timezone_set('Asia/Jakarta');
			$waktu = date('Y-m-d H:i:s');

			$query = "INSERT INTO suara (pemilih, memilih, waktu) VALUES ($nim, $pilihan, '$waktu')";

			if(mysqli_query($koneksi,$query)){
				echo "Pemilihan berhasil, terima kasih ". $_SESSION['nama'];
			} else {
				echo "Kegagalan sistem";
			}

			echo "<br>";
			echo "<a href='index.php'>Pilih lagi</a>";

			session_destroy();
		}
	} else header("Location: index.php");
} else header("Location: index.php");
