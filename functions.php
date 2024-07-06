<?php 
	
	session_start();

	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "db_atk";

	$koneksi = mysqli_connect($host,$user,$password,$database);

	date_default_timezone_set('asia/jakarta');

	function tambahUser($data){
		global $koneksi;
		$nama_user = ucwords(strtolower($data['nama_user']));
		$username = $data['username'];
		$password = $data['password'];
		$password2 = $data['password2'];
		$role = $data['role'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");

		if (mysqli_fetch_assoc($result)) {
			setAlert('Gagal!','Username Telah Digunakan','error');
			header("Location: user_tambah.php");
			die;
		}
		if ($password !== $password2) {
			setAlert('Gagal!','Konfirmasi Password Salah','error');
			header("Location: user_tambah.php");
			die;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO tb_user VALUES('','$nama_user','$username','$password','$role')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function tambahSupplier($data){
		global $koneksi;
		$nama_supplier 	 = $data['nama_supplier'];
		$alamat_supplier = $data['alamat_supplier'];
		$no_telp_supplier = $data['no_telp_supplier'];

		$sql = "INSERT INTO tb_supplier VALUES('','$nama_supplier','$alamat_supplier','$no_telp_supplier')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function tambahProduk($data){
		global $koneksi;
		$nama_produk = $data['nama_produk'];
		$deskripsi = $data['deskripsi'];
		$harga = $data['harga'];
		$id_supplier = $data['id_supplier'];

		$sql = "INSERT INTO tb_produk VALUES('','$nama_produk','$deskripsi','$harga','$id_supplier')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function tambahStok($data){
		global $koneksi;
		$id_produk 	= $data['id_produk'];
		$qty 			= $data['qty'];

		$sql = "INSERT INTO tb_stok VALUES('','$id_produk','$qty')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahUser($data){
		global $koneksi;
		$id_user = $data['id_user'];
		$nama_user = ucwords(strtolower($data['nama_user']));
		$username = $data['username'];
		$password = $data['password'];
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$password2 = $data['password2'];
		$password_lama = $data['password_lama'];
		$role = $data['role'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");
		$fetch = mysqli_fetch_assoc($result);
		$password_lama_verify = password_verify($password_lama, $fetch['password']);

		if ($password !== $password2) {
			echo "
			<script>
			alert('Konfirmasi Password tidak sama!')
			</script>
			";
			return false;
		}

		if ($password_lama_verify) {
			$sql = "UPDATE tb_user SET nama_user = '$nama_user', password = '$password_hash', role = '$role' WHERE id_user = '$id_user'";
			$eksekusi = mysqli_query($koneksi, $sql);

			return mysqli_affected_rows($koneksi);
		}else{
			echo "
			<script>
			alert('Password Lama tidak benar!')
			</script>
			";
			return false;
		}

	}

	function ubahSupplier($data){
		global $koneksi;
		$id_supplier 	 = $data['id_supplier'];
		$nama_supplier 	 = $data['nama_supplier'];
		$alamat_supplier = $data['alamat_supplier'];
		$no_telp_supplier = $data['no_telp_supplier'];

		$sql = "UPDATE tb_supplier SET nama_supplier = '$nama_supplier', alamat_supplier = '$alamat_supplier', no_telp_supplier = '$no_telp_supplier' WHERE tb_supplier.id_supplier = '$id_supplier'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahProduk($data){
		global $koneksi;
		$id_produk 	 = $data['id_produk'];
		$nama_produk 	 = $data['nama_produk'];
		$deskripsi = $data['deskripsi'];
		$harga = $data['harga'];
		$id_supplier = $data['id_supplier'];

		$sql = "UPDATE tb_produk SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga = '$harga', id_supplier = '$id_supplier' WHERE tb_produk.id_produk = '$id_produk'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahStok($data){
		global $koneksi;
		$id_stok = $data['id_stok'];
		$qty = $data['qty'];

		$sql = "UPDATE tb_stok SET qty = '$qty' WHERE tb_stok.id_stok = '$id_stok'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusUser($id){
		global $koneksi;
		$sql = "DELETE FROM tb_user WHERE id_user = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}
	
	function hapusSupplier($id){
		global $koneksi;
		$sql = "DELETE FROM tb_supplier WHERE id_supplier = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusProduk($id){
		global $koneksi;
		$sql = "DELETE FROM tb_produk WHERE id_produk = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function setAlert($title='',$text='',$type='',$buttons=''){

		$_SESSION["alert"]["title"]		= $title;
		$_SESSION["alert"]["text"] 		= $text;
		$_SESSION["alert"]["type"] 		= $type;
		$_SESSION["alert"]["buttons"]	= $buttons; 

	}

	if (isset($_SESSION['alert'])) {

		function alert(){
			$title 		= $_SESSION["alert"]["title"];
			$text 		= $_SESSION["alert"]["text"];
			$type 		= $_SESSION["alert"]["type"];
			$buttons	= $_SESSION["alert"]["buttons"];

			echo"
			<div id='msg' data-title='".$title."' data-type='".$type."' data-text='".$text."' data-buttons='".$buttons."'></div>
			<script>
				let title 		= $('#msg').data('title');
				let type 		= $('#msg').data('type');
				let text 		= $('#msg').data('text');
				let buttons		= $('#msg').data('buttons');

				if(text != '' && type != '' && title != ''){
					Swal.fire({
						title: title,
						text: text,
						icon: type,
					});
				}
			</script>
			";
			unset($_SESSION["alert"]);
		}
	}
 ?>