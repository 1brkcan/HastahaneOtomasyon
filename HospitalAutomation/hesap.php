<?php
include 'header.php';
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hastane Otomasyon</title>
</head>
<body>
    <div class="hesabimContent">
        <div class="label">
            <label for="">AD Soyad</label>
            <input type="text" placeholder="<?php echo $kullanicicek['kullanici_adsoyad'];?>">
        </div><br>
        <div class="label">
            <label for="">TC NO</label>
            <input type="text" placeholder="<?php echo $kullanicicek['kullanici_tc'];?>">
        </div><br>
        <button type="submit">Güncelle</button>
    </div>
</body>
</html>





























