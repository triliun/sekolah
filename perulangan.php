<?php
session_start();

$nomor = '';
$kalimat = '';

if (isset($_POST['hasil'])) {
$nomor = $_POST['nomor'];
$kalimat = $_POST['kalimat'];

function hasil($angka, $text){
 echo '<button class="bg-indigo-600 rounded-lg w-full hover:bg-indigo-700 text-white font-bold py-2">'. "#$angka $text". "</button>";
};
}
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth antialiased">
<?php $title = 'Perulangan'; include 'layout/head.html'; ?>
<body class="bg-gray-900 backdrop-blur-3xl">
<?php include 'layout/nav.php' ?>
<?php include 'layout/cek-login.php' ?>

<main class="h-screen flex items-center justify-center">
    <form method="post" class="max-w-md space-y-4" >
    <h1 class="bg-gradient-to-r pb-2 text-center from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl animate-gradient">Perulangan</h1>
    <label class="relative text-gray-400 focus-within:text-white block mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" viewBox="0 -960 960 960"><path d="M480-200v-80h120l142-200-142-200H200v120h-80v-120q0-33 23.5-56.5T200-760h400q20 0 37.5 9t28.5 25l174 246-174 246q-11 16-28.5 25t-37.5 9H480Zm-9-280ZM200-160v-120H80v-80h120v-120h80v120h120v80H280v120h-80Z"/></svg>
      <input type="number" name="nomor" placeholder="Masukan Angka" id="nomor" required class="appearance-none p-2 border border-blue-600 rounded-lg bg-transparent text-white w-full">
    </label>
    <label class="relative text-gray-400 focus-within:text-white block mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" viewBox="0 -960 960 960"><path d="M280-280v-80h400v80H280ZM120-440v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80ZM120-600v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80Zm160 0v-80h80v80h-80Z"/></svg>
      <input type="text" name="kalimat" placeholder="Masukan kalimat" id="kalimat" required class="appearance-none p-2 border border-blue-600 rounded-lg bg-transparent text-white w-full">
    </label>
<button type="sumbit" name="hasil" class="rounded-lg w-full bg-blue-500 mt-3 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Hasil</button>
</form>
</main>
<section class="max-w-md mx-auto space-y-4">
    <?php
    for($i = 1; $i <= $nomor; $i++){
        hasil($i, $kalimat);
    };
    ?>
</section>
<?php include 'layout/footer.php'; ?>
<?php include 'layout/sc-nav.php'; ?>
</body>
</html>