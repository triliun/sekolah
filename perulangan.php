<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

$nomor = '';
$kalimat = '';

if (isset($_POST['nomor']) && isset($_POST['kalimat'])) {
$nomor = $_POST['nomor'];
$kalimat = $_POST['kalimat'];
$output = '';
}
?>
<!DOCTYPE html>
<html>
<?php $title = '📏 Perulangan Kata'; include 'layout/head.html'; ?>
<body>
<?php include 'layout/navbar.php'?>
<div class="w-full max-w-md mx-auto shadow-2xl" style="margin-top: 10em;">
<form method="post" class="bg-white rounded px-8 mb-4">
    <h1 class="mb-4 text-5xl mx-auto text-center font-extrabold leading-none tracking-tight text-indigo-500 ">Perulangan 📏</h1>
    <div class="mb-4">
      <label for="nomor" class="block text-gray-600 text-sm font-bold mb-2" for="nomor">
        <i class="fas fa-user"></i>
      </label>
      <input type="number" name="nomor" placeholder="Masukan Angka" id="nomor" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      <label for="kalimat" class="block text-gray-600 text-sm font-bold mb-2" for="nomor">
        <i class="fas fa-user"></i>
      </label>
      <input type="kalimat" name="kalimat" placeholder="Masukan kalimat" id="kalimat" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
<button type="submit"class="bg-indigo-500 rounded-md w-full mt-3 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Hasil</button>
</form>
<section class="px-8 pb-8">
    <?php
    for($i = 1; $i <= $nomor; $i++){
    echo '<button class="bg-indigo-600 rounded-md w-full mt-3 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">'. "$kalimat ke $i". "</button>"; }
    ?>
</section>
</div>
</body>
</html>