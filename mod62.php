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
    /** anahtar diziyi tanımla */
    $anahtar = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    /** girdiyi karakterlerine böl ve diziye çevir */
    $girdi = str_split($girdi);
    /** anahtar dizisinin indis ve değerlerini yer değiştir */
    $anahtar = array_flip($anahtar);
    /** sayaç değerini 0 olarak tanımla */
    $i = 0;
    /** kalanlar dizisini oluştur */
    $kalanlar = [];
    /** sayaç değeri, girdi dizisi eleman sayısından küçük oldukça çalıştır */
    while ($i < count($girdi)) {
        /** anahtar dizisinde girdiye karşılık gelen sonucu kalanlar dizisine ekle */
        array_push($kalanlar, $anahtar[$girdi[$i]] + 1);
        /** sayaç değerini 1 arttır */
        $i++;
    }
    /** anahtar dizisinin eleman sayısının 1 fazlasını çarpan değişkenine tanımla */
    $carpan = count($anahtar) + 1;
    /** sayaç değerini 0 olarak tanımla */
    $i = 0;
    /** sayaç değeri, kalanlar dizisinin elaman sayısından küçük oldukça çalıştır */
    while ($i < count($kalanlar)) {
        /** çarpan üzeri sayaç değeri işleminin sonucunu degerA değişkenine tanımla */
        $degerA = pow($carpan, $i);
        /** kalanlar dizisinde sayaç değerine karşılık gelen değeri degerB değişkenine tanımla */
        $degerB = $kalanlar[$i];
        /** degerA ile degerB değerlerini çarp islem değişkenine tanımla */
        $islem = $degerA * $degerB;
        /** eğer çıktı değeri boşsa; çıktı değerini işlem değerinden al değilse çıktı değerine işlem değerini ekle */
        (empty($cikti)) ? $cikti = $islem : $cikti = $cikti + $islem;
        /** sayaç değerini 1 arttır */
        $i++;
    }
    /** çıktıyı döndür */
    return $cikti;
}