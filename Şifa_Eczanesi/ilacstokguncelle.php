<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">
    <title>İlaç stok güncelle</title>
</head>

<body>

    <?php
    if (isset($_GET["barkod"])) {
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

        $barkod = $_GET["barkod"];

        if (isset($_POST["StokMiktarı"])) {
            $stk   =  $_POST["StokMiktarı"];
            $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_ilacstokguncelleme('$barkod','$stk')");

            if ($sorgu) {
                echo "<p style='color: green; font-weight: bold;'>ilaç Bilgileri başarıyla Güncellendi!</p>";
            } else {
                echo "<p style='color: red; font-weight: bold;'>ilaç güncelleme sırasında bir sorun oluştu...</p>";
            }
            mysqli_close($VeritabaniBaglantisi);
            header("Location: ilaclarigoruntule.php");
        }


        $Sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_ilacbul('$barkod')");

        if ($Sorgu) {
            $Kayit = mysqli_fetch_assoc($Sorgu);
            $stk   =  $Kayit["StokMiktarı"];

            mysqli_close($VeritabaniBaglantisi);
    ?>

            <div class="form-container">
                <form action="ilacstokguncelle.php?barkod=<?php echo $barkod; ?>" method="post">
                    <label>stok'a eklenecek miktar:</label>
                    <input type="text" name="StokMiktarı" required>
                    Mevcut Stok:<?php echo " $stk" ?>

                    <input type="submit" value="Gönder">
                </form>
            </div>

    <?php



        }
    }
    //header("Location: ilaclarigoruntule.php");

    ?>
</body>

</html>