<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	if (isset($_POST['submit'])) {
		if (tambahProduk($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Ditambahkan','success');
			header("Location: produk_show.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Ditambahkan','error');
			header("Location: produk_show.php");
			die;
		}
	}

	$sql_supplier = "SELECT * FROM tb_supplier";
	$eksekusi_supplier = mysqli_query($koneksi, $sql_supplier);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Produk</title>
	<link rel="icon" href="img/logo-ATK.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #9c0000;">
				<form method="POST">
					<h3 class="mt-3">TAMBAH PRODUK</h3>
					<div class="form-group">
						<label for="nama_produk">NAMA PRODUK</label>
						<input type="text" class="form-control" name="nama_produk" required>
					</div>
					<div class="form-group">
						<label for="deskripsi">DESKRIPSI</label>
						<textarea name="deskripsi" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="harga">HARGA</label>
						<input type="number" class="form-control" name="harga" required>
					</div>
					<div class="form-group">
						<label for="id_supplier">SUPPLIER</label>
						<select name="id_supplier" class="form-control" required>
							<option hidden>PILIH SUPPLIER</option>
							<?php while ($data_supplier = mysqli_fetch_array($eksekusi_supplier)) : ?>
								<option value="<?= $data_supplier['id_supplier']; ?>"><?= $data_supplier['nama_supplier']; ?></option>
							<?php endwhile ?>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">TAMBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary bg-light" href="produk_show.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>