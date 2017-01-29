<?php
defined('LOGIN_ADMIN') OR die("404 Not Found");

$q = "SELECT kandidat.nama AS kandidat, count(suara.id_suara) AS jumlah_suara FROM kandidat LEFT OUTER JOIN suara ON kandidat.NIM = suara.memilih GROUP BY kandidat";
$h = mysqli_query($koneksi,$q);
?>

	<table border="1px" cellspacing="0" cellpadding="5">
		<thead>
			<tr>
				<th>Nama Kandidat</th>
				<th>Hasil Suara</th>
			</tr>
		</thead>
		<tbody>

	<?php while($r = mysqli_fetch_assoc($h)): ?>
			
			<tr>
				<td><?php echo $r['kandidat'];?></td>
				<td><?php echo $r['jumlah_suara'];?></td>
			</tr>
	<?php endwhile; ?>

		</tbody>
	</table>