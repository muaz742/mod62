# mod62
link kısaltma url oluşturma gibi işlemlerde kullanılan kodlayıcı

## nedir?
bu fonksiyon;<br>
girdi olarak gelen bir rakam dizisini daha az basamaklı karakter dizisine dönüştürür. ve bu yeni oluşan diziyi çıktı verir.<br>
tam aksi yönde çözümleme işlemi de yapabilir.

## ne işe yarar?
bu fonksiyonu kısaltılmış link oluşturma ihtiyacımı karşılamak amacıyla geliştirmeye başladım.<br>
fakat sadece bu amaçla kullanılmak zorunda değil.

## nasıl kullanılır?
kullanmaya başlamadan önce [mod62.php](mod62.php) dosya indirilip kullanılacak yapıya eklenir.

ardından kullanılmak istenen yapının baş kısmına 
~~~
include 'mod62.php';
~~~
şeklinde ekleme yapılarak **mod62_encode** ve **mod62_decode** fonksiyonları kullanıma hazır hale gelir.<br>

### mod62_encode kullanımı
kodlanacak değer sayı tipinde olmalıdır.<br>
kodlanacak değer mod62_encode() fonksiyonuna girdi olarak tanımlanmalıdır.

**örnek kullanım**;
~~~
$sonuc = 123456 //kodlanacak değer buraya tanımlanır
$sonuc = mod62_encode($sonuc);
echo "sonuç: ".$sonuc; // sonuç çıktı olarak alınır
//sonuç: MfE
~~~

### mod62_decode kullanımı
çözümlenecek değer mod62_decode() fonksiyonuna girdi olarak tanımlanmalıdır.

**örnek kullanım**;
~~~
$sonuc = 'MfE' //çözümlenecek değer buraya tanımlanır
$sonuc = mod62_decode($sonuc);
print "sonuç: ".$sonuc; // sonuç çıktı olarak alınır
//sonuç: 123456
~~~

<!-- # nasıl çalışır -->
