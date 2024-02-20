<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: /');
    exit;
}

$project = [
    [
        "judul" => "Berat Badan 🍔",
        "link" => "berat-badan.php"
    ],
    [
        "judul" => "Perulangan 📏",
        "link" => "perulangan.php"
    ],
    [
        "judul" => "Data Array 📦",
        "link" => "array.php"
    ]
];

function tampilkanProject($judul, $link)
{
    echo '
    <a href="' . $link . '" title="' . $judul . '">
        <button class="bg-blue-400 rounded-lg w-full mt-3 hover:bg-blue-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline">
            ' . $judul . '
        </button>
    </a>
    ';
}


?>
<!DOCTYPE html>
<html>
<?php $title = '🏠 Home - Varrel Al Aljabaar K'; include 'layout/head.html'; ?>
<body>
<?php include 'layout/navbar.php'?>


<main class="w-full max-w-md mx-auto" style="margin-top: 10em;">
<h1 class="mb-4 text-4xl mx-auto text-center font-extrabold leading-none tracking-tight text-blue-500 ">My Project 🌏</h1>
<section class="px-8 pb-8">
<?php
foreach ($project as $post) {
    tampilkanProject($post['judul'], $post['link']);
}
?>
</section>
</main>
</body>
</html>