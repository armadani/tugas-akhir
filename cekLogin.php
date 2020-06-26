<?php  

	include "koneksi.php";

	$username = $_POST['txtUser'];
	$password = $_POST['txtPassword'];

	$query = "SELECT * FROM tbl_admin WHERE Username = '$username' && Password = '$password'";
	$result = mysqli_query($koneksi, $query);
	$data = mysqli_fetch_array($result);
	
	if ($data > 0) {
		session_start();
		$_SESSION['Nama'] = $data['Nama'];

		header("location:media.php?page=home");
	}else{
		header("location:index.php");
	}

?>