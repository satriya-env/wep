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
        <div class="logo">
            <a href=""><img src="../aset/logo_e.png" alt="kedaingaso"></a>
            <span>Admin Page</span>
        </div>
        <div class="menu">
            <a href="../client/main.php">Client Side</a>
        </div>
    </header>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                        <select name="kategori" id="kategori">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Desert">Desert</option>
                            <option value="Snacks">Snacks</option>
                        </select>
            </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi"></td>
            </tr>
            <tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok"></td>
            <tr>
                <td>Upload Gambar</td>
                <td><input type="file" name="gambar"></td>
            </tr>
            </tr>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['save'])){
        include "nilai.php";
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $stok= $_POST['stok'];

        $gbr = $_FILES['gambar'];
        $gbr_id = $gbr['name'];
        $gbr_bit = $gbr['size'];
        $tmp_name = $gbr['tmp_name'];
        $target = 'img/'.$gbr_id;
        
        if($gbr_bit < 300000){
            if(move_uploaded_file($gbr['tmp_name'],$target)){
            $query = 
            "INSERT INTO produk (nama_produk, kategori, harga, deskripsi,stok,gambar)VALUES ('$nama', '$kategori', '$harga', '$deskripsi','$stok','$gbr_id')";
            mysqli_query($log, $query);
            echo "Data berhasil disimpan!";?>
            <a href="web.php"><button>Lihat Daftar</button> </a>
            <?php
            }
        }

    }
    ?>
</body>
</html>