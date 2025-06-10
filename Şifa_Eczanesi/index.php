<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>

    <link rel="stylesheet" href="css/anasayfa.css"> <!-- CSS dosyasını bağlama -->
    <link rel="stylesheet" href="css/dropdown.css"> <!-- CSS dosyasını bağlama -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="resim/favicon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <div class="overlay"></div> <input type="text" id="arama" placeholder="" onkeyup="filmAra()">

    <br><br><br><br><br>

    <div class="film-container">
        <?php

        echo "<div class='film'>";
        echo    "<div class='image-container'>";
        echo        "<a href='receteleri_goruntule.php'>";
        echo            "<img src='resim/recete.jpeg' alt='Bilgi Afişi'>";
        echo        "</a>";
        echo    "</div>";
        echo     "<p class='film-isim'><strong>Reçeteleri Görüntüle</strong></p>";
        //echo     "<a href='" . $Kayit["link"] . "' target='_blank' class='imdb-btn'>IMDb</a>";
        echo "</div>";

        echo "<div class='film'>";
        echo    "<div class='image-container'>";
        echo        "<a href='doktorlarigoruntule.php'>";
        echo            "<img src='resim/doktor.jpeg' alt='Bilgi Afişi'>";
        echo        "</a>";
        echo    "</div>";
        echo     "<p class='film-isim'><strong>Doktorları Görüntüle</strong></p>";
        //echo     "<a href='" . $Kayit["link"] . "' target='_blank' class='imdb-btn'>IMDb</a>";
        echo "</div>";

        echo "<div class='film'>";
        echo    "<div class='image-container'>";
        echo        "<a href='hastalarigoruntule.php'>";
        echo            "<img src='resim/hasta.jpeg' alt='Bilgi Afişi'>";
        echo        "</a>";
        echo    "</div>";
        echo     "<p class='film-isim'><strong>Hastaları Görüntüle</strong></p>";
        //echo     "<a href='" . $Kayit["link"] . "' target='_blank' class='imdb-btn'>IMDb</a>";
        echo "</div>";

        echo "<div class='film'>";
        echo    "<div class='image-container'>";
        echo        "<a href='ilaclarigoruntule.php'>";
        echo            "<img src='resim/ilaç.jpeg' alt='Bilgi Afişi'>";
        echo        "</a>";
        echo    "</div>";
        echo     "<p class='film-isim'><strong>ilaçları Görüntüle</strong></p>";
        //echo     "<a href='" . $Kayit["link"] . "' target='_blank' class='imdb-btn'>IMDb</a>";
        echo "</div>";

        echo "<div class='film'>";
        echo    "<div class='image-container'>";
        echo        "<a href='zhastanegoruntule.php'>";
        echo            "<img src='resim/hastane.jpeg' alt='Bilgi Afişi'>";
        echo        "</a>";
        echo    "</div>";
        echo     "<p class='film-isim'><strong>Hastane Görüntüle</strong></p>";
        //echo     "<a href='" . $Kayit["link"] . "' target='_blank' class='imdb-btn'>IMDb</a>";
        echo "</div>";

        echo "<div class='film'>";
        echo    "<div class='image-container'>";
        echo        "<a href='odemeleriGoruntule.php'>";
        echo            "<img src='resim/odeme.jpeg' alt='Bilgi Afişi'>";
        echo        "</a>";
        echo    "</div>";
        echo     "<p class='film-isim'><strong>Ödemeler Görüntüle</strong></p>";
        //echo     "<a href='" . $Kayit["link"] . "' target='_blank' class='imdb-btn'>IMDb</a>";
        echo "</div>";

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