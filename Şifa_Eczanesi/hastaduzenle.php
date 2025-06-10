<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">
    <title>Hasta Düzenle</title>
</head>

<body>

    <?php
    if (isset($_GET["TC_KimlikNo"])) {
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

        $TC = $_GET["TC_KimlikNo"];

        if (isset($_POST["Adı"]) && isset($_POST["Soyadı"]) && isset($_POST["DoğumTarihi"]) && isset($_POST["Telefon"]) && isset($_POST["Mail"]) && isset($_POST["Adres"])) {
            $ad   = $_POST["Adı"];
            $sad  = $_POST["Soyadı"];
            $br  =  $_POST["DoğumTarihi"];
            $tel  = $_POST["Telefon"];
            $mail = $_POST["Mail"];
            $adr  = $_POST["Adres"];
            $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_hastaguncelle('$TC','$ad','$sad','$br','$tel','$mail','$adr')");

            if ($sorgu) {
                echo "<p style='color: green; font-weight: bold;'>hasta Bilgileri başarıyla Güncellendi!</p>";
            } else {
                echo "<p style='color: red; font-weight: bold;'>hasta güncelleme sırasında bir sorun oluştu...</p>";
            }
            mysqli_close($VeritabaniBaglantisi);
            header("Location: hastalarigoruntule.php");
        }


        $Sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_hastabul('$TC')");

        if ($Sorgu) {
            $Kayit = mysqli_fetch_assoc($Sorgu);
            $ad   =  $Kayit["Adı"];
            $sad  =  $Kayit["Soyadı"];
            $tarih  =  $Kayit["DoğumTarihi"];
            $tel  =  $Kayit["Telefon"];
            $mail =  $Kayit["Mail"];
            $adr  =  $Kayit["Adres"];


            mysqli_close($VeritabaniBaglantisi);
            $tarih = date('Y-m-d', strtotime($tarih));


    ?>

            <div class="form-container">
                <form action="hastaduzenle.php?TC_KimlikNo=<?php echo $TC; ?>" method="post">
                    <label>Adı:</label>
                    <input type="text" name="Adı" value="<?php echo "$ad" ?>" required>

                    <label>Soyadı:</label>
                    <input type="text" name="Soyadı" value="<?php echo "$sad" ?>" required>

                    <label>DoğumTarihi:</label>
                    <input type="date" name="DoğumTarihi" value="<?php echo $tarih ?>" required>

                    <label>Telefon:</label>
                    <input type="text" name="Telefon" value="<?php echo "$tel" ?>" required>

                    <label>Mail:</label>
                    <input type="text" name="Mail" value="<?php echo "$mail" ?>" required>

                    <label>Adres:</label>
                    <input type="text" name="Adres" value="<?php echo "$adr" ?>" required>

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