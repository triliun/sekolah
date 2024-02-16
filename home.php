<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>🏠 Home - Varrel Al Aljabaar K</title>
        <?php include 'layout/head.html' ?>
    </head>
    <body>
<p class="text-2xl font-bold focus:outline-none focus:shadow-outline absolute text-center mt-4 inset-x-0 top-0">
    <?= $_SESSION['first_name']." ". $_SESSION['last_name']?>
</p>
<a href="logout.php" class="absolute right-0 top-0 text-center bg-gray-50 m-3 hover:bg-gray-50 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg></a>



<div class="w-full max-w-md mx-auto shadow-2xl" style="margin-top: 10em;">
<h1 class="mb-4 text-5xl mx-auto text-center font-extrabold leading-none tracking-tight text-blue-500 ">My Project 🌏</h1>
<section class="px-8 pb-8">
<a href="berat-badan.php" title="Berat Badan">
<button class="bg-blue-400 rounded-md w-full mt-3 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Berat Badan 🍔</button>
</a>

<a href="perulangan.php" title="Perulangan">
<button href="perulangan.php" class="bg-blue-400 rounded-md w-full mt-3 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Perulangan 📏</button>
</a>

<a href="array.php" title="Array">
<button  class="bg-blue-400 rounded-md w-full mt-3 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Data Array 📦</button>
</a>
</section>
</div>
</body>
</html>