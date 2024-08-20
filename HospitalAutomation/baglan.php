<?php

try {
    $db = new PDO("mysql:host=localhost; dbname=hastane_otomasyon; charset=utf8", 'root', '540263bb');
    //echo "Veri baglantisi basarili";
} catch (Exception $e){
    echo $e->getMessage();
}



?>











