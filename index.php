<?php
require_once "function/function.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(isset($_SESSION['status'])){
		if($_SESSION['status'] == 'login'){
			header("Location: pemilu.php");
		}
	}

	if(isset($_POST['login'])){
		$form = new User;

		if($form->cek_nim($_POST['nim'])){
			if($form->login($_POST['password'], TRUE)){
				if($form->sudah_memilih()){
					$form->login($_POST['password']);
				}
			}
		} else echo "NIM tidak terdaftar";
	} else {
	?>
	<form method="POST" action="index.php">
		<table>
			<tr>
				<td><label for="NIM">NIM</label></td>
				<td><input type="text" name="nim"></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>
	</form>
	<?php
	} //end if
	?>
	
</body>
</html>