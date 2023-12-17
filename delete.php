<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("location: loginPage.php");
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $filmObj = new Film();
    $filmId = $_GET['id'];

    $result = $filmObj->deleteFilm($filmId);

    if ($result) {
        header("location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data film.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
