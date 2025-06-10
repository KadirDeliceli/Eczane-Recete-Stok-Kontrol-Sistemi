<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">
    <title>Hastane Düzenle</title>
</head>

<body>

    <?php
    if (isset($_GET["HastaneID"])) {
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

        $ID = $_GET["HastaneID"];

        if (isset($_POST["HastaneAdı"]) && isset($_POST["Telefon"]) && isset($_POST["Adres"])) {
            $ad   =  $_POST["HastaneAdı"];
            $tel  =  $_POST["Telefon"];
            $adr  =  $_POST["Adres"];

            $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_hastaneguncelle('$ID','$ad','$tel','$adr')");

            if ($sorgu) {
                echo "<p style='color: green; font-weight: bold;'>hastane Bilgileri başarıyla Güncellendi!</p>";
            } else {
                echo "<p style='color: red; font-weight: bold;'>hastane güncelleme sırasında bir sorun oluştu...</p>";
            }
            mysqli_close($VeritabaniBaglantisi);
            header("Location: zhastanegoruntule.php");
        }


        $Sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_hastanebul('$ID')");

        if ($Sorgu) {
            $Kayit = mysqli_fetch_assoc($Sorgu);
            $ad   =  $Kayit["HastaneAdı"];
            $tel  =  $Kayit["Telefon"];
            $adr  =  $Kayit["Adres"];


            mysqli_close($VeritabaniBaglantisi);
    ?>

            <div class="form-container">
                <form action="zhastaneduzenle.php?HastaneID=<?php echo $ID; ?>" method="post">
                    <label>HastaneAdı:</label>
                    <input type="text" name="HastaneAdı" value="<?php echo "$ad" ?>" required>

                    <label>Adres:</label>
                    <input type="text" name="Adres" value="<?php echo "$tel" ?>" required>

                    <label>Telefon:</label>
                    <input type="text" name="Telefon" value="<?php echo "$adr" ?>" required>

                    <input type="submit" value="Gönder">
                </form>
            </div>

    <?php



        }
    }
    //header("Location: hastalarigoruntule.php");

    ?>
</body>

</html>