<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/anasayfa.css"> <!-- CSS dosyasını bağlama -->
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">
    <title>reçeteye ilaç ekle</title>
</head>

<body>

    <?php
    $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
    mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

    if (isset($_GET["ReceteID"])  &&  isset($_POST["BarkodNo"]) && isset($_POST["Doz"])) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Hata ayarlarını aç

        try {
            $rID  = $_GET["ReceteID"];
            $bn   = $_POST["BarkodNo"];
            $doz  = $_POST["Doz"];

            $sorgu = mysqli_query($VeritabaniBaglantisi, "CALL ecz_receteyeilacekle('$rID', '$bn', '$doz')");

            echo "<p style='color: green; font-weight: bold;'>İlaç başarıyla eklendi!</p>";
        } catch (mysqli_sql_exception $e) {
            echo "<p style='color: red; font-weight: bold;'>Hata oluştu: " . $e->getMessage() . "</p>";
        }
    }
    
    ?>

    <div class="form-container">
        <form action="#" method="post">
            <label>BarkodNo:</label>
            <input type="text" name="BarkodNo" required>

            <label>Adet:</label>
            <input type="text" name="Doz" required>

            <input type="submit" value="Gönder">
            <?php if (isset($_GET["ReceteID"])) {
                $rId = $_GET["ReceteID"];  ?>
                <button type="button" onclick="window.location.href='odemeyap.php?ReceteID=<?php echo $rId; ?>'">Ödeme Sayfasına Git</button>
            <?php }   ?>
        </form>
    </div>
</body>

</html>