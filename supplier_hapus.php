<?php 
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$id_supplier = $_GET['id_supplier'];

	if (isset($id_supplier)) {
		if (hapusSupplier($id_supplier) > 0) {
			setAlert('Berhasil!','Data Berhasil Dihapus','success');
			header("Location: supplier_show.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Dihapus','error');
			header("Location: supplier_show.php");
			die;
		}
	}
 ?>