<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">
    <title>Hasta ekle</title>
</head>

<body>

    <?php
    $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
    mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

    if (isset($_POST["TC_KimlikNo"]) && isset($_POST["Adı"]) && isset($_POST["Soyadı"]) && isset($_POST["DoğumTarihi"]) && isset($_POST["Telefon"]) && isset($_POST["Mail"]) && isset($_POST["Adres"])) {
        $TC   =  $_POST["TC_KimlikNo"];
        $ad   =  $_POST["Adı"];
        $sad  =  $_POST["Soyadı"];
        $br  =  $_POST["DoğumTarihi"];
        $tel  =  $_POST["Telefon"];
        $mail =  $_POST["Mail"];
        $adr  =  $_POST["Adres"];
        $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_hastaekle('$TC','$ad','$sad','$br','$tel','$mail','$adr')");

        if ($sorgu) {
            echo "<p style='color: green; font-weight: bold;'>hasta Bilgileri başarıyla eklendi!</p>";
        } else {
            echo "<p style='color: red; font-weight: bold;'> hasta ekeleme sırasında bir sorun oluştu...</p>";
        }
        mysqli_close($VeritabaniBaglantisi);
        header("Location: hastalarigoruntule.php");
    }


    ?>

    <div class="form-container">
        <form action="hastaekle.php" method="post">
            <label>TC_KimlikNo :</label>
            <input type="text" name="TC_KimlikNo" required>

            <label>Adı:</label>
            <input type="text" name="Adı" required>

            <label>Soyadı:</label>
            <input type="text" name="Soyadı" required>

            <label>DoğumTarihi:</label>
            <input type="date" name="DoğumTarihi" required>

            <label>Telefon:</label>
            <input type="text" name="Telefon" required>

            <label>Mail:</label>
            <input type="text" name="Mail" required>

            <label>Adres:</label>
            <input type="text" name="Adres" required>

            <input type="submit" value="Gönder">
        </form>
    </div>

</body>

</html>