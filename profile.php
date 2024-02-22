<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: /');
	exit;
}
include 'database.php';

$stmt = $con->prepare('SELECT password, username, first_name, last_name, time FROM users WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $username, $first_name, $last_name, $time);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth antialiased">
<?php $title = 'My Profile'; include 'layout/head.html'; ?>
<body class="bg-gray-900 backdrop-blur-3xl">
<?php include 'layout/nav.php' ?>

<main class="h-screen flex items-center justify-center">
    <section class="w-72 mx-auto bg-[#20354b] rounded-2xl px-8 py-6 shadow-lg">
        <div class="flex items-center justify-between">
            <span class="text-gray-400 text-sm mx-auto"><?=$time?></span>
        </div>
        <div class="mt-6 w-fit mx-auto">
            <img src="http://localhost/images/android-chrome-512x512.png" class="rounded-full w-28 " alt="profile picture" srcset="">
        </div>

        <div class="mt-8 ">
            <h2 class="text-white font-bold text-2xl tracking-wide"><?=$first_name?> <?=$last_name?></h2>
        </div>
        <p class="text-emerald-400 font-semibold mt-2.5" >
            <?=$username?>
        </p>

        <div class="h-1 w-full bg-black mt-8 rounded-full">
            <div class="h-1 rounded-full w-full bg-yellow-500 "></div>
        </div>
    </section>
</main>
<?php include 'layout/footer.php'; ?>
<?php include 'layout/sc-nav.php'; ?>
</body>
</html>