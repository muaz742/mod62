<?php
/**
 * Kullanılan Editör: PhpStorm
 * Zaman Konumu: 20190517-140748
 * Geliştirici: muaz
 */

function mod62_encode($girdi, $anahtar = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
{
    /** anahtar diziyi tanımla */
    $anahtar = str_split($anahtar);
    /** bölüneni tanımla */
    $bolunen = $girdi;
    /** böleni tanımla */
    $bolen = count($anahtar);
    /** kalanları tanımla */
    $i = 0;
    $kalanlar = [];
    while ($bolunen > 1) {
        $kalan = $bolunen % $bolen;
        $bolum = floor($bolunen / $bolen);
        array_push($kalanlar, $kalan);
        $bolunen = $bolum;
        $i++;
    }
    /** karakterleri tanımla */
    $i = count($kalanlar) - 1;
    while ($i >= 0) {
        $degerA = $anahtar[$kalanlar[$i]];
        $i--;
        /** karşılık gelen değeri çıktıya ekle */
        (empty($cikti))?$cikti=$degerA:$cikti = $cikti . $degerA;
    }
    /** çıktıyı döndür */
    return $cikti;
}

function mod62_decode($girdi, $anahtar = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
{
    /** anahtar diziyi tanımla */
    $anahtar = str_split($anahtar);
    $anahtar = array_flip($anahtar);
    /** böleni tanımla */
    $bolen = count($anahtar);
    /** karakterleri tanımla */
    $girdi = str_split($girdi);
    $girdi = array_reverse($girdi);
    /** sayıyı hesapla */
    $i = 0;
    while ($i < count($girdi)) {
        $kalan = $anahtar[$girdi[$i]];
        $taban = pow($bolen, $i);
        /** karşılık gelen değeri çıktıya ekle */
        $bolunen = $kalan * $taban;
        (empty($cikti))? $cikti=$bolunen:$cikti = $cikti+$bolunen;
        $i++;
    }
    /** çıktıyı döndür */
    return $cikti;
}