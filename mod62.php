<?php
/**
 * Kullanılan Editör: PhpStorm
 * Zaman Konumu: 20190517-140748
 * Geliştirici: muaz
 */

function mod62_encode($girdi, $anahtar = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
{
    $bolunen = $girdi;
    $anahtar = str_split($anahtar);
    $i = 0;
    $kalanlar = [];
    $bolen = count($anahtar);
    while ($bolunen > 1) {
        $kalan = $bolunen % $bolen;
        $bolum = floor($bolunen / $bolen);
        array_push($kalanlar, $kalan);
        $bolunen = $bolum;
        $i++;
    }
    $i = count($kalanlar) - 1;
    while ($i >= 0) {
        $degerA = $anahtar[$kalanlar[$i]];
        $i--;
        $cikti = $cikti . $degerA;
    }
    /** çıktıyı döndür */
    return $cikti;
}

function mod62_decode($girdi, $anahtar = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
{
    $anahtar = str_split($anahtar);
    $bolen = count($anahtar);
    $girdi = str_split($girdi);
    $girdi = array_reverse($girdi);
    $anahtar = array_flip($anahtar);
    $i = 0;
    while ($i < count($girdi)) {
        $kalan = $anahtar[$girdi[$i]];
        $taban = pow($bolen, $i);
        $bolunen = $kalan * $taban;
        $cikti = $cikti+$bolunen;
        $i++;
    }
    /** çıktıyı döndür */
    return $cikti;
}