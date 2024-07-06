<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	if (isset($_POST['submit'])) {
		if (tambahUser($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Ditambahkan','success');
			header("Location: user_show.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Ditambahkan','error');
			header("Location: user_show.php");
			die;
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah User</title>
	<link rel="icon" href="img/logo-ATK.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #9c0000;">
				<form method="POST">
					<h3 class="mt-3">TAMBAH USER</h3>
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
						<button type="submit" class="btn btn-primary" name="submit">TAMBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary bg-light" href="user_show.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>