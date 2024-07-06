  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="font-awesome/css/all.min.css">

<style type="text/css">
    .container {
        margin-top: 30px;
    }
    .dropdown-toggle,
    .dropdown-menu {
        border-radius: 0px !important;
    }
    .dropdown-item:hover {
        color: white;
        background-color: #0f4c81;
    }
    .btn-danger {
        width: 55%;
    }
    .dropdown:hover>.dropdown-menu {
      display: block;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #820000">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if ($_SERVER['REQUEST_URI'] == '/atk/dashboard.php'): ?>
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php"><i class="fa fa-home"></i> Home</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php"><i class="fa fa-home"></i> Home</a>
        </li>
      <?php endif ?>

    <?php if ($_SESSION['role'] == 'Admin'): ?>
      <?php if ($_SERVER['REQUEST_URI'] == '/atk/user_show.php' OR $_SERVER['REQUEST_URI'] == '/atk/user_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/atk/user_ubah.php'): ?>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-alt"></i> User
        </a>
        <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="user_show.php"><i class="fa fa-user-alt"></i> User</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="user_tambah.php"><i class="fa fa-user-plus"></i> Tambah User</a>
        </div>
      </li>
      <?php else: ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-alt"></i> User
        </a>
        <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="user_show.php"><i class="fa fa-user-alt"></i> User</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="user_tambah.php"><i class="fa fa-user-plus"></i> Tambah User</a>
        </div>
      </li>
      <?php endif ?>

      <?php if ($_SERVER['REQUEST_URI'] == '/atk/supplier_show.php' OR $_SERVER['REQUEST_URI'] == '/atk/supplier_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/atk/supplier_ubah.php'): ?>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-truck-field"></i> Supplier
        </a>
        <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="supplier_show.php"><i class="fa-solid fa-truck-field"></i> Supplier</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="supplier_tambah.php"><i class="fa-solid fa-truck-field"></i><strong>+</strong> Tambah Supplier</a>
        </div>
      </li>
      <?php else: ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-truck-field"></i> Supplier
        </a>
        <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="supplier_show.php"><i class="fa-solid fa-truck-field"></i> Supplier</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="supplier_tambah.php"><i class="fa-solid fa-truck-field"></i><strong>+</strong> Tambah Supplier</a>
        </div>
      </li>
      <?php endif ?>
    <?php endif ?>

      <?php if ($_SERVER['REQUEST_URI'] == '/atk/produk_show.php' OR $_SERVER['REQUEST_URI'] == '/atk/produk_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/atk/produk_ubah.php' OR $_SERVER['SCRIPT_NAME'] == '/atk/produk_show.php'): ?>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-box-archive"></i> Produk
        </a>
        <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="produk_show.php"><i class="fa-solid fa-box-archive"></i> Produk</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="produk_tambah.php"><i class="fa-solid fa-box-archive"></i><strong>+</strong> Tambah Produk</a>
        </div>
      </li>
      <?php else: ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-box-archive"></i> Produk
        </a>
        <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="produk_show.php"><i class="fa-solid fa-box-archive"></i> Produk</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="produk_tambah.php"><i class="fa-solid fa-box-archive"></i><strong>+</strong> Tambah Produk</a>
        </div>
      </li>
      <?php endif ?>

      <?php if ($_SERVER['REQUEST_URI'] == '/atk/stok_show.php' OR $_SERVER['REQUEST_URI'] == '/atk/stok_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/atk/stok_ubah.php' OR $_SERVER['SCRIPT_NAME'] == '/atk/detail_stok_show.php' OR $_SERVER['SCRIPT_NAME'] == '/atk/detail_stok_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/atk/detail_stok_ubah.php' OR $_SERVER['SCRIPT_NAME'] == '/atk/pembayaran.php'): ?>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-boxes-stacked"></i> Stok
        </a>
        <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="stok_show.php"><i class="fa-solid fa-boxes-stacked"></i> Stok</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="stok_tambah.php"><i class="fa-solid fa-boxes-stacked"></i><strong>+</strong> Tambah Stok</a>
        </div>
      </li>
      <?php else: ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-boxes-stacked"></i> Stok
        </a>
        <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="stok_show.php"><i class="fa-solid fa-boxes-stacked"></i> Stok</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="stok_tambah.php"><i class="fa-solid fa-boxes-stacked"></i><strong>+</strong> Tambah Stok</a>
        </div>
      </li>
      <?php endif ?>

      <li class="nav-item">
        <a onclick="return confirm('Apakah anda ingin keluar?')" class="nav-link" href="logout.php"><i class="fa fa-door-open"></i> Keluar</a>
      </li>

      <?php 
        $username = ucwords($_SESSION['username']);
        $role = $_SESSION['role'];
       ?>
    </ul>
    <ul class="navbar-nav mr-sm-2 mb-n1">
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <strong><?= $role; ?>, <?=  $username; ?></strong>
        </a>
        <div class="dropdown-menu mt-n2" aria-labelledby="navbarDropdown">
          <a href="user_ubah.php?id_user=<?= $_SESSION['id_user']; ?>" class="dropdown-item mr-sm-2 mb-n1">Settings</a>
        </div>
      </li>
    </ul>
  </div>
</nav>