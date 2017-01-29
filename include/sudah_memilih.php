<?php
defined("LOGIN_ADMIN") OR die("404 Not Found");

$q = "SELECT mahasiswa.NIM AS nim, mahasiswa.nama AS nama FROM mahasiswa WHERE mahasiswa.NIM IN (SELECT pemilih FROM suara) ORDER BY nim ASC";
$h = mysqli_query($koneksi,$q);
?>

	<table border="1px" cellspacing="0" cellpadding="5">
		<thead>
			<tr>
				<th>NIM</th>
				<th>Nama</th>
			</tr>
		</thead>
		<tbody>

	<?php while($r = mysqli_fetch_assoc($h)): ?>
			<tr>
				<td><?php echo $r['nim'];?></td>
				<td><?php echo $r['nama'];?></td>
			</tr>
	<?php endwhile; ?>

		</tbody>
	</table>