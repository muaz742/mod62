class Mod62 {
    constructor(girdi, anahtar = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789") {
        this.girdi = girdi;
        this.anahtar = anahtar;
    }

    /** kodlama fonksiyonu tanımla */
    encode() {
        /** karakter setini diziye dönüştür */
        var anahtar = this.anahtar.split("");
        /** bölüneni tanımla */
        if (this.girdi == null) {
            this.girdi = 46999;
        }
        var bolunen = this.girdi;
        /** böleni tanımla */
        var bolen = anahtar.length;
        var bolum;
        var kalan;
        /** kalanları tanımla */
        var kalanlar = [];
        if (bolunen == 0) {
            kalanlar.push(bolunen);
        } else {
            while (bolunen > 0) {
                kalan = bolunen % bolen;
                bolum = Math.floor(bolunen / bolen);
                kalanlar.push(kalan);
                bolunen = bolum;
            }
        }
        /** karakterleri tanımla */
        var i = kalanlar.length;
        var degerA;
        var cikti;
        while (i > 0) {
            i--;
            degerA = anahtar[kalanlar[i]];
            /** karşılık gelen değeri çıktıya ekle */
            if (cikti == null) {
                cikti = degerA;
            } else {
                cikti = cikti + degerA;
            }
        }

        /** çıktıyı döndür */
        return cikti;
    }

    /** çözümleme fonksiyonu tanımla */
    decode() {
        /** karakter setini diziye dönüştür */
        var anahtar = this.anahtar.split("");
        /** böleni tanımla */
        var bolen = anahtar.length;
        /** karakter seti dizisini döndür */
        anahtar = array_flip(anahtar);
        function array_flip(trans) {
            var key, tmp_ar = {};

            for (key in trans) {
                if (trans.hasOwnProperty(key)) {
                    tmp_ar[trans[key]] = key;
                }
            }

            return tmp_ar;
        }
        /** karakterleri tanımla */
        var girdi;
        if (this.girdi == null) {
            girdi = 46999;
        } else {
            girdi = this.girdi;
        }
        girdi = String(girdi);
        girdi = girdi.split("");
        girdi = girdi.reverse();
        /** sayıyı hesapla */
        var i = 0;
        var kalan;
        var bolunen;
        var cikti;
        var taban;
        while (i < girdi.length) {
            kalan = anahtar[girdi[i]];
            taban = Math.pow(bolen, i);
            /** karşılık gelen değeri çıktıya ekle */
            bolunen = kalan * taban;
            if (cikti == null) {
                cikti = bolunen;
            } else {
                cikti = cikti + bolunen;
            }
            i++;
        }
        /** çıktıyı döndür */
        return cikti;
    }
}

/** örnek kullanım
 //obje oluşturumu
let obje = new Mod62();

//kodlama işlevi kullanımı
obje.girdi = 46999;
console.log(obje.encode());

//çözümleme işlevi kullanımı
obje.girdi = "ba";
console.log(obje.decode());
*/