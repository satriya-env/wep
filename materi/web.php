<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    include "nilai.php";
    $table = mysqli_query($log, "SELECT*FROM produk");
    ?>
</head>
<body>
    <table style="width: 70%;" border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Kategori</td>
            <td>Harga</td>
            <td>Deskripsi</td>
            <td>Stok</td>
            <td>Gambar</td>
            <td>Opsi</td>
        </tr>
        <?php 
        $no = 1;    
        while($p = mysqli_fetch_assoc($table)):    
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $p['nama_produk'] ?></td>
            <td><?= $p['kategori']; ?></td>
            <td>Rp.<?= $p['harga']; ?></td>
            <td><?= $p['deskripsi'] ?></td>
            <td><?= $p['stok'] ?></td>
            <td><img src="img/<?= $p['gambar'] ?>" width="175"></td>
            <td>
            <a href="delete.php?id=<?= $p['id_produk'] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            <a href="edit.php?id=<?= $p['id_produk'] ?>">Edit</a>
            </td>
        </tr>
        <?php
        endwhile;
        ?>
    </table>
    <a href="create.php"> <button>Buat Produk</button></a>
</body>
</html>