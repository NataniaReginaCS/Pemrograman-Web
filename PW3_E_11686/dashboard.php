<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}

if(!isset($_SESSION["room_list"])) {
    $_SESSION["room_list"] = [];
}

if(!isset($_SESSION["list"])) {
    $_SESSION["list"] = [];
}

if (!isset($_SESSION['activity_log'])) {
    $_SESSION['activity_log'] = [
        'added' => 0,
        'deleted' => 0,
    ];
}
$detail = [
    "name" => "Atma Kitchen",
    "tagline" => "Restaurant & Bar",
    "page_title" => "Atma Kitchen Restaurant & Co",
    "logo" => "./assets/images/HatCook.png",
    "user" => " Natania Regina Clarabella Serafina/220711686"
];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title><?php echo $detail["page_title"]; ?></title>
        <meta name="viewport" content="width= device-width, initial-scale=1.0" />

        <!-- Icon Tab-->
         <link rel="icon" href="<?php echo $detail["logo"]; ?> " type="image/x-icon" />

         <!--Bootstrap 5.3 CSS-->
         <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

         <!--Poppins dari Google Fonts-->
         <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
         <link href="./assets/css/poppins.min.css" rel="stylesheet">

         <!--Custom CSS-->
         <link rel="stylesheet" href="./assets/css/style.css" />
         <!--Button Icon-->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            .img-bukti-ngantor {
                width: 100%;
                aspect-ratio: 1/1;
                object-fit: cover;
            }
        
        </style>    
    </head>
    <body>
        <header class="fixed-top scrolled" id="navbar">
            <nav class="container nav-top py-2">
                <a href="./" class="rounded py-2 px-3 d-flex align-items-center nav-home-btn " style="background-color: #EE4D2D;">
                    <img src="<?php echo $detail['logo']; ?>" class="crown-logo" />
                    <div>
                        <p class="mb-0 fs-5 fw-bold text-"><?php echo $detail["name"]; ?></p>
                        <p class="small mb-0 text-white"><?php echo $detail["tagline"]; ?></p>
                    </div>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a href="./" class="nav-link" style="color: #EE4D2D;">Home</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a href="#" class="nav-link active" aria-current="page" style="background-color: #EE4D2D;">Admin Panel</a>
                    </li>
                    <li class="nav-item">
                        <a href="./processLogout.php" class="nav-link text-danger">Logout</a>
                    </li>    
                </ul>
            </nav>
        </header>
        <main style="padding-top: 84px;" class="container">
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Dashboard</h1>
        <!--$_Session untuk menyimpan error dari form yang disubmit-->
        <?php if (isset($_SESSION["success"])) { ?>
            <div class="alert alert-success mb-4 text-start" role="alert">
                <strong>Berhasil!</strong> <?php echo $_SESSION["success"]; ?>
            </div>
        <?php
            unset($_SESSION["success"]); //hapus error dari session
        } ?>

        <div class="row">
            <div class="col-lg-2">
                <div class="card card-body">
                    <p>Bukti sedang ngantor;</p>
                    <img 
                        src="<?php echo $_SESSION["user"]["bukti_ngantor"]; ?>"
                        class="img-fluid rounded img-bukti-ngantor"
                        alt="Bukti ngantor (sudah dihapus)" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body">
                    <h5 style="padding-bottom: 30px;">Laporan Aktivitas:</h5>
                    <table class="table table-bordered" style="margin-bottom: 40px;">
                        <thead>
                            <tr>
                            <th scope="col">Aktivitas</th>
                            <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Menambah</td>
                                <td><?php echo $_SESSION["activity_log"]['added']; ?></td>
                            </tr>
                            <tr>
                                <td>Menghapus</td>
                                <td><?php echo $_SESSION["activity_log"]['deleted']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

            <div class="card card-body h-100 justify-content-center" style="margin-top: 30px;">
                <h4>Selamat datang,</h4>
                <h1 class="fw-bold display-6 mb-3"><?php echo $_SESSION["user"]["username"]; ?></h1>
                <p class="mb-0">Kamu sudah login sejak;</p>
                <p class="fw-bold lead mb-0"><?php echo $_SESSION["user"]["login_at"]; ?></p>
            </div>
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Daftar Menu Atma Kitchen</h1>

        <div class="menu">
            <p class="mb-0" style="padding-bottom: 10px;">Saat ini terdapat <strong><?php echo count($_SESSION["list"]); ?></strong> Menu yang tersedia.</p>
            <a href ="TambahMenu.php">
                <button type="button" class="btn btn-success">
                    <i class="fa fa-plus-square" style="color:white"></i> Tambah Menu
                </button>
            </a>
            <ul style="padding-top: 50px;">
                <?php foreach ($_SESSION["list"] as $index => $menu): ?>
                    <li class="d-flex align-items-center mb-3">
                        <div class="card card-body h-100 justify-content-center" style="margin-left: -30px;">
                        <div class="row">
                            <div class="col-md-2">
                                <img 
                                    src="<?php echo $menu['gambarPaket']; ?>" 
                                    alt="Gambar Menu" 
                                    class="img-fluid rounded"  
                                    style="width: auto; height: auto; object-fit: cover; margin-right: 15px;" />
                            </div>
                            <div class="col-md-10">
                                <h3 style="padding-bottom: 5px;">Paket <?php echo $menu['menuPaket']; ?></h3>
                                <p class="mb-3 border-bottom" >Catatan: <br /> <?php echo $menu['catatan_menu']; ?></p> 
                                <p>Tanggal Pemesanan:  
                                    <strong>
                                        <?php echo date("l, d F Y", strtotime($menu['tglPemesanan'])); ?>
                                    </strong>
                                   - Harga: Rp <?php echo $menu['biaya_pemesanan']; ?>
                                </p>
                              
                                <div>
                                    <a href="prosesHapus.php?index=<?php echo $index; ?>" class="btn btn-danger" style="margin-left: auto;">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    <!--Bootstrap 5.3 JS-->
    <script src="./assets/js/bootstrap.min.js"></script>
    </body>

</html>