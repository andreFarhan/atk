<?php 

	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$sql = "SELECT * FROM tb_supplier
			ORDER BY id_supplier DESC
			";
	$eksekusi = mysqli_query($koneksi, $sql);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Supplier</title>
	<link rel="icon" href="img/logo-ATK.png">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container mt-5 mb-5">
		<h3 class="mt-3">SUPPLIER</h3>
		<table class="table table-striped" id="Table">
			<thead class="text-white" style="background-color: #CD1818">
				<tr>
					<th width="1%">NO</th>
					<th>ID SUPPLIER</th>
					<th>NAMA</th>
					<th>ALAMAT</th>
					<th>NO TELP</th>
					<th width="1%">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; while ($data = mysqli_fetch_array($eksekusi)) : ?>
				<tr>
					<td><?= $i++; ?></td>
					<td>SUP<?= $data['id_supplier']; ?></td>
					<td><?= ucwords($data['nama_supplier']); ?></td>
					<td><?= $data['alamat_supplier']; ?></td>
					<td><?= $data['no_telp_supplier']; ?></td>
					<td>
						<a id="tombol-hapus" href="supplier_ubah.php?id_supplier=<?= $data['id_supplier']; ?>" class="badge badge-success"><i class="fa fa-edit"></i></a>
						<a onclick="return confirm('Apakah Anda Ingin Menghapus <?= ucwords($data['nama_supplier']); ?> ?')" href="supplier_hapus.php?id_supplier=<?= $data['id_supplier']; ?>" class="badge badge-danger"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php endwhile ?>
			</tbody>
		</table>
	</div>
</body>

<?php include 'footer.php'; ?>

</html>
