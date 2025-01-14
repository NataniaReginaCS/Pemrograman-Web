<?php
session_start();

if (!isset($_SESSION['list'])) {
    $_SESSION['list'] = [];
}

if (!isset($_SESSION['activity_log'])) {
    $_SESSION['activity_log'] = [
        'added' => 0,
        'deleted' => 0,
    ];
}
if (isset($_GET['index']) && isset($_SESSION['list'])) {
    $index = $_GET['index'];

    if (array_key_exists($index, $_SESSION['list'])) {
        unset($_SESSION['list'][$index]);

        $_SESSION['list'] = array_values($_SESSION['list']);

        $_SESSION["activity_log"]['deleted']++;
    }
}
$paket = 1;
$menuPaket = $paket + $index;
$_SESSION["success"] = "Berhasil menghapus data Paket $menuPaket";

header("Location: ./dashboard.php");
exit;
?>
