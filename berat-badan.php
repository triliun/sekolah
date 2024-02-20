<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: /');
    exit;
}
?>
<!DOCTYPE html>
<html>
<?php $title = 'Berat Badan 🍔'; include 'layout/head.html'; ?>
<body>
<?php include 'layout/navbar.php'?>

<div class="w-full max-w-md mx-auto my-auto" style="margin-top: 10em;"> 
<form method="post" class="bg-white px-8 pt-6 pb-8 mb-4">
    <h1 class="mb-4 text-4xl mx-auto text-center font-extrabold leading-none tracking-tight text-blue-500 ">Berat Badan 🍔</h1>
    <div class="mb-4">
    <label class="relative text-gray-400 focus-within:text-gray-600 block mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" viewBox="0 -960 960 960"><path d="M480-720q-33 0-56.5-23.5T400-800q0-33 23.5-56.5T480-880q33 0 56.5 23.5T560-800q0 33-23.5 56.5T480-720ZM360-80v-520q-60-5-122-15t-118-25l20-80q78 21 166 30.5t174 9.5q86 0 174-9.5T820-720l20 80q-56 15-118 25t-122 15v520h-80v-240h-80v240h-80Z"/></svg>
      <input type="number" name="a" placeholder="Masukan berat badan" required class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </label>
    </div>
<?php
$a = '';

if (isset($_POST['a']))
{
$a = $_POST['a'];

if ($a > 65) {
    echo "<p>$a Kg adalah berat badan yang Gemuk 😲</p>";
} elseif ($a >= 45 && $a <= 65) {
    echo "<p>$a Kg adalah berat badan yang ideal 😎</p>";
} else {
    echo "<p>$a Kg adalah berat badan yang terlalu kurus ☠</p>";
}
}

?>
<button type="sumbit" class="rounded-lg w-full bg-blue-500 mt-3 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Hasil</button>
</form>
    </div>
</body>
</html>
