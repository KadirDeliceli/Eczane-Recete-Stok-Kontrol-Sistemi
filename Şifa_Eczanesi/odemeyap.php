<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/film_ekle.css"> <!-- CSS dosyasını bağlama -->
    <link rel="icon" type="image/png" href="resim/favicon.png">

    <title>Ödeme yap</title>
</head>

<body>

    <?php
    $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
    mysqli_set_charset($VeritabaniBaglantisi, "UTF8");



    if (isset($_GET["ReceteID"])  &&  isset($_POST["OdemeTarihi"]) && isset($_POST["OdemeTutari"])  && isset($_POST["OdemeTuru"])  && isset($_POST["Aciklama"])) {
        $rID  =  $_GET["ReceteID"];
        $tarih   =  $_POST["OdemeTarihi"];
        $tutar  =  $_POST["OdemeTutari"];
        $tur  =  $_POST["OdemeTuru"];
        $acikla  =  $_POST["Aciklama"];

        $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_odemeekle('$rID','$tarih','$tutar','$tur','$acikla')");

        if ($sorgu) {
            echo "<p style='color: green; font-weight: bold;'>reçeteye ilaç Bilgileri başarıyla eklendi!</p>";
        } else {
            echo "<p style='color: red; font-weight: bold;'>reçeteye ilaç ekleme sırasında bir sorun oluştu...</p>";
        }


        mysqli_close($VeritabaniBaglantisi);

        header("Location: index.php");
    }
    $rTutar = 0;
    $rID  =  $_GET["ReceteID"];
    $sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_recetelerveilaclaribuli('$rID')");
    if ($sorgu) {
        while ($Kayit = mysqli_fetch_assoc($sorgu)) {
            $rTutar = ($Kayit['Doz'] * $Kayit['BirimFiyat']) + $rTutar;
        }
    }
    ?>

    <div class="form-container">
        <form action="#" method="post">
            <label>OdemeTarihi:</label>
            <input type="date" name="OdemeTarihi" value="<?php echo date('Y-m-d'); ?>" readonly>

            <label>OdemeTutari:</label>
            <input type="number" name="OdemeTutari" value="<?php echo $rTutar; ?>" step="0.01" readonly>

            <label>Aciklama:</label>
            <input type="text" name="Aciklama" required>

            <label for="OdemeTuru">Ödeme Türü:</label>
            <select name="OdemeTuru" id="OdemeTuru" required>
                <option value="">-- Seçiniz --</option>
                <option value="Nakit">Nakit</option>
                <option value="Kredi Kartı">Kredi Kartı</option>
                <option value="Havale">Havale</option>
            </select>
            <br>
            <input type="submit" value="Gönder">

        </form>
    </div>
</body>

</html>