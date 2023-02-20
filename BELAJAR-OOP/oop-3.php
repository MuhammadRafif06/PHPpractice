<?php
//metode if else
$a = 'magic';
//if itu kondisi yang diinginkan
if ($a =! 'budi') {
    //tampilkan hasil
    echo "berhasil";
} else {
    //tampilkan hasil
    echo "tidak berhasil<br>";
}

//Membuat operator logika
$laki = 'laki';
$perempuan = 'wanita'; 
$bencong = 'azzam'; 

// && atau and ini akan memanggil semua kondisi yang ada didalam if
// || atau or ini akan memanggil salah satu kondisi

if ($bencong != 'hehe'){
    echo 'benar<br>';
} else {
    echo 'salah<br>';
    
}

//operator aritmatika
$aa = 10;
$bb = 20;

//penjumlahan
echo $aa + $bb;
echo "<br>";

//pengurangan 
echo $aa - $bb;
echo "<br>";

//modulus
echo $aa % $bb;
echo "<br>";

//array
// $buah = ['mentah' => ['jeruk nipis' =>, ['jeruk purut asem', 'jeruk nipis manis']},
//         'buah manggis',
//         'buah mangga'];

// echo $buah['mentah']['jeruk nipis'][1];
// // echo $buah[1];
// // foreach ($buah as $fruit) {
// //     echo $fruit;
// // }

$handphone = [
    'apple' => [
        '12' => ['promax', 'pro']
    ],
    'samsung' => [
        'note' , 'galaxy' => ['s16', 's17', 's18'],
        'tablet',
        'laptop'
    ],
    'xiaomi' =>
    ['note 10 pro', 'note 12 pro', 'note 30 pro']
];

echo $handphone['apple']['12'][0]."<br>";
echo $handphone['samsung']['galaxy'][1]."<br>";
echo $handphone['xiaomi'][2]."<br>";
?>

<form method="post" action="oop-3.php">
    <label>Nama</label>
    <input type="text" name="nama">
    <br>
    <label>umur</label>
    <input type="text" name="umur">
    <br>
    <button type="submit">Ok</button>
</form>

<?php
//mengambil data dengan form handling GET
    $nama = $_REQUEST['nama'];
    $umur = $_REQUEST['umur'];

    //tampilkan hasil
    echo 'nama saya :'.$nama;
    echo 'umur saya :'.$umur;

?>