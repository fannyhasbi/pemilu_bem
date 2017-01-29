<?php
require_once "function/function.php";
session_start();
if(!isset($_SESSION['status'])){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pemilu BEM 2017</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>Selamat datang, <?php echo $_SESSION['nama'];?></h2>
	
	<form action="suara.php" method="post">
		<input type="radio" name="kandidat" value="10" required> Dinda Usada<br>
		<input type="radio" name="kandidat" value="20"> Surya Winarsih<br>
		<input type="radio" name="kandidat" value="25"> Jaswadi Pranowo<br>
		<input type="submit" name="pilih" value="Pilih">
	</form>

	<a href="logout.php">Logout</a>

</body>
</html>