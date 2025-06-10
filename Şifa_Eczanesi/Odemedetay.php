<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme Detayı</title>

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

    <div class="overlay"></div> <input type="text" id="arama" placeholder="İlaç Barkod Numarası Giriniz..." onkeyup="filmAra()">

    <div class="film-container">
        <?php

        // Veritabanına bağlan
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

        if (mysqli_connect_errno()) {
            echo "Bağlantı Hatası: " . mysqli_connect_error();
            die();
        }

        if (isset($_GET["ReceteID"])) {
            $receteno = $_GET["ReceteID"];

            $Sorgu = mysqli_query($VeritabaniBaglantisi, "call ecz_recetelerveilaclaribuli($receteno)");
            if ($Sorgu) {
                $sayac = 0;
                echo "<div class='ilaclar-container'>";
                echo "<div class='film' data-film-id='" . $receteno . "'>";
                echo     "<p><strong>Recete Numarası:</strong> " . $receteno . "</p>";
                while ($Kayit = mysqli_fetch_assoc($Sorgu)) {
                    if ($sayac == 0) {
                        echo     "<p><strong>ReceteTarihi:</strong> " . $Kayit["ReceteTarihi"] . "</p>";
                        echo     "<p><strong>TC_KimlikNo:</strong>" . $Kayit["TC_KimlikNo"] . "</p>";
                        echo     "<p><strong>Hasta Adı Soyadı:</strong>" . $Kayit["Hasta Adı Soyadı"] . "</p>";
                        echo "<pre>";
                        echo "<p style='color: black;'><strong>Reçetedeki ilaçlar:</strong></p>";
                        echo "</pre>";
                        $sayac++;
                    }
                    echo "<p style='color: black;'><strong>BarkodNo:</strong> " . $Kayit["BarkodNo"] . " " .
                        "<strong>Doz:</strong> " . $Kayit["Doz"] . " " .
                        "<strong>BirimFiyat:</strong> " . $Kayit["BirimFiyat"];
                    echo "<br>";
                }
                mysqli_close($VeritabaniBaglantisi);

                $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
                mysqli_set_charset($VeritabaniBaglantisi, "UTF8");

                //call ecz_recetelerveodemelerihepsi(); 
                $Sorgu1 = mysqli_query($VeritabaniBaglantisi, "call ecz_odemeleribul($receteno)");
                $Kayit1 = mysqli_fetch_assoc($Sorgu1);
                echo     "<p style='color: black;'><strong>Toplam Tutar:</strong>" . $Kayit1["OdemeTutari"] . "</p>";

                echo "</div>";
                echo "</div>";
            } else {
                echo "Sorgu Hatası";
            }
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