<?php 
    include 'functions.php';

    //cek login
    if ($_SESSION['login'] == 0) {
        header("Location: login_form.php");
    }

    $nama_user = ucwords($_SESSION['nama_user']);
    $role = ucwords($_SESSION['role']);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="icon" href="img/logo-ATK.png">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="container mt-3">
        <h2></h2>
    <div class="alert alert-info text-center">
        <h3 class="font-weight-bold mt-3"><img src="img/logo-ATK.png" alt="Responsive image" width="50px"></h3>
        <h4><b>Selamat Datang <b><?= $nama_user; ?></b></b></h4>
        <p>Aplikasi pengelolaan alat tulis kantor di Kelurahan Cipayung adalah sebuah perangkat lunak yang dirancang khusus untuk membantu pengelolaan inventaris alat tulis kantor di sebuah organisasi atau kelurahan. Aplikasi ini bertujuan untuk mengotomatisasi proses pengadaan, penggunaan, dan pemeliharaan alat tulis kantor.</p><br>
<p class="text-left">
Berikut adalah deskripsi beberapa fitur utama yang mungkin dimiliki oleh aplikasi pengelolaan alat tulis kantor di Kelurahan Cipayung:
</p>
<p class="text-left">
1. Pendaftaran Alat Tulis: Aplikasi ini memungkinkan petugas atau pengelola di Kelurahan Cipayung untuk mendaftarkan semua alat tulis kantor yang dimiliki. Setiap alat tulis dapat diberi label dengan informasi seperti nama, kategori (misalnya pensil, pulpen, kertas, dll.), jumlah, dan status (tersedia, dipinjam, rusak, dll.).
</p>
<p class="text-left">
2. Manajemen Peminjaman: Aplikasi ini memudahkan pengguna untuk meminjam alat tulis kantor dengan mendaftarkan peminjaman melalui sistem. Pengguna dapat mengajukan permohonan peminjaman, mencantumkan detail alat tulis yang ingin dipinjam, dan memilih tanggal pengembalian. Pengelola dapat mengelola permintaan peminjaman, memberikan persetujuan, dan memantau status peminjaman.
</p>
<p class="text-left">
3. Notifikasi dan Pengingat: Aplikasi ini dapat mengirimkan notifikasi kepada pengguna atau pengelola mengenai tenggat waktu pengembalian alat tulis yang dipinjam, peringatan jika stok alat tulis tertentu mulai menipis, atau pemberitahuan jika ada alat tulis yang harus diperbaiki atau diganti.
</p>
<p class="text-left">
4. Laporan dan Analisis: Aplikasi ini dapat menghasilkan laporan mengenai penggunaan alat tulis, permintaan peminjaman yang sering, alat tulis yang paling banyak digunakan, dan sebagainya. Informasi ini dapat membantu pengelola dalam mengambil keputusan terkait pengadaan atau pengelolaan inventaris alat tulis.
</p>
<p class="text-left">
5. Pemeliharaan dan Perbaikan: Aplikasi ini memungkinkan pengelola untuk mencatat alat tulis yang rusak atau membutuhkan perbaikan. Pengelola dapat melacak status perbaikan dan memastikan bahwa alat tulis kantor tetap dalam kondisi yang baik.
</p>
<p class="text-left">
Dengan adanya aplikasi pengelolaan alat tulis kantor di Kelurahan Cipayung, diharapkan pengelolaan inventaris alat tulis dapat menjadi lebih efisien, transparan, dan terorganisir dengan baik. Ini akan membantu menghindari kehilangan alat tulis, mengurangi biaya pengadaan yang tidak perlu, serta memastikan ketersediaan alat tulis yang cukup bagi pengguna.</p>

    </div>
</div>
    
</body>

<?php include 'footer.php'; ?>

</html>