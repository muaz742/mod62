import math

class Mod62:
    """
    URL Shortener like functions.
    """

    def __init__(self):
        self.anahtar = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"

    # kodlama fonksiyonu tanımla
    def encode(self,girdi):
        """
        Encode a value using the mod62 algorithm.

        :param girdi: The value to encode. Must be an integer.
        :return: The encoded value. Return type string.
        """
        # bölüneni tanımla
        if type(girdi) != int:
            girdi = 46999
        bolunen = girdi
        # böleni tanımla
        bolen = len(self.anahtar)
        # kalanları tanımla
        kalanlar = []
        if bolunen ==0:
            kalanlar.append(bolunen)
        else:
            while(bolunen > 0):
                kalan = bolunen % bolen
                bolum = math.floor(bolunen / bolen)
                kalanlar.append(kalan)
                bolunen = bolum
        # karakterleri tanımla
        i = kalanlar.__len__()
        degerA = ""
        cikti = ""
        while(i > 0):
            i -= 1
            degerA = self.anahtar[kalanlar[i]]
            # karşılık gelen değerş çıktıya ekle
            if cikti =="":
                cikti = degerA
            else:
                cikti = cikti + degerA
        # çıktıyı döndür
        return cikti

    # çözümleme fonsiyonu tanımla
    def decode(self,girdi):
        """
        Decode a string using the mod62 algorithm.

        :param girdi: The string to decode. Must be a string.
        :return: The decoded value. Return type integer.
        """
        cikti = ""
        # karakter setini objeye döndür

        # böleni tanımla
        bolen = len(self.anahtar)
        # karakter seti dizisini döndür
        anahtar = self._flip(self.anahtar)
        # karakterleri tanımla
        if type(girdi) != str:
            girdi = "ba"
        girdi = girdi[::-1]
        # sayıyı hesapla
        i = 0
        while(i < girdi.__len__()):
            kalan = anahtar[girdi[i]]
            taban = int(math.pow(bolen,i))
            # karşılık gelen değeri çıktıya ekle
            bolunen = kalan * taban
            if cikti == "":
                cikti = bolunen
            else:
                cikti = cikti + bolunen
            i += 1
        # çıktıyı döndür
        return cikti

    def _flip(self,yazi):
        """
        Flip a string.
        
        :param yazi: The string to flip. Must be a string.
        :return: The flipped string. Return type dictionary.
        """
        i = len(yazi)
        sozluk = dict()
        while i > 0:
            i -=1
            sozluk[yazi[i]]= i
        return sozluk

# örnek kullanım
if __name__ == "__main__":
    # obje oluşturumu
    obje = Mod62()

    # kodlama işlevi kullanımı
    print(obje.encode(46999))
    print(type(obje.encode(46999)))

    # çözümleme işlevi kullanımı
    print(obje.decode("ba"))
    print(type(obje.decode("ba")))