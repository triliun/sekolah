<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<?php $title = 'Berat Badan 🍔'; include 'layout/head.html'; ?>
<body>
<?php include 'layout/navbar.php'?>
<div class="w-full max-w-md mx-auto my-auto shadow-2xl" style="margin-top: 10em;"> 
<form method="post" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
    <h1 class="mb-4 text-5xl mx-auto text-center font-extrabold leading-none tracking-tight text-blue-500 ">Berat Badan 🍔</h1>
    <div class="mb-4">
      <label class="block text-gray-600 text-md font-bold mb-2" for="username">
        Berat Badan 
      </label>
      <input type="number" name="a" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukan Berat Badan...">
    </div>
<?php
$a = '';

if (isset($_POST['a']))
{
$a = $_POST['a'];

if ($a > 80) {
    echo "<p>$a Kg adalah berat badan yang Gemuk 😲</p>";
} elseif ($a > 45 && $a < 60) {
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
