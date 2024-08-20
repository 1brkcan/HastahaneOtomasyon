<?php

ob_start();
session_start();
include 'baglan.php';


if (isset($_POST['kullaniciKaydet'])){

    //echo "basarili";
    $kullanici_tc = isset($_POST['kullanici_tc']) ? $_POST['kullanici_tc'] : null;
    $kullanici_adsoyad = isset($_POST['kullanici_adsoyad']) ? $_POST['kullanici_adsoyad'] : null;
    $kullanici_password = isset($_POST['kullanici_password']) ? $_POST['kullanici_password'] : null;

    // Veri tabani ekleme islemi

    $sorgu = $db->prepare('INSERT INTO kullanici SET 

        kullanici_tc = ?,
        kullanici_adsoyad = ?,
        kullanici_password = ?
    
    ');

    $ekle = $sorgu->execute([
        $kullanici_tc, $kullanici_adsoyad, $kullanici_password
    ]);

    if($ekle){
        header('location:index.php?durum=basarili');
    }
    else {
        $hata = $sorgu->errorInfo();
        echo 'mysql hatasi'. $hata[2];
    }

}

// Veri tabani giris yapma islemi

if(isset($_POST['giris_yap'])){
    //echo 'dogru yer';
    $kullanici_tc = $_POST['kullanici_tc'];
    $kullanici_password = $_POST['kullanici_password'];

    $kullanisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_tc=:kullanici_tc and kullanici_password=:kullanici_password");
    $kullanisor->execute([
        'kullanici_tc' => $kullanici_tc,
        'kullanici_password' => $kullanici_password
    ]);

    $say = $kullanisor->rowCount();
    if($say==1){
        $_SESSION['userkullanici_tc']=$kullanici_tc;
        header('location:anasayfa.php?durum=girisbasarili');
        exit;
    }
    else{
        header('location:index.php?durum=girisbasarisiz');
        exit;
    }

}   

if(isset($_POST['randevu_kaydet'])){
    $randevu_sehir = isset($_POST['sehir']) ? $_POST['sehir']: null;
    $randevu_hastane = isset($_POST['hastane']) ? $_POST['hastane']: null;
    $randevu_doktor = isset($_POST['doktor']) ? $_POST['doktor']: null;
    $randevu_tarih = isset($_POST['tarih']) ? $_POST['tarih']: null;
    $randevu_klinik = isset($_POST['klinik']) ? $_POST['klinik']: null;
    $hasta_id = isset($_POST['kullanici_id']) ? $_POST['kullanici_id']: null;

    $kaydet = $db->prepare("INSERT INTO randevu Set

        randevu_sehir = ?,
        randevu_hastane = ?,
        randevu_doktor = ?,
        randevu_tarih = ?,
        randevu_klinik = ?,
        randevu_hasta_id = ?

    ");

    $insert = $kaydet->execute([
        $randevu_sehir, $randevu_hastane, $randevu_doktor, $randevu_tarih, $randevu_klinik, $hasta_id
    ]);

    if($insert){
        header('location:anasayfa.php?kayitbasarili');
    }
    else{
        header('location:anasayfa.php?kayitbasarisiz');
    }

}



?>












