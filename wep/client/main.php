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
                <li><a href="">Menu</a></li>
                <li><a href="">Tentang Kami</a></li>
            </ul>
        </nav>
    </header>
    <div class="main">
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

        <!-- rekomendasi -->
        <div class="req">
            <div class="best">
                <?php
                    $prd = mysqli_query($connect, "SELECT * FROM produk ORDER BY date DESC LIMIT 5");
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
                <!-- <a href="" class="menu">
                    <div class="item">
                        <img src="aset/item6.jpg">
                        <h3>Sate Maranggi</h3>
                        <p>Rp.21,500</p>
                        <p></p>
                    </div>
                </a>
                <a href="" class="menu">
                    <div class="item">
                        <img src="aset/item7.jpg">
                        <h3>Nasduk Klasik</h3>
                        <p>Rp.12,000</p>
                        <p></p>
                    </div>
                </a>
                <a href="" class="menu">
                    <div class="item">
                        <img src="aset/item8.jpg">
                        <h3>Nasi Katsu Kari</h3>
                        <p>Rp.22,000</p>
                        <p></p>
                    </div>
                </a> -->
            </div>
        </div>
    </div>
    <footer>
        <span>2025 &copy; Envcore Life</span>
    </footer>
</body>
</html>