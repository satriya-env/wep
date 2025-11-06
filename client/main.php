<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kedai Ngaso</title>
    <?php
    include '../connect.php';
    ?>
    <link rel="stylesheet" href="style.css"><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sansation:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/627d652163.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../aset/logo_i.png">
</head>
<body>
    <header>
        <a href="/tes.html"><img src="../aset/logo_e.png" alt="kedaingaso"></a>
        <nav>
            <ul>
                <li><a href="">Beranda</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="">Tentang Kami</a></li>
            </ul>
        </nav>
    </header>
    <div class="main">
        <form method="GET" action="" style="text-align: center; margin: 20px 0;">
            <input type="text" name="cari" placeholder="Cari menu..." style="padding: 8px; width: 250px;">
            <button type="submit" style="padding: 8px 12px;">Cari</button>
        </form>
        <div class="banner">
            <img src="" alt="banner">
        </div>
        <h2>Menu of the Week</h2>
            <div class="motw">
                <div class="best">
                    <?php
                    $prd = mysqli_query($connect, "SELECT * FROM produk ORDER BY dipesan DESC LIMIT 5");
                    while($p = mysqli_fetch_array($prd)):
                    ?>
                    <a href="#" class="menu">
                        <div class="item">
                        <img src="../aset/<?= htmlspecialchars($p['gambar']) ?>" alt="<?= htmlspecialchars($p['nama']) ?>">
                        <h3><?= htmlspecialchars($p['nama']) ?></h3>
                        <p>Rp.<?= number_format($p['harga'], 0, ',', '.') ?></p>
                        <p>Dipesan <?= (int)$p['dipesan'] ?>x</p>
                        </div>
                    </a>
                    <?php endwhile; ?>
                </div>
            </div>
        <h2>Menu Lainnya</h2>
<div class="req">
    <div class="best">
        <?php
        if (isset($_GET['cari']) && $_GET['cari'] != "") {
            $keyword = mysqli_real_escape_string($connect, $_GET['cari']);
            $prd = mysqli_query($connect, "SELECT * FROM produk WHERE nama LIKE '%$keyword%' ORDER BY tgl DESC");
            echo "<p style='width:100%; text-align:center;'>Hasil pencarian untuk: <strong>" . htmlspecialchars($keyword) . "</strong></p>";
        } else {
            $prd = mysqli_query($connect, "SELECT * FROM produk ORDER BY tgl DESC LIMIT 5");
        }

        while ($p = mysqli_fetch_array($prd)):
        ?>
        <a href="#" class="menu">
            <div class="item">
                <img src="../aset/<?= htmlspecialchars($p['gambar']) ?>" alt="<?= htmlspecialchars($p['nama']) ?>">
                <h3><?= htmlspecialchars($p['nama']) ?></h3>
                <p>Rp.<?= number_format($p['harga'], 0, ',', '.') ?></p>
                <p>Dipesan <?= (int)$p['dipesan'] ?>x</p>
            </div>
        </a>
        <?php endwhile; ?>
    </div>
</div>

    </div>
    <footer>
        <span>2025 &copy; Envcore Life</span>
    </footer>
</body>
</html>