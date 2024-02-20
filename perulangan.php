<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: /');
    exit;
}

$nomor = '';
$kalimat = '';

if (isset($_POST['hasil'])) {
$nomor = $_POST['nomor'];
$kalimat = $_POST['kalimat'];

function hasil($angka, $text){
 echo '<button class="bg-indigo-600 rounded-lg w-full mt-3 hover:bg-indigo-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline">'. "#$angka $text". "</button>";
};
}
?>
<!DOCTYPE html>
<html>
<?php $title = '📏 Perulangan Kata'; include 'layout/head.html'; ?>
<body>
<?php include 'layout/navbar.php'?>
<main class="w-full max-w-md mx-auto" style="margin-top: 10em;">
<form method="post" class="bg-white px-8 mb-4">
    <h1 class="mb-4 text-4xl mx-auto text-center font-extrabold leading-none tracking-tight text-indigo-500 ">Perulangan 📏</h1>
    <div class="mb-4">
    <label class="relative text-gray-400 focus-within:text-gray-600 block mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" viewBox="0 -960 960 960"><path d="M480-200v-80h120l142-200-142-200H200v120h-80v-120q0-33 23.5-56.5T200-760h400q20 0 37.5 9t28.5 25l174 246-174 246q-11 16-28.5 25t-37.5 9H480Zm-9-280ZM200-160v-120H80v-80h120v-120h80v120h120v80H280v120h-80Z"/></svg>
      <input type="number" name="nomor" placeholder="Masukan Angka" id="nomor" required class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </label>
    <label class="relative text-gray-400 focus-within:text-gray-600 block mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" viewBox="0 -960 960 960"><path d="M280-280v-80h400v80H280ZM120-440v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80ZM120-600v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80Z"/></svg>
      <input type="text" name="kalimat" placeholder="Masukan kalimat" id="kalimat" required class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </label>

    </div>
<button type="submit" name="hasil" class="bg-indigo-500 rounded-lg w-full mt-3 hover:bg-indigo-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type="button">Hasil</button>
</form>
<section class="px-8 pb-8">
    <?php
    for($i = 1; $i <= $nomor; $i++){
        hasil($i, $kalimat);
    };
    ?>
</section>
</main>
</body>
</html>