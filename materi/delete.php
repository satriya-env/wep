<?php
include "nilai.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hapus = mysqli_query($log, "DELETE FROM produk WHERE id_produk='$id'");
    if ($hapus) {
        echo "<script>alert('Produk berhasil dihapus'); window.location.href='web.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus produk'); window.location.href='web.php';</script>";
    }
}
?>