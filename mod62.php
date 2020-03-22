<?php
/**
 * Kullanılan Editör: PhpStorm
 * Zaman Konumu: 20190517-140748
 * Geliştirici: muaz
 */

class Mod62
{
    /** standart karakter setini tanımla */
    public $anahtar = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    /** kodlama fonksiyonu tanımla */
    public function encode($girdi = 180667806)
    {
        /** karakter setini diziye dönüştür */
        $anahtar = $this->anahtar;
        $anahtar = str_split($anahtar);
        /** bölüneni tanımla */
        $bolunen = $girdi;
        /** böleni tanımla */
        $bolen = count($anahtar);
        /** kalanları tanımla */
        $kalanlar = [];
        if ($bolunen == 0) {
            array_push($kalanlar, $bolunen);
        } else {
            while ($bolunen > 0) {
                $kalan = $bolunen % $bolen;
                $bolum = floor($bolunen / $bolen);
                array_push($kalanlar, $kalan);
                $bolunen = $bolum;
            }
        }
        /** karakterleri tanımla */
        $i = count($kalanlar) - 1;
        while ($i >= 0) {
            $degerA = $anahtar[$kalanlar[$i]];
            $i--;
            /** karşılık gelen değeri çıktıya ekle */
            (empty($cikti)) ? $cikti = $degerA : $cikti = $cikti . $degerA;
        }
        /** çıktıyı döndür */
        return $cikti;
    }

    /** çözümleme fonksiyonu tanımla */
    public function decode($girdi = "mod62")
    {
        /** karakter setini diziye dönüştür */
        $anahtar = $this->anahtar;
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
            (empty($cikti)) ? $cikti = $bolunen : $cikti = $cikti + $bolunen;
            $i++;
        }
        /** çıktıyı döndür */
        return $cikti;
    }
}