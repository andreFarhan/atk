<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$sql = "SELECT * FROM tb_stok
			INNER JOIN tb_produk ON tb_produk.id_produk = tb_stok.id_produk
			ORDER BY id_stok DESC
			";
	$eksekusi = mysqli_query($koneksi, $sql);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stok</title>
	<link rel="icon" href="img/logo-ATK.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5">
		<h3 class="mt-3">STOK</h3>
		<table class="table table-striped" id="Table">
			<thead class="text-white" style="background-color: #CD1818">
				<tr>
					<th width="1%">NO</th>
					<th>ID PRODUK</th>
					<th>NAMA PRODUK</th>
					<th width="1%">QTY</th>
					<th width="1%">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; while ($data = mysqli_fetch_array($eksekusi)) : ?>
				<tr>
					<td><?= $i++; ?></td>
					<td>PROD<?= $data['id_produk']; ?></td>
					<td><?= $data['nama_produk']; ?></td>
					<td><?= str_replace(",", ".", number_format($data['qty'])); ?></td>
					<td>
						<a id="tombol-hapus" href="stok_ubah.php?id_stok=<?= $data['id_stok']; ?>" class="badge badge-success"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<?php endwhile ?>
			</tbody>
		</table>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>
