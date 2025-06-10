<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["DoktorID"])) {
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");
        $ID = $_GET["DoktorID"];
        mysqli_query($VeritabaniBaglantisi, "call ecz_doktorsil('$ID')");
        mysqli_close($VeritabaniBaglantisi);
    }
    header("Location: doktorlarigoruntule.php");

    ?>
</body>

</html>