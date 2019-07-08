<?php
/**
 * Kullanılan Editör: PhpStorm
 * Zaman Konumu: 20190517-140748
 * Geliştirici: muaz
 */

function mod62_encode($girdi)
{
    /** anahtar diziyi tanımla */
    $anahtar = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    /** sayaç değerini 0 olarak tanımla */
    $i = 0;
    /** kalanlar dizisini oluştur */
    $kalanlar = [];
    /** anahtar dizisi eleman sayısına bir ekle ve bölen değişkenine tanımla */
    $bolen = count($anahtar) + 1;
    /** eğer girdi, bölenden küçükse */
    if ($girdi < $bolen) {
        /** girdiyi kalanlar dizisine ekle */
        array_push($kalanlar, $girdi);
    }
    /** girdi, bölenden büyük oldukça çalıştır */
    while ($girdi > $bolen) {
        /** girdinin bölene bölümünden kalanı kalana tanımla */
        $kalan = $girdi % $bolen;
        /** girdiden kalanı çıkar ve girdiye tanımla */
        $girdi = $girdi - $kalan;
        /** girdiyi bölene böl */
        $girdi = $girdi / $bolen;
        /** kalanı kalanlar dizisine ekle */
        array_push($kalanlar, $kalan);
        /** eğer girdi, bölenden küçükse */
        if ($girdi < $bolen) {
            /** girdiyi kalanlar dizisine ekle */
            array_push($kalanlar, $girdi);
        }
        /** sayaç değerini 1 arttır */
        $i++;
    }
    /** sayaç değerini 0 olarak tanımla */
    $i = 0;
    /** sayaç değeri kalanlar dizisinin eleman sayısından küçük oldukça çalıştır */
    while ($i < count($kalanlar)) {
        /** eğer çıktı değeri tanımlı değilse */
        if (!isset($cikti)) {
            /** kalana karşılık gelen değeri çıktıya tanımla */
            $cikti = $anahtar[$kalanlar[$i] - 1];
        } else {
            /** kalana karşılık gelen sonucu çıktının sonuna ekle */
            $cikti = $cikti . $anahtar[$kalanlar[$i] - 1];
        }
        /** kontrol değerini 1 arttır */
        $i++;
    }
    /** çıktıyı döndür */
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