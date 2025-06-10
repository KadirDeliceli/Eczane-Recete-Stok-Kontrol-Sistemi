<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">
    <title>Doktor Ekle</title>
</head>

<body>

    <?php
    $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
    mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

    if (isset($_POST["Adı"]) && isset($_POST["Soyadı"]) && isset($_POST["Branş"]) && isset($_POST["Telefon"]) && isset($_POST["Mail"]) && isset($_POST["HastaneID"])) {
        $ad   =  $_POST["Adı"];
        $sad  =  $_POST["Soyadı"];
        $br  =  $_POST["Branş"];
        $tel  =  $_POST["Telefon"];
        $mail =  $_POST["Mail"];
        $hId  =  $_POST["HastaneID"];
        $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_doktorekle('$ad','$sad','$br','$tel','$mail','$hId')");

        if ($sorgu) {
            echo "<p style='color: green; font-weight: bold;'>doktor Bilgileri başarıyla eklendi!</p>";
        } else {
            echo "<p style='color: red; font-weight: bold;'> dokto ekeleme sırasında bir sorun oluştu...</p>";
        }
        mysqli_close($VeritabaniBaglantisi);
        header("Location: doktorlarigoruntule.php");
    }


    ?>

    <div class="form-container">
        <form action="doktorekle.php" method="post">
            <label>Adı:</label>
            <input type="text" name="Adı" required>

            <label>Soyadı:</label>
            <input type="text" name="Soyadı" required>

            <label>Branş:</label>
            <input type="text" name="Branş" required>

            <label>Telefon:</label>
            <input type="text" name="Telefon" required>

            <label>Mail:</label>
            <input type="text" name="Mail" required>

            <label>HastaneID:</label>
            <input type="text" name="HastaneID" required>

            <input type="submit" value="Gönder">
        </form>
    </div>

</body>

</html>