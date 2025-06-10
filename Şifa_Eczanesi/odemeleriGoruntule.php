<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ödemeleri görüntüleme</title>

    <link rel="stylesheet" href="css/anasayfa.css"> <!-- CSS dosyasını bağlama -->
    <link rel="stylesheet" href="css/dropdown.css"> <!-- CSS dosyasını bağlama -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="resim/favicon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 40px;
    }

    .ilaclar-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .film {
        width: 280px;
        /* Sabit genişlik – yan yana görünüm için */
        background-color: rgba(255, 255, 255, 0.92);
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .film:hover {
        transform: scale(1.03);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .film p {
        margin: 8px 0;
        color: #333;
        font-size: 15px;
    }

    .film-isim {
        font-size: 17px;
        font-weight: bold;
        color: #2c3e50;
    }
</style>



<body>
    <a href="index.php" class="btn">Ana Sayfa</a>
    <br>

    <div class="overlay"></div> <input type="text" id="arama" placeholder="Reçete Numarası Giriniz..." onkeyup="filmAra()">

    <div class="film-container">
        <?php

        // Veritabanına bağlan
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

        if (mysqli_connect_errno()) {
            echo "Bağlantı Hatası: " . mysqli_connect_error();
            die();
        }

        $Sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_recetelerveodemelerihepsi()");
        if ($Sorgu) {
            echo "<div class='ilaclar-container'>";
            while ($Kayit = mysqli_fetch_assoc($Sorgu)) {
                echo "<div class='film'>";
                echo     "<p class='film-isim'><strong>Reçete Numarası:</strong> " . $Kayit["ReceteID"] . "</p>";
                echo     "<p><strong>ReceteTarihi:</strong> " . $Kayit["ReceteTarihi"] . "</p>";
                echo     "<p><strong>DoktorID:</strong>" . $Kayit["DoktorID"] . "</p>";
                echo     "<p><strong>TC_KimlikNo:</strong>" . $Kayit["TC_KimlikNo"] . "</p>";
                echo     "<p><strong>Hasta Adı Soyadı:</strong>" . $Kayit["Hasta Adı Soyadı"] . "</p>";
                echo     "<p><strong>OdemeTutari:</strong>" . $Kayit["OdemeTutari"] . "</p>";  
                echo     "<a href='Odemedetay.php?ReceteID=" . $Kayit["ReceteID"] . "'class='imdb-btn'>Ödeme Detayı</a>";
         
                echo "</div>";
            }
            echo "</div>";
        } else { 
            echo "Sorgu Hatası";
        }

        mysqli_close($VeritabaniBaglantisi);
        echo "<br><br><br>"
        ?>
    </div>

    <script>
        function filmAra() {
            let input = document.getElementById("arama").value.toLowerCase();
            let filmler = document.querySelectorAll(".film");

            filmler.forEach(film => {
                let isim = film.querySelector(".film-isim").innerText.toLowerCase();
                if (isim.includes(input)) {
                    film.style.display = "block";
                } else {
                    film.style.display = "none";
                }
            });
        }
    </script>



</body>

</html>