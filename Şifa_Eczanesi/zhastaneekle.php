<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">
    <title>Hastane Ekle</title>
</head>

<body>

    <?php
    $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
    mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

    if (isset($_POST["HastaneAdı"]) && isset($_POST["Telefon"]) && isset($_POST["Adres"])) {
        $ad   =  $_POST["HastaneAdı"];
        $tel  =  $_POST["Telefon"];
        $adr  =  $_POST["Adres"];
        $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_hastaneekle('$ad','$tel','$adr')");

        if ($sorgu) {
            echo "<p style='color: green; font-weight: bold;'>hasta Bilgileri başarıyla eklendi!</p>";
        } else {
            echo "<p style='color: red; font-weight: bold;'> hasta ekeleme sırasında bir sorun oluştu...</p>";
        }
        mysqli_close($VeritabaniBaglantisi);
        header("Location: zhastanegoruntule.php");
    }


    ?>

    <div class="form-container">
        <form action="zhastaneekle.php" method="post">
            <label>HastaneAdı:</label>
            <input type="text" name="HastaneAdı" required>

            <label>Adres:</label>
            <input type="text" name="Adres" required>

            <label>Telefon:</label>
            <input type="text" name="Telefon" required>

            <input type="submit" value="Gönder">
        </form>
    </div>

</body>

</html>