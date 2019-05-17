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

## nasıl çalışır
fonksiyon çalışmak için anahtar dizisi ve girdiye ihtiyaç duyar. anahtar dizisi sabittir.

anahtar dizisi, sırasıya 'a-z', 'A-Z', '0-9' aralıklarındaki karakter dizilerinin birleşiminden oluşur.<br>
karakter desteği sorunu yaşamamak için ingilizce alfabe kullanılır.

yapılan işlem kısaca girdi olarak gelen değeri, anahtar dizisinin eleman sayısının bir büyüğüne tekrar tekrar bölmek ve bu işlemden çıkan verileri kullanarak anahtar dizisine göre sonuç değerini oluşturmaktır.

örneğin, '123456' sayısı anahtar dizi eleman sayısının 1 fazlası olan 63 tabanında yazıldığında <br>
123456 = 31x63<sup>2</sup> + 6x63<sup>1</sup> + 39x63<sup>0</sup><br>
şekilde ifade edilebilir.<br>
bu ifadede işlem kuralı ve 63 tabanı sabittir.<br>
yapılan bölme işlemi miktarını ifade eden üs değeri ve bölme işlemi sırasında kalan değerden oluşan çarpan değişkendir.
işlem sayısı miktarı değişken, fakat artışı sıralı yani sabittir.
kalan ifade, anahtar dizisindeki eleman sayısından fazla olamayacağı için dizi içerisindeki sıraya karşılık gelen değer çağırıldığında sonuç her zaman bir ifadeye denk gelecektir.<br>
bu çıkan sonuçlar basamaklara işlem sırasıyla yazıldığında işlem miktarını basamak miktarı, işlem sırasını da karakterin bulunduğu basamak sırası karşılar.<br>
böylelikle çok basamaklı sayısal ifadeler daha az basamak ile ifade edilebilir.<br>
çözümlemede ise ters işlem yapılarak sayıya ulaşmak mümkündür.
