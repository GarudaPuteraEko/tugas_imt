<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator IMT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$text= "";
$text2= "";
$text3= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $berat_badan = $_POST["berat_badan"];
    $tinggi_badan = $_POST["tinggi_badan"];

    if (is_numeric($berat_badan) && is_numeric($tinggi_badan)) {
        $imt = hitungIMT($berat_badan, $tinggi_badan);

        $klasifikasi = klasifikasiIMT($imt);

        $text = "<p>IMT anda adalah: " . number_format($imt, 2) . "<br>" ;
        $text2 = $klasifikasi;
    } else {
        $text3 = "ANDA BELUM MEMASUKAN INPUT DATA!!!";
    }
}

function hitungIMT($berat_badan, $tinggi_badan) {
    $imt = $berat_badan / ($tinggi_badan * $tinggi_badan);
    return $imt;
}

function klasifikasiIMT($imt) {
    if ($imt < 18.5) {
        return "Sangat Kurus";
    } elseif ($imt >= 18.5 && $imt < 24.9) {
        return "ideal";
    } elseif ($imt >= 25 && $imt < 39.9) {
        return "Kelebihan Berat Badan";
    } else {
        return "Obesitas";
    }
}
?>

<div class="container">
    <div class="text">

    <p class="t">IMT</p>
    <p class="t2"><?=$text2, $text, $text3 ?></p>
    </div>
    <div class="form">
    <form method="post" action="">
        <div class="input">
            <label for="berat_badan"></label>
            <input type="text" id="berat_badan" name="berat_badan" placeholder="Berat Badan" ><br></br>

            <label for="tinggi_badan"></label>
            <input type="text" id="tinggi_badan" name="tinggi_badan" placeholder="Tinggi Badan" ><br></br>

            <label for="Hitung IMT"></label>
            <input type="submit" placeholder="Hitung IMT" >
        </div>
    </form>
    </div>
</div>

</body>
</html>