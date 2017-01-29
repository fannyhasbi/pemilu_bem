<?php
require_once "function/function.php";
session_start();
if(isset($_SESSION['status'])){
	if($_SESSION['status'] == 'login_admin') header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(isset($_POST['login_admin'])){
		$username = $_POST['username'];
		$pass = $_POST['password'];
		$admin = new Admin;

		if($admin->cek_username($username, $pass)){
			$admin->login();
		} else echo "Username tidak terdaftar";

	} else {
	?>
	<form action="admin.php" method="post">
		<table>
			<tr>
				<td><label for="username">Username</label></td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login_admin" value="Login"></td>
			</tr>
		</table>
	</form>
	<?php
	} //end if
	?>
</body>
</html>