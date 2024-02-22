<?php
session_start();
include 'database.php';

if (isset($_POST['a'])) {
$a = $_POST['a'];
$pesan = '';

if ($a > 65) {
    $pesan = "$a Kg adalah berat badan yang Gemuk 😲";
} elseif ($a >= 45 && $a <= 65) {
    $pesan = "$a Kg adalah berat badan yang ideal 😎";
} else {
    $pesan = "$a Kg adalah berat badan yang terlalu kurus ☠";
}
}

function tampilkanPesan($pesan)
{
    echo '
<section class="p-2 bg-gray-700 font-semibold rounded-lg text-center text-white">
    <p>' .$pesan. '</p>
</section>
    ';
}

?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth antialiased">
<?php $title = 'Berat Badan'; include 'layout/head.html'; ?>
<body class="bg-gray-900 backdrop-blur-3xl">
<?php include 'layout/nav.php' ?>
<?php include 'layout/cek-login.php' ?>

<main class="h-screen flex items-center justify-center">
    <form method="post" class="max-w-md space-y-4" >
    <h1 class="bg-gradient-to-r pb-2 text-center from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl animate-gradient">Berat Badan</h1>
    <label class="relative text-gray-400 focus-within:text-white block mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" viewBox="0 -960 960 960"><path d="M480-720q-33 0-56.5-23.5T400-800q0-33 23.5-56.5T480-880q33 0 56.5 23.5T560-800q0 33-23.5 56.5T480-720ZM360-80v-520q-60-5-122-15t-118-25l20-80q78 21 166 30.5t174 9.5q86 0 174-9.5T820-720l20 80q-56 15-118 25t-122 15v520h-80v-240h-80v240h-80Z"/></svg>
      <input type="number" name="a" placeholder="Masukan berat badan" required class="appearance-none p-2 border border-blue-600 rounded-lg bg-transparent text-white w-full">
    </label>

<?php if (isset($pesan)) {
    tampilkanPesan($pesan);
}
?>
<button type="sumbit" class="rounded-lg w-full bg-blue-500 mt-3 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Hasil</button>
</form>
</main>
<?php include 'layout/footer.php'; ?>
<?php include 'layout/sc-nav.php'; ?>
</body>
</html>