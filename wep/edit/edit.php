<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <?php
    include '../connect.php';
    ?>
    <link rel="stylesheet" href="style.css"><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sansation:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/627d652163.js" crossorigin="anonymous"></script>
    <link rel="icon" href="aset/logo_i.png">
</head>
<body>
    <header>
        <div class="logo">
            <a href=""><img src="../aset/logo_e.png" alt="kedaingaso"></a>
            <span>Admin Page</span>
        </div>
        <a href="../client/main.php">Client Side</a>
    </header>
    <div class="main">
        <?php
        if(isset($_GET['id']) == false){
            echo "<script>window.location.href='admin.php';</script>";
        }
        $id = mysqli_real_escape_string($connect, $_GET['id']);

        if(isset($_POST['simpan'])){
            $nama = mysqli_real_escape_string($connect, $_POST['nama']);
            $harga = mysqli_real_escape_string($connect, $_POST['harga']);
            $deskripsi = mysqli_real_escape_string($connect, $_POST['deskrip']);
            $dipesan = mysqli_real_escape_string($connect, $_POST['dipesan']);
            
            $gbr = $_FILES['gambar'];
            $gbr_id = $gbr['name'];
            $gbr_bit = $gbr['size'];
            $target = '../aset/'.$gbr_id;

            if(is_uploaded_file($gbr['tmp_name']) == false){
                $sql = "UPDATE produk SET nama ='$nama',harga='$harga',deskrip='$deskripsi',dipesan=$dipesan WHERE id='$id'";
                $query= mysqli_query($connect, $sql);
                if($query){
                    echo"<script>window.location.href='../admin.php'</script>";
                }
            }else{
                if ($gbr_bit<300000) {
                    if(move_uploaded_file($gbr['tmp_name'],$target)){
                    $sql = "UPDATE produk SET nama ='$nama',harga=$harga,deskrip='$deskripsi',dipesan=$dipesan, gambar='$gbr_id'";
                    $query= mysqli_query($connect, $sql);
                    if($query){
                    echo"<script>window.location.href='../admin.php'</script>";
                    }
                    }else{
                        echo "Data gagal disimpan karena gambar gagal diupload";
                    }
                }else{
                    echo "Mohon maaf ukuran gambar terlalu besar";
                }
            }
        }

        $sql = "SELECT*FROM produk WHERE id='$id'";
        $query = mysqli_query($connect,$sql);
        $p = mysqli_fetch_array($query);
        ?>
        <h1>Edit Produk</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nama Produk</td>
                    <td><input type="text" name="nama" id="" value="<?= $p['nama']?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>
                        <textarea name="deskrip" id=""><?= $p['deskrip']?> </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>
                        <input type="number" name="harga" id="" value="<?= $p['harga']?>">
                    </td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>
                        <input type="number" name="dipesan" id="" value="<?= $p['dipesan']?>">
                    </td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>
                        <input type="date" name="tgl" value="<?= $p['tgl'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td>
                        <?php
                        if ($p['gambar'] !=""){
                        ?>
                            <img src="../aset/<?= $p['gambar']?>" alt="" width="175px">
                        <?php
                        }else{
                            echo "Gambar tidak tersedia";
                        }
                        ?>
                        <br>
                        <input type="file" name="gambar" id="" accept="img/*">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="UBAH" name="simpan"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>