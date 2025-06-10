<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">

    <title>Doktor Düzenle</title>
</head>

<body>

    <?php
    if (isset($_GET["DoktorID"])) {
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

        $ID = $_GET["DoktorID"];

        if (isset($_POST["Adı"]) && isset($_POST["Soyadı"]) && isset($_POST["Branş"]) && isset($_POST["Telefon"]) && isset($_POST["Mail"]) && isset($_POST["HastaneID"])) {
            $ad   =  $_POST["Adı"];
            $sad  =  $_POST["Soyadı"];
            $br  =  $_POST["Branş"];
            $tel  =  $_POST["Telefon"];
            $mail =  $_POST["Mail"];
            $hId  =  $_POST["HastaneID"];
            $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_doktorguncelle('$ID','$ad','$sad','$br','$tel','$mail','$hId')");

            if ($sorgu) {
                echo "<p style='color: green; font-weight: bold;'>doktor Bilgileri başarıyla Güncellendi!</p>";
            } else {
                echo "<p style='color: red; font-weight: bold;'>doktor güncelleme sırasında bir sorun oluştu...</p>";
            }
            mysqli_close($VeritabaniBaglantisi);
            header("Location: doktorlarigoruntule.php");
        }

        $Sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_doktorbul('$ID')");

        if ($Sorgu) {
            $Kayit = mysqli_fetch_assoc($Sorgu);
            $ad   =  $Kayit["Adı"];
            $sad  =  $Kayit["Soyadı"];
            $br  =  $Kayit["Branş"];
            $tel  =  $Kayit["Telefon"];
            $mail =  $Kayit["Mail"];
            $hId  =  $Kayit["HastaneID"];


            mysqli_close($VeritabaniBaglantisi);
    ?>

            <div class="form-container">
                <form action="doktorduzenle.php?DoktorID=<?php echo $ID; ?>" method="post">
                    <label>Adı:</label>
                    <input type="text" name="Adı" value="<?php echo "$ad" ?>" required>

                    <label>Soyadı:</label>
                    <input type="text" name="Soyadı" value="<?php echo "$sad" ?>" required>

                    <label>Branş:</label>
                    <input type="text" name="Branş" value="<?php echo "$br" ?>" required>

                    <label>Telefon:</label>
                    <input type="text" name="Telefon" value="<?php echo "$tel" ?>" required>

                    <label>Mail:</label>
                    <input type="text" name="Mail" value="<?php echo "$mail" ?>" required>

                    <label>HastaneID:</label>
                    <input type="text" name="HastaneID" value="<?php echo "$hId" ?>" required>

                    <input type="submit" value="Gönder">
                </form>
            </div>

    <?php



        }
    }
    //header("Location: doktorlarigoruntule.php");

    ?>
</body>

</html>