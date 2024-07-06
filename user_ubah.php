<?php  
	
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$id_user = $_GET['id_user'];
	$sql = "SELECT * FROM tb_user WHERE id_user = $id_user";
	$eksekusi = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_assoc($eksekusi);

	if (isset($_POST['submit'])) {
		if (ubahUser($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Diubah','success');
			header("Location: user_show.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Diubah','error');
			header("Location: user_show.php");
			die;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah User</title>
	<link rel="icon" href="img/logo-ATK.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #9c0000;">
				<form method="POST">
					<h3 class="mt-3">UBAH USER</h3>
					<input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
					<div class="form-group">
						<label for="nama_user">NAMA LENGKAP</label>
						<input type="text" class="form-control" name="nama_user" value="<?= $data['nama_user']; ?>" required>
					</div>
					<div class="form-group">
						<label for="role">ROLE</label>
						<select name="role" class="form-control" required>
							<option value="<?= $data['role']; ?>" hidden><?= $data['role']; ?></option>
							<option value="Pegawai">Pegawai</option>
							<option value="Admin">Admin</option>
						</select>
					</div>
					<div class="form-group">
						<label for="username">USERNAME</label>
						<input type="text" class="form-control" value="<?= $data['username']; ?>" disabled>
						<input type="hidden" name="username" value="<?= $data['username']; ?>">
					</div>
					<div class="form-group">
						<label for="password_lama">PASSWORD LAMA</label>
						<input type="password" class="form-control" name="password_lama" required>
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
						<button type="submit" class="btn btn-primary" name="submit">UBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary bg-light" href="user_show.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>