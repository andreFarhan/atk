<?php 

	include 'functions.php';

	if (isset($_POST['submit'])) {
		$nama_user = ucwords(strtolower($_POST['nama_user']));
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$role = $_POST['role'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");

		if (mysqli_fetch_assoc($result)) {
			setAlert('Gagal!','Username Telah Digunakan','error');
			header("Location: registrasi.php");
			die;
		}
		if ($password !== $password2) {
			setAlert('Gagal!','Konfirmasi Password Salah','error');
			header("Location: registrasi.php");
			die;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO tb_user VALUES('','$nama_user','$username','$password','$role')";
		$eksekusi = mysqli_query($koneksi, $sql);
		if ($eksekusi) {
			setAlert('Berhasil!','Data Berhasil Ditambahkan!, Silahkan Login!','success');
			header("Location: registrasi.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Ditambahkan','error');
			header("Location: registrasi.php");
			die;
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrasi User</title>
	<link rel="icon" href="img/logo-ATK.png">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="font-awesome/css/all.min.css">
</head>
<body>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #9c0000;">
				<form method="POST">
					<h3 class="mt-3">REGISTRASI USER</h3>
					<div class="form-group">
						<label for="nama_user">NAMA LENGKAP</label>
						<input type="text" class="form-control" name="nama_user" required>
					</div>
					<div class="form-group">
						<label for="role">ROLE</label>
						<select name="role" class="form-control" required>
							<option hidden>PILIH ROLE</option>
							<option value="Pegawai">Pegawai</option>
							<option value="Admin">Admin</option>
						</select>
					</div>
					<div class="form-group">
						<label for="username">USERNAME</label>
						<input type="text" class="form-control" name="username" required>
					</div>
					<div class="form-group">
						<label for="password">PASSWORD</label>
						<input type="password" class="form-control" name="password" required>
					</div>
					<div class="form-group">
						<label for="password2">KONFIRMASI PASSWORD</label>
						<input type="password" class="form-control" name="password2" required>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">REGISTRASI <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary bg-light" href="user_show.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>