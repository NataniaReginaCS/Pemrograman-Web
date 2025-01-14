<?php
session_start();

date_default_timezone_set('Asia/Jakarta');
if (!isset($_SESSION['list'])) {
    $_SESSION['list'] = [];
}

if (!isset($_SESSION['activity_log'])) {
    $_SESSION['activity_log'] = [
        'added' => 0,   
        'deleted' => 0, 
    ];
}

$gambarPaket = [
    "1" => "./assets/images/paket1.jpg",
    "2" => "./assets/images/paket5.jpg",
    "3" => "./assets/images/paket3.jpg",
    "4" => "./assets/images/paket4.jpg",
];

if (isset($_POST["menambah_list"])) {
    $tglPemesanan = $_POST["tglPemesanan"];
    $menuPaket = $_POST["menuPaket"];
    $biaya_pemesanan = $_POST["biayaPemesanan"];
    $catatanMenu = $_POST["catatanMenu"];

    $gambar = isset($gambarPaket[$menuPaket]) ? $gambarPaket[$menuPaket] : ""; 

    $_SESSION["list"][] = [
        "tglPemesanan" => $tglPemesanan,
        "menuPaket" => $menuPaket,
        "biaya_pemesanan" => $biaya_pemesanan,
        "catatan_menu" => $catatanMenu,
        "gambarPaket" => $gambar, 
        "tglPemesanan" => date("d-m-Y", strtotime($tglPemesanan)),
    ];
    $_SESSION["success"] = "Berhasil menyimpan reservasi untuk Paket $menuPaket";
    $_SESSION["activity_log"]['added']++;

    header("Location: ./dashboard.php");
    exit;
}
?>
