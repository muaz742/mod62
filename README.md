# mod62
link kısaltma url oluşturma gibi işlemlerde kullanılan kodlayıcı

<table>
  <tr>
    <td><b>başlıklar</b></td>
  </tr>
  <tr>
    <td>
      <ul>
        <li>
          <a href="https://github.com/muaz742/mod62#nedir">
            nedir
          </a>
        </li>
        <li>
          <a href="https://github.com/muaz742/mod62#ne-i%C5%9Fe-yarar">
            ne işe yarar?
          </a>
        </li>
        <li>
          <a href="https://github.com/muaz742/mod62#nas%C4%B1l-kullan%C4%B1l%C4%B1r">
            nasıl kullanılır?
          </a>
          <ul>
            <li>
              <a href="https://github.com/muaz742/mod62#mod62_encode-kullan%C4%B1m%C4%B1">
                mod62_encode kullanımı
              </a>
            </li>
            <li>
              <a href="https://github.com/muaz742/mod62#mod62_decode-kullan%C4%B1m%C4%B1">
                mod62_decode kullanımı
              </a>
            </ul
        </li>
        <li>          
          <a href="https://github.com/muaz742/mod62#nas%C4%B1l-%C3%A7al%C4%B1%C5%9F%C4%B1r">
            nasıl çalışır?
          </a>
          <ul>
            <li>
              <a href="https://github.com/muaz742/mod62#%C3%A7%C3%B6z%C3%BCmleme-mant%C4%B1%C4%9F%C4%B1-%C3%B6rnekli-anlat%C4%B1m">
                çözümleme mantığı (örnekli anlatım)
              </a>
            </li>
            <li>
              <a href="https://github.com/muaz742/mod62#kodlama-mant%C4%B1%C4%9F%C4%B1-%C3%B6rnekli-anlat%C4%B1m">
                kodlama mantığı (örnekli anlatım)
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </td>
  </tr>
</table>

## nedir?
bu sınıf;<br>
girdi olarak gelen bir sayıyı daha az basamaklı karakter dizisine dönüştürür. ve bu yeni oluşan diziyi çıktı verir.<br>
tam aksi yönde çözümleme işlemi de yapabilir.<br>
standart olarak 62 basamaklı anahtar dizisini kullanır. tercihen yeni bir anahtar tanımlanabilir.

## ne işe yarar?
bu sınıfı kısaltılmış link oluşturma ihtiyacımı karşılamak amacıyla geliştirdim.<br>
kabaca, sayısal ifadelerin karakter setindeki ifadeler kullanılarak yeniden ifade edilmesini sağlar.<br>

## nasıl kullanılır?
İndirilen [mod62.php](mod62.php) dosyası kullanılacak yapıya eklenir.

ardından kullanılmak istenen yapıya dahil edilir.
~~~php
include 'mod62.php';
~~~
şeklinde ekleme yapılabilir.<br>
```Mod62()```sınıfı ile obje oluşturulur. Obje içerisinden ```encode()``` ve ```decode()``` fonksiyonları ile kullanılabilir.<br>
**örnek kullanım**;
```php
//obje oluşturumu
$obje = new Mod62();

//kodlama işlevi kullanımı
echo $obje->encode(46999); //kodlanacak değer sayı tipinde olmalıdır.

//çözümleme işlevi kullanımı
echo $obje->decode('ba');
```

## nasıl çalışır?
fonksiyon çalışmak için anahtar dizisi ve girdiye ihtiyaç duyar.<br>
anahtar dizisi standart olarak tanımlıdır. tercihen tanımlanabilir.<br>
standart olarak tanımlı anahtar dizisi sırasıyla,<br>
'a-z', 'A-Z', '0-9' aralıklarındaki karakter dizilerinin birleşiminden oluşur.<br>
karakter desteği sorunu yaşamamak için ingilizce alfabe kerakterleri kullanılır.<br>
oluşan karakter seti bu şekildedir;
``` "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" ```

fonksiyon,<br>
genel olarak kullandığımız sayı sistemi olan mod 10 tabanındaki sayısal ifadeleri<br>
mod 62 tabanına dönüştürür.<br>
dönüştürme işlemi ile her basamağa ait basamak değerleri oluşur.<br>
anahtar dizi içerisinde basamak değerine denk sıradaki karakterler belirlenir.<br>
taban değeri anahtar dizisi eleman sayısına göre belirlenmiştir<br>
ve bu yüzden basamak değeri anahtar dizide mutlaka karşılık bulacaktır.<br>
basamak değerine karşılık gelen karakterler sırasıyla yazılır.<br>
böylelikle sayısal ifade daha fazla karakter kullanılarak daha az basamak ile ifade edilmiş olur.<br>
62 taban değeri standart olarak tanımlı anahtar karakter dizisinin eleman sayısının karşılığıdır.<br>
anahtar dizi tercihe göre değiştirilebilir<br>
ve fonksiyon yeni tanımlanan anahtar diziye göre kodlama ve çözümleme yapabilir.

