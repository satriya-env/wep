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
        <h2 style="color: aliceblue;">Daftar Menu</h2>
        <div class="prd">
            <div class="produk">
                <?php
                $prd = mysqli_query($connect, "SELECT * FROM produk ORDER BY dipesan DESC LIMIT 5");
                while($p = mysqli_fetch_array($prd)):
                ?>
                <a href="#" class="menu">
                    <div class="item">
                        <img src="aset/<?= htmlspecialchars($p['gambar']) ?>" alt="<?= htmlspecialchars($p['nama']) ?>">
                        <h3><?= htmlspecialchars($p['nama']) ?></h3>
                        <p>Rp.<?= number_format($p['harga'], 0, ',', '.') ?></p>
                        <p>Dipesan <?= (int)$p['dipesan'] ?>x</p>
                    </div>
                </a>
                <?php endwhile; ?>
            </div>
        </div>
        </div>
</body>
</html>