<?php

$url = basename($_SERVER['REQUEST_URI']);
$url = ltrim($url, '/');

function logout()
{
    echo '
    <a href="logout.php" class="absolute right-0 top-0 text-center bg-transparent m-3 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/>
        </svg>
    </a>';
}

function back()
{
    echo '
    <a href="home.php" class="absolute left-0 top-0 rounded-lg text-center bg-transparent m-3 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/>
        </svg>
    </a>';
}

function sessionName()
{
    echo '
    <p class="text-2xl font-bold focus:outline-none focus:shadow-outline absolute text-center mt-4 inset-x-0 top-0">
        ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '
    </p>';
}

if ($url !== 'home.php') {
    sessionName();
    logout();
    back();
} elseif ($url === 'home.php') {
    sessionName();
    logout();
}
?>
