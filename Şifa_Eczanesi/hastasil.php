<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["TC_KimlikNo"])) {
        $VeritabaniBaglantisi = mysqli_connect("localhost", "root", "", "sifa_eczanesi", 3357);
        mysqli_set_charset($VeritabaniBaglantisi, "UTF8");
        $TC = $_GET["TC_KimlikNo"];
        mysqli_query($VeritabaniBaglantisi, "call ecz_hastasil('$TC')");
        mysqli_close($VeritabaniBaglantisi);
        echo "if de";
    } else {
        echo "if e girmedi";
    }
    header("Location: hastalarigoruntule.php");

    ?>
</body>

</html>