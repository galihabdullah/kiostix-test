# Kiostix Test

### Logic
Logic :
1. Buatlah sebuah fungsi untuk menentukan nilai tertinggi & terendah dari baris array berikut,
tanpa menggunakan fungsi bawaan seperti MAX / MIN.. [‘1,5,8,0,9,7,4,3,2’]
```function getMax(array $number){
    $current = 0;
    foreach ($number as $num){
        if($num > $current){
            $current = $num;
        }
    }
    echo $current . PHP_EOL;
}
getMax([10,20,30,40]);

function getMin(array $number){
    $current = null;
    foreach ($number as $num){
        if($current == null){
            $current = $num;
        }elseif($num < $current){
            $current = $num;
        }
    }
    echo $current . PHP_EOL;
}
getMin([10,20,30,40]);
```

2. Dari nilai 0-100, Buat lah fungsi dengan ketentuan berikut:
a. Setiap kelipatan 25 akan mencetak string “KI”
b. Setiap keliaptan 40 akan mencetak string “OS”
c. Setiap kelipatan 60 akan mencetak string “TIK”
d. Dan setiap kelipatan 99 akan mencetak string “KIOSTIX”
````function printString($number){
    $string = null;
    for ($i = $number; $i >= 0; $i--){
        if($i % 25 == 0){
            $string = $string . " KI";
        }elseif ($i % 40 == 0){
            $string = $string . " OS";
        }elseif ($i % 60 == 0){
            $string = $string . " TIX";
        }elseif ($i % 99 == 0){
            $string = $string . " KIOSTIX";
        }
    }
    echo $string . PHP_EOL;
}
printString(100);
````

3. Buatlah sebuah fungsi untuk mendeteksi sebuah kata Palindrom atau kata yang bila dibaca
dari depan atau dari belakang, tetap sama, misal “LEVEL”,”KATAK”,”MALAM” dll.
Diharapkan membuat fungsi sendiri tanpa menggunakan fungsi bawaan seperti String
Reverse dsb.
````
function palindrom($string){
    $stringSplit = str_split($string);
    $palindrom = true;
    for ($i = 0; $i <= count($stringSplit) - 1; $i++){
        for ($j = count($stringSplit) - 1; $j >= 0; $j--){
            if($stringSplit[$j] !== $stringSplit[$j]){
                $palindrom = false;
            }
        }
    }
    echo $palindrom ? $string . " adalah Palindrom" . PHP_EOL: $string .  "bukan palindrom ". PHP_EOL;
}
palindrom('LEVEL');
````

### DATABASE
4. Buatlah contoh design struktur table untuk master BUKU, PENULIS dan KATEGORI

![Image of Yaktocat](https://github.com/galihabdullah/kiostix-test/blob/main/Database/database.png)

5. Buatlah contoh query untuk menampilkan data semua buku berdasarkan nama penulis
````
SELECT buku.* FROM buku join penulis on buku.id_penilis = penulis.id where penulis.name like '%nama_penulis%';
````

6. Buatlah contoh query untuk menampilkan data buku dan nama penulis berdasarkan
kategori
````
SELECT buku.*, penulis.* FROM buku join penulis on buku.id_penilis = penulis.id join kategori_buku on kategori_buku.id_buku = buku.id join kategori on kategori.id = kategori_buku.id_kategori where kategori.name like '%nama_kategori%';
````


### Web API :
Catatan, buatlah dokumentasi API dengan keterangan struktur request dan response
7. Buat contoh dokumentasi API untuk menampilkan daftar buku berdasarkan judul buku
8. Buat contoh dokumentasi API untuk menampilkan daftar buku berdasarkan nama penulis
9. Buat contoh dokumentasi API untuk menampilkan daftar buku dan nama penulis
berdasarkan nama kategori
Scripting, menggunakan PHP, node js atau framework lainnya yang berbasis web
10. Buat contoh program yang dapat menampilkan data master buku, penulis dan kategori
beserta modulnya membuat pembaruan hapus, bersama dengan contoh tindakan dari poin
4 - 9 dapat dieksekusi

Untuk tugas web api ada pada directory "API", untuk menjalankannya ikuti langkah dibawah ini :
1. clone project https://github.com/galihabdullah/kiostix-test.git
2. Akses directory hasil clone dan buka folder "API"
3. Jalankan composer install
4. Buat database
5. Import sql "kiostix.sql"
6. Update variable pada file .env
7. Lalu jalankan "php -S localhost:8001"


