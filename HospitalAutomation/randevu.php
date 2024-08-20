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
    <table>
        <tr>
            <th>Hastane</th>
            <th>Klinik</th>
            <th>Doktor</th>
            <th>İl</th>
            <th>Tarih</th>
        </tr>

        <?php
            $randevusor = $db->prepare('SELECT * FROM randevu
             INNER JOIN kullanici ON randevu.randevu_hasta_id = kullanici.kullanici_id WHERE kullanici_tc=:kullanici_tc');

            $randevusor->execute([
                'kullanici_tc' => $_SESSION["userkullanici_tc"]
            ]);

            while($randevu_cek = $randevusor->fetch(PDO::FETCH_ASSOC)) {

        ?>

        <tr>
            <td><?php echo $randevu_cek['randevu_hastane']; ?></td>
            <td><?php echo $randevu_cek['randevu_klinik']; ?></td>
            <td><?php echo $randevu_cek['randevu_doktor']; ?></td>
            <td><?php echo $randevu_cek['randevu_sehir']; ?></td>
            <td><?php echo $randevu_cek['randevu_tarih']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
























