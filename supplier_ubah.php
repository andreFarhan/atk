<?php  
	
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$id_supplier = $_GET['id_supplier'];
	$sql = "SELECT * FROM tb_supplier WHERE id_supplier = $id_supplier";
	$eksekusi = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_assoc($eksekusi);

	if (isset($_POST['submit'])) {
		if (ubahSupplier($_POST) > 0) {
			setAlert('Berhasil!','Data Berhasil Diubah','success');
			header("Location: supplier_show.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Diubah','error');
			header("Location: supplier_show.php");
			die;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Supplier</title>
	<link rel="icon" href="img/logo-ATK.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-6 rounded" style="background-color: #9c0000;">
				<form method="POST">
					<h3 class="mt-3">UBAH SUPPLIER</h3>
					<input type="hidden" name="id_supplier" value="<?= $data['id_supplier']; ?>">
					<div class="form-group">
						<label for="nama_supplier">NAMA</label>
						<input type="text" class="form-control" name="nama_supplier" value="<?= $data['nama_supplier']; ?>" required>
					</div>
					<div class="form-group">
						<label for="alamat_supplier">ALAMAT</label>
						<textarea name="alamat_supplier" class="form-control"><?= $data['alamat_supplier']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="no_telp_supplier">NO TELP</label>
						<input type="number" class="form-control" name="no_telp_supplier" value="<?= $data['no_telp_supplier']; ?>" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit">UBAH <i class="fa fa-paper-plane"></i></button>
						<a class="btn btn-outline-primary bg-light" href="supplier_show.php">BATAL</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>