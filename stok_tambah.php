<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	if (isset($_POST['submit'])) {
		if (tambahStok($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Ditambahkan','success');
			header("Location: stok_show.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Ditambahkan','error');
			header("Location: stok_show.php");
			die;
		}
	}

	$sql_produk = "SELECT * FROM tb_produk";
	$eksekusi_produk = mysqli_query($koneksi, $sql_produk);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Stok</title>
	<link rel="icon" href="img/logo-ATK.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #9c0000;">
				<form method="POST">
					<h3 class="mt-3">TAMBAH STOK</h3>
					<div class="form-group">
						<label for="id_produk">NAMA PRODUK</label>
						<select name="id_produk" class="form-control" required>
							<option hidden>PILIH PRODUK</option>
							<?php while ($data_produk = mysqli_fetch_array($eksekusi_produk)) : ?>
								<option value="<?= $data_produk['id_produk']; ?>"><?= $data_produk['nama_produk']; ?></option>
							<?php endwhile ?>
						</select>
					</div>
					<div class="form-group">
						<label for="qty">QTY</label>
						<input type="number" class="form-control" name="qty" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">TAMBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary bg-light" href="stok_show.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>