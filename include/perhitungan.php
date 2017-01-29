<?php
defined("LOGIN_ADMIN") OR die("404 Not Found");

$query = "SELECT count(mahasiswa.nim) AS jumlah_mhs, (SELECT count(mahasiswa.nim) FROM mahasiswa WHERE mahasiswa.nim not IN (SELECT suara.pemilih FROM suara)) AS belum_memilih, (SELECT count(mahasiswa.nim) FROM mahasiswa WHERE mahasiswa.nim IN (SELECT suara.pemilih FROM suara)) AS sudah_memilih FROM mahasiswa";
$hasil = mysqli_query($koneksi,$query);
$row = mysqli_fetch_assoc($hasil);

?>

	<table border="1px" cellspacing="0" cellpadding="5">
		<thead>
			<tr>
				<th>Jumlah Mahasiswa</th>
				<th>Belum Memilih</th>
				<th>Sudah Memilih</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $row['jumlah_mhs'];?></td>
				<td><a href="dashboard.php?data=belum"><?php echo $row['belum_memilih'];?><a href="dashboard.php?data=belum"></td>
				<td><a href="dashboard.php?data=sudah"><?php echo $row['sudah_memilih'];?></a></td>
			</tr>
		</tbody>
	</table>