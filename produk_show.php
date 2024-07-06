<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$sql = "SELECT * FROM tb_produk
			INNER JOIN tb_supplier ON tb_supplier.id_supplier = tb_produk.id_supplier
			ORDER BY id_produk DESC
			";
	$eksekusi = mysqli_query($koneksi, $sql);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Produk</title>
	<link rel="icon" href="img/logo-ATK.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5">
		<h3 class="mt-3">PRODUK</h3>
		<table class="table table-striped" id="Table" style="width: 110%; margin-left: -5%">
			<thead class="text-white" style="background-color: #CD1818">
				<tr>
					<th width="1%">NO</th>
					<th>ID PRODUK</th>
					<th>NAMA PRODUK</th>
					<th width="40%">DESKRIPSI</th>
					<th>HARGA</th>
					<th>NAMA SUPPLIER</th>
					<th width="1%">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; while ($data = mysqli_fetch_array($eksekusi)) : ?>
				<tr>
					<td><?= $i++; ?></td>
					<td>PROD<?= $data['id_produk']; ?></td>
					<td><?= $data['nama_produk']; ?></td>
					<td><?= $data['deskripsi']; ?></td>
					<td>Rp <?= str_replace(",", ".", number_format($data['harga'])); ?></td>
					<td><?= $data['nama_supplier']; ?></td>
					<td>
						<a id="tombol-hapus" href="produk_ubah.php?id_produk=<?= $data['id_produk']; ?>" class="badge badge-success"><i class="fa fa-edit"></i></a>
						<a onclick="return confirm('Apakah Anda Ingin Menghapus <?= ucwords($data['nama_produk']); ?> ?')" href="produk_hapus.php?id_produk=<?= $data['id_produk']; ?>" class="badge badge-danger"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php endwhile ?>
			</tbody>
		</table>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>
