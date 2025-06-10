<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["barkod"])) {
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");
        $barkod = $_GET["barkod"];
        mysqli_query($VeritabaniBaglantisi, "call ecz_ilacsil('$barkod')");
        mysqli_close($VeritabaniBaglantisi);
    }
    header("Location: ilaclarigoruntule.php");

    ?>
</body>

</html>