kodlama ve çözümleme içerisinde,<br>
temel olarak *sayı modu dönüştürme* ve *karakter tanımlama* olmak üzere iki yöntem kullanılmaktadır.<br>

### kodlama mantığı (örnekli anlatım)

örneğin mod62_encode(123456) işlemini yaparken,

girdi olarak anahtar dizisi tanımlanmışsa;<br>
bölüm değeri, anahtar dizisinin eleman sayısıdır.<br>
değilse;<br>
bölüm değeri, standart olarak tanımlı olan anahtar dizisinin eleman sayısı olan 62'dir.

**sayı modu dönüştürme**

öncelikle 123456 sayısı mod 62 tabanına dönüştürülür. bunun için sayı;

bölüm değeri 0 oluncaya dek 62'ye bölünür.<br>
işlem kaydı aşağıdaki gibi olur;

|işlem<br>sırası|bölünen|bölen|bölüm|kalan|
|:---:|--:|:---:|--:|--:|
|0|123456|62|1991|14|
|1|1991|62|32|7|
|2|31|62|0|32|

işlem kayıtlarına göre her satıra ait eleman oluşturulur.<br>
gösterimi <b>*kalan* X *bölen*<sup>*işlem sırası*</sup></b> şeklindedir.<br>
bu elamanların toplamı sayının kendisine eşittir.<br>

elemanların işlem ve sonuç sütunlarını eklendiğinde tablo aşağıdaki gibi olur;

|işlem<br>sırası|bölünen|bölen|bölüm|kalan|eleman<br>*(işlem)*|eleman<br>*(sonuç)*|
|:---:|--:|:---:|--:|--:|--:|--:|
|0|123456|62|1991|14|14x62<sup>0</sup>|14|
|1|1991|62|32|7|7x62<sup>1</sup>|434|
|2|31|62|0|32|32x62<sup>2</sup>|123008|

eleman toplamlarıyla sağlamasını yapıldığında;

123456 = 14x62<sup>0</sup> + 7x62<sup>1</sup> + 32x62<sup>2</sup><br>
123456 = 14 + 434 + 123008<br>
123456 = 123456 <br>
işlemin aynı sonucu (sayıyı) verdiği görülür 👌

işlem sırası 62 tabanındaki yeni ifadenin basamak değerini ifade eder.<br>
buna göre örneğin 3 basamağı vardır ve basamak değerleri;

|32|7|14|
|:-:|:-:|:-:|
|3.basamak|2.basamak|1.basamak|

şeklindedir.

**karakter tanımlama**

sayı,<br>
62 tabanına dönüştürülüp basamak değerleri belirlendikten sonra<br>
her basamağı tek bir karakter ile ifade etmek gerekir.<br>
bunun için<br>
anahtar dizisinde basamak değerine karşılık gelen karakter kullanılır ve sonuç

|32|7|14|
|:-:|:-:|:-:|
|3.basamak|2.basamak|1.basamak|
|G|h|o|

şeklinde olur.

bu işleme göre;<br>
mod62_encode(123456) = **'Gho'**<br>
şeklinde sonuçlanır.

### çözümleme mantığı (örnekli anlatım)

örneğin mod62_decode('Gho') işlemini yaparken,

girdi olarak anahtar dizisi tanımlanmışsa;<br>
bölüm değeri, anahtar dizisinin eleman sayısıdır.<br>
değilse;<br>
taban değeri, standart olarak tanımlı olan anahtar dizisinin eleman sayısı olan 62'dir.

**karakter kıyaslama**

karakter dizisi basamaklarına ayrılır.

|G|h|o|
|:-:|:-:|:-:|
|3.basamak|2.basamak|1.basamak|

her bir karakterin anahtar dizi içerisindeki sıra numarası belirlenir.

|G|h|o|
|:-:|:-:|:-:|
|3.basamak|2.basamak|1.basamak|
|32|7|14|

basamak değeri ve basamak sırasına göre her satıra ait eleman oluşturulur.<br>
gösterimi <b>*basamak değeri* X *taban*<sup>*basamak değeri - 1*</sup></b> şeklindedir.<br>
bu elamanların toplamı sayının kendisine eşittir.<br>

basamak değerlerine göre elemanlar işlendiğinde sonuç;

|basamak<br>sırası|karakter|basamak<br>değeri|eleman<br>*(işlem)*|eleman<br>*(sonuç)*|
|--:|:-:|--:|--:|--:|
|1.basamak|o|14|14x62<sup>0</sup>|14|
|2.basamak|h|7|7x62<sup>1</sup>|434|
|3.basamak|G|32|32x62<sup>2</sup>|123008|

şeklinde olur.<br>
eleman işlemleri hesaplandığında fonksiyon;

mod62_decode('Gho') = 14x62<sup>0</sup> + 7x62<sup>1</sup> + 32x62<sup>2</sup><br>
mod62_decode('Gho') = 14 + 434 + 123008<br>
mod62_decode('Gho') = **123456**<br>
şeklinde sonuçlanır.
