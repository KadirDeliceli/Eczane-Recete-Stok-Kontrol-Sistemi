<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["HastaneID"])) {
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");
        $ID = $_GET["HastaneID"];
        mysqli_query($VeritabaniBaglantisi, "call ecz_hastanesil('$ID')");
        mysqli_close($VeritabaniBaglantisi);
        echo "if de";
    } else {
        echo "if e girmedi";
    }
    header("Location: zhastanegoruntule.php");

    ?>
</body>

</html>