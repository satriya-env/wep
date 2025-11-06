<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <?php
    include 'connect.php';
    ?>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sansation:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/627d652163.js" crossorigin="anonymous"></script>
    <link rel="icon" href="aset/logo_i.png">
</head>
<body>
    <header>
        <div class="logo">
            <a href="admin.php"><img src="aset/logo_e.png" alt="kedaingaso"></a>
            <span>Admin Page</span>
        </div>
        <div class="menu">
            <a href="client/main.php">Client Side</a>
            <a href="create/create.php">Buat Produk</a>
            <a href="produk.php">Data Produk</a>
        </div>
    </header>
    <div class="main">
        <table style="width: 70%;" border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Harga</td>
            <td>Deskripsi</td>
            <td>Gambar</td>
            <td>Dipesan</td>
            <td>Tanggal Rilis</td>
            <td>Jam Rilis</td>
            <td>Opsi</td>
        </tr>
        <?php
        $no =1;
        $prd = mysqli_query($connect, "SELECT * FROM produk ORDER BY dipesan DESC");
        while($p = mysqli_fetch_array($prd)):
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $p['nama'] ?></td>
            <td>Rp.<?= number_format($p['harga'], 0, ',', '.') ?></td>
            <td><?= $p['deskrip'] ?></td>
            <td><?= (int)$p['dipesan'] ?>x</td>
            <td><img src="aset/<?= $p['gambar'] ?>" width="175"></td>
            <td><?= $p['tgl'] ?></td>
            <td><?= $p['waktu'] ?></td>
            <td class="act">
            <a href="delete.php?id=<?= $p['id'] ?>" onclick="return confirm('Yakin hapus data ini?')" style="color: aliceblue;">Hapus</a>
            <a href="edit/edit.php?id=<?= $p['id'] ?>" style="color: aliceblue;">Edit</a>
            </td>
        </tr>
        <?php
        endwhile;
        ?>
    </table>
    </div>
</body>
</html>