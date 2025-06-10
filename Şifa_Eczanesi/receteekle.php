<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="stylesheet" href="css/anasayfa.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">
    <title>reçete ekle</title>
</head>

<body>

    <a href="index.php" class="btn">Ana Sayfa</a>

    <?php
    $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
    mysqli_set_charset($VeritabaniBaglantisi, "UTF8");



    if (isset($_POST["ReceteID"]) && isset($_POST["ReceteTarihi"]) && isset($_POST["DoktorID"]) && isset($_POST["TC_KimlikNo"])) {
        $rID  =  $_POST["ReceteID"];
        $rt   =  $_POST["ReceteTarihi"];
        $dID  =  $_POST["DoktorID"];
        $TC  =  $_POST["TC_KimlikNo"];

        // TC'yi sadece rakam olarak al, varsa boşluk/simgeyi temizle
        $TC = preg_replace('/\D/', '', $TC); // Sadece sayılar
        $TC = (float)$TC; // DECIMAL(11,0) uyumu için sayıya çevir

        $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_recetecekle('$rID','$rt','$dID',$TC)");

        if ($sorgu) {
            echo "<p style='color: green; font-weight: bold;'>reçete Bilgileri başarıyla eklendi!</p>";
        } else {
            echo "<p style='color: red; font-weight: bold;'>reçete ekleme sırasında bir sorun oluştu...</p>";
        }
        mysqli_close($VeritabaniBaglantisi);
        header("Location: receteyeilacekle.php?ReceteID=" . $rID);
    }
    ?>

    <div class="form-container">
        <form action="receteekle.php" method="post">
            <label>Reçete Numarası :</label>
            <input type="text" name="ReceteID" required>

            <label>ReceteTarihi:</label>
            <input type="date" name="ReceteTarihi" value="<?php echo date('Y-m-d'); ?>" required>

            <label>Doktor Numarası:</label>
            <input type="text" name="DoktorID" required>

            <label>TC_KimlikNo:</label>
            <input type="text" name="TC_KimlikNo" required>

            <input type="submit" value="Gönder">
        </form>
    </div>
</body>

</html>