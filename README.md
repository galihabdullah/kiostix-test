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
```

2. Dari nilai 0-100, Buat lah fungsi dengan ketentuan berikut:
a. Setiap kelipatan 25 akan mencetak string “KI”
b. Setiap keliaptan 40 akan mencetak string “OS”
c. Setiap kelipatan 60 akan mencetak string “TIK”
d. Dan setiap kelipatan 99 akan mencetak string “KIOSTIX”
3. Buatlah sebuah fungsi untuk mendeteksi sebuah kata Palindrom atau kata yang bila dibaca
dari depan atau dari belakang, tetap sama, misal “LEVEL”,”KATAK”,”MALAM” dll.
Diharapkan membuat fungsi sendiri tanpa menggunakan fungsi bawaan seperti String
Reverse dsb.
