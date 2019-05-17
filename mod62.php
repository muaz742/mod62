<?php
/**
 * Kullanılan Editör: PhpStorm
 * Zaman Konumu: 20190517-140748
 * Geliştirici: muaz
 */

function mod62_encode($girdi)
{
    $anahtar = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $i = 0;
    $kalanlar = [];
    $bolen = count($anahtar) + 1;
    if ($girdi < $bolen) {
        array_push($kalanlar, $girdi);
    }
    while ($girdi > $bolen) {
        $kalan = $girdi % $bolen;
        $girdi = $girdi - $kalan;
        $girdi = $girdi / $bolen;
        array_push($kalanlar, $kalan);
        if ($girdi < $bolen) {
            array_push($kalanlar, $girdi);
        }
        $i++;
    }
    $i = 0;
    while ($i < count($kalanlar)) {
        if (!isset($cikti)) {
            $cikti = $anahtar[$kalanlar[$i] - 1];
        } else {
            $cikti = $cikti . $anahtar[$kalanlar[$i] - 1];
        }
        $i++;
    }
    return $cikti;
}

function mod62_decode($girdi)
{
    $anahtar = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $girdi = str_split($girdi);
    $anahtar = array_flip($anahtar);
    $i = 0;
    $kalanlar = [];
    while ($i < count($girdi)) {
        array_push($kalanlar, $anahtar[$girdi[$i]] + 1);
        $i++;
    }
    $carpan = count($anahtar) + 1;
    $i = 0;
    while ($i < count($kalanlar)) {
        $degerA = pow($carpan, $i);
        $degerB = $kalanlar[$i];
        $islem = $degerA * $degerB;
        (empty($cikti)) ? $cikti = $islem : $cikti = $cikti + $islem;
        $i++;
    }
    return $cikti;
}