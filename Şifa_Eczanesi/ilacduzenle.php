<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">
    <title>ilaç Düzenle</title>
</head>

<body>

    <?php
    if (isset($_GET["barkod"])) {
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

        $barkod = $_GET["barkod"];

        if (isset($_POST["IlacAdı"]) && isset($_POST["Kategori"]) && isset($_POST["Firma"]) && isset($_POST["BirimFiyat"]) && isset($_POST["Açıklama"]) && isset($_POST["Birimi"])) {
            $ad   =  $_POST["IlacAdı"];
            $kat  =  $_POST["Kategori"];
            $fir  =  $_POST["Firma"];
            $brf  =  $_POST["BirimFiyat"];
            $acik =  $_POST["Açıklama"];
            $brm  =  $_POST["Birimi"];
            $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_ilacbilgiguncelleme('$barkod','$ad','$kat','$fir','$brf','$acik','$brm')");

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
            $ad   =  $Kayit["IlacAdı"];
            $kat  =  $Kayit["Kategori"];
            $fir  =  $Kayit["Firma"];
            $brf  =  $Kayit["BirimFiyat"];
            $acik =  $Kayit["Açıklama"];
            $brm  =  $Kayit["Birimi"];


            mysqli_close($VeritabaniBaglantisi);
    ?>

            <div class="form-container">
                <form action="ilacduzenle.php?barkod=<?php echo $barkod; ?>" method="post">
                    <label>IlacAdı:</label>
                    <input type="text" name="IlacAdı" value="<?php echo "$ad" ?>" required>

                    <label>Kategori:</label>
                    <input type="text" name="Kategori" value="<?php echo "$kat" ?>" required>

                    <label>Firma:</label>
                    <input type="text" name="Firma" value="<?php echo "$fir" ?>" required>

                    <label>BirimFiyat:</label>
                    <input type="text" name="BirimFiyat" value="<?php echo "$brf" ?>" required>

                    <label>Açıklama:</label>
                    <input type="text" name="Açıklama" value="<?php echo "$acik" ?>" required>

                    <label>Birimi:</label>
                    <input type="text" name="Birimi" value="<?php echo "$brm" ?>" required>

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