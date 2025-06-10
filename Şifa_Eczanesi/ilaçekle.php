<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">
    <title>İlaç ekle</title>
</head>

<body>

    <?php
    $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
    mysqli_set_charset($VeritabaniBaglantisi, "UTF8");



    if (isset($_POST["BarkodNo"]) && isset($_POST["IlacAdı"]) && isset($_POST["Kategori"]) && isset($_POST["Firma"]) && isset($_POST["BirimFiyat"]) && isset($_POST["Açıklama"]) && isset($_POST["StokMiktarı"]) && isset($_POST["Birimi"])) {
        $bar  =  $_POST["BarkodNo"];
        $ad   =  $_POST["IlacAdı"];
        $kat  =  $_POST["Kategori"];
        $fir  =  $_POST["Firma"];
        $brf  =  $_POST["BirimFiyat"];
        $acik =  $_POST["Açıklama"];
        $stk  =  $_POST["StokMiktarı"];
        $brm  =  $_POST["Birimi"];
        $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_yeniilacekle('$bar','$ad','$kat','$fir','$brf','$acik','$stk','$brm')");

        if ($sorgu) {
            echo "<p style='color: green; font-weight: bold;'>ilaç Bilgileri başarıyla eklendi!</p>";
        } else {
            echo "<p style='color: red; font-weight: bold;'>ilaç ekleme sırasında bir sorun oluştu...</p>";
        }
        mysqli_close($VeritabaniBaglantisi);
        header("Location: ilaclarigoruntule.php");
    }

    ?>

    <div class="form-container">
        <form action="ilaçekle.php" method="post">
            <label>BarkodNo:</label>
            <input type="text" name="BarkodNo" required>

            <label>IlacAdı:</label>
            <input type="text" name="IlacAdı" required>

            <label>Kategori:</label>
            <input type="text" name="Kategori" required>

            <label>Firma:</label>
            <input type="text" name="Firma" required>

            <label>BirimFiyat:</label>
            <input type="text" name="BirimFiyat" required>

            <label>Açıklama:</label>
            <input type="text" name="Açıklama" required>

            <label>StokMiktarı:</label>
            <input type="text" name="StokMiktarı" required>

            <label>Birimi:</label>
            <input type="text" name="Birimi" required>

            <input type="submit" value="Gönder">
        </form>
    </div>
</body>

</html>