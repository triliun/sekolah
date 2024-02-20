<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<?php $title = 'Array 📦'; include 'layout/head.html'; ?>
<body>
<?php include 'layout/navbar.php'?>


<main class="p-4 w-full max-w-lg mx-auto" style="margin-top: 5em;">
<h2 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-green-500">Menampilkan Array Dengan For Loop</h2>
<?php
// membuat array
$barang = ["Buku Tulis", "Penghapus", "Spidol", "Pensil", "Pulpen", ];

// menampilkan isi array dengan perulangan for
for($i=0; $i < count($barang); $i++){
    echo '<p class="text-1xl font-bold text-gray-500">'. $barang[$i]."</p>";
}
?>
<h2 class="my-4 text-2xl font-extrabold leading-none tracking-tight text-green-500">Menampilkan Array Dengan Foreach</h2>
<?php


// menampilkan isi array dengan perulangan foreach
foreach($barang as $isi){
    echo '<p class="text-1xl font-bold text-gray-500">'. $isi."</p>";
}
?>

<h2 class="my-4 text-2xl font-extrabold leading-none tracking-tight text-green-500">Menampilkan Array Dengan While</h2>
<?php

$i = 0;
while($i < count($barang)){
    echo '<p class="text-1xl font-bold text-gray-500">'. $barang[$i]."</p>";
    $i++;
}
?>
<h2 class="my-4 text-2xl font-extrabold leading-none tracking-tight text-green-500">Menampilkan Array Dengan RAW</h2>
<?php
print_r($barang);
?>
<h2 class="my-4 text-2xl font-extrabold leading-none tracking-tight text-green-500">Array Asosiatif</h2>
<?php
// membuat array asosiatif
$artikel = [
    "judul" => "Belajar Pemrograman PHP",
    "penulis" => "petanikode",
    "view" => 128
];

// mencetak isi array assosiatif
echo '<h3 class="text-1xl font-bold text-gray-500">'."Oleh: ".$artikel["judul"]."</h3>"; //-> output: 7
echo '<p class="text-1xl font-bold text-gray-500">'."Oleh: ".$artikel["penulis"]."</p>"; //-> output: 7
echo '<p class="text-1xl font-bold text-gray-500">'."View: ".$artikel["view"]."</p>"; //-> output: 7
?>
<h2 class="my-4 text-2xl font-extrabold leading-none tracking-tight text-green-500">Array Multi Dimensi</h2>
<?php
// ini adalah array dua dimensi
$matrik = [
    [2,3,4],
    [7,5,0],
    [4,3,8],
];

// cara mengakses isinya
echo '<p class="text-1xl font-bold text-gray-500">'. $matrik[1][0]."</p>"; //-> output: 7

// membuat array 2 dimensi yang berisi array asosiatif
$artikel = [
    [
        "judul" => "Belajar PHP & MySQL untuk Pemula",
        "penulis" => "Varrel"
    ],
    [
        "judul" => "Tutorial PHP dari Nol hingga Mahir",
        "penulis" => "Varrel"
    ],
    [
        "judul" => "Membuat Aplikasi Web dengan PHP",
        "penulis" => "Varrel"
    ]
];

// menampilkan array
foreach($artikel as $post){
	echo '<p class="text-1xl font-bold text-gray-500">'. $post["judul"]."</p>";
	echo '<p class="text-1xl font-bold text-gray-500">'. $post["penulis"]."</p>";
    echo "<hr>";
}
?>
	</main>
</body>
</html>