<?php  
	
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$id_stok = $_GET['id_stok'];
	$sql = "SELECT * FROM tb_stok 
			INNER JOIN tb_produk ON tb_produk.id_produk = tb_stok.id_produk
			WHERE id_stok = $id_stok";
	$eksekusi = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_assoc($eksekusi);

	if (isset($_POST['submit'])) {
		if (ubahStok($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Diubah','success');
			header("Location: stok_show.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Diubah','error');
			header("Location: stok_show.php");
			die;
		}
	}
	$sql_produk = "SELECT * FROM tb_produk";
	$eksekusi_produk = mysqli_query($koneksi, $sql_produk);
	$data_produk = mysqli_fetch_array($eksekusi_produk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Stok</title>
	<link rel="icon" href="img/logo-ATK.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #9c0000;">
				<form method="POST">
					<h3 class="mt-3">UBAH STOK</h3>
					<input type="hidden" name="id_stok" value="<?= $data['id_stok']; ?>">
					<div class="form-group">
						<label for="id_produk">NAMA PRODUK</label>
						<input type="text" class="form-control" value="<?= $data['nama_produk']; ?>" disabled>
					</div>
					<div class="form-group">
						<label for="qty">QTY</label>
						<input type="number" class="form-control" name="qty" value="<?= $data['qty']; ?>" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">UBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary bg-light" href="stok_show.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>