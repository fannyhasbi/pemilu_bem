<?php
$koneksi = mysqli_connect("localhost","root","","pemilu_bem") OR die(mysql_error());

class User {
	public $nim;

	public function cek_nim($nim){
		global $koneksi;
		$nim = (int)$nim; //mengubah string menjadi int
		$nim = mysqli_real_escape_string($koneksi,$nim);
		$this->nim = $nim;

		$q = "SELECT * FROM mahasiswa WHERE nim = $nim";
		if(mysqli_num_rows(mysqli_query($koneksi,$q)) > 0){
			return true;
		} else return false;
	}

	public function sudah_memilih(){
		global $koneksi;

		$query = "SELECT pemilih, DATE_FORMAT(waktu, '%d-%m-%Y pukul %H.%i') AS waktu FROM suara WHERE pemilih = $this->nim";
		$hasil = mysqli_query($koneksi,$query);
		$row   = mysqli_fetch_assoc($hasil);

		if(mysqli_num_rows($hasil) > 0){
			echo "NIM ". $this->nim ." sudah memilih sebelumnya pada ". $row['waktu'];
		} else 
		return true;
	}

	public function login($pass, $cek = FALSE){
		global $koneksi;
		$pass = mysqli_real_escape_string($koneksi,$pass);

		$query = "SELECT * FROM mahasiswa WHERE nim = $this->nim AND password = '$pass'";
		$hasil = mysqli_query($koneksi,$query);
		$row = mysqli_fetch_assoc($hasil);

		if($this->nim == $row['NIM'] && $pass == $row['password']){
			if($cek == TRUE){
				return true;
			} else {
				$_SESSION['status'] = 'login';
				$_SESSION['nim'] = $row['NIM'];
				$_SESSION['nama'] = $row['nama'];
				header("Location: pemilu.php");
			}
		} else {
			echo "Username dan password salah";
		}	
	}
}

class Admin {
	public $username;
	public $pass;

	public function cek_username($username,$pass){
		global $koneksi;
		$this->username = mysqli_real_escape_string($koneksi,$username);
		$this->pass = md5(mysqli_real_escape_string($koneksi,$pass));

		$q = "SELECT * FROM admin WHERE username = '$this->username'";
		$h = mysqli_query($koneksi,$q);

		if(mysqli_num_rows($h) > 0){
			return true;
		} else return false;
	}

	public function login(){
		global $koneksi;

		$q = "SELECT * FROM admin WHERE username = '$this->username' AND password = '$this->pass'";
		$h = mysqli_query($koneksi,$q);

		if(mysqli_num_rows($h) > 0){
			$row = mysqli_fetch_assoc($h);
			$_SESSION['status'] = 'login_admin';
			$_SESSION['username'] = $row['username'];
			$_SESSION['nama_admin'] = $row['nama'];
			header("Location: dashboard.php");
		} else {
			echo "Username dan password salah";
		}
	}
}