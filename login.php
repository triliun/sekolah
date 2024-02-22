<?php
session_start();
include 'database.php';

if (isset($_SESSION['loggedin'])) {
    header('Location: /');
    exit;
}

// batas -----------------

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password_id = $_POST['password'];


    if (empty($username) || empty($password_id)) {
        $pesan = 'Tolong masukkan username dan password!';
    }

    if ($stmt = $con->prepare('SELECT id, password, first_name, last_name FROM users WHERE username = ? LIMIT 1')) {
        $stmt->bind_param('s', $username);
        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password, $first_name, $last_name);
            $stmt->fetch();

            if (password_verify($password_id, $hashed_password)) {
                session_regenerate_id();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $username;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['id'] = $id;
                header('Location: /');
            } else {
                $pesan = 'Username atau Password salah!';
            }
        } else {
            $pesan = 'Username tidak ditemukan.';
        }

        $stmt->close();
    }
}

function tampilkanError($pesan)
{
    echo '
    <div class="bg-transparent border border-red-500 rounded-lg font-bold text-red-800 text-sm p-4 flex justify-between">
      <div>
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
          </svg>
          <p>
            <span class="font-extrabold">Info:</span>
            ' . $pesan . '
          </p>
        </div>
      </div>
    </div>';
}
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth antialiased">
<?php $title = 'Login'; include 'layout/head.html'; ?>
<body class="bg-gray-900 backdrop-blur-3xl">
<?php include 'layout/nav.php' ?>

<main class="h-screen">
    <form method="post" class="max-w-md space-y-4 mx-auto" style="margin-top: 10em;" >
    <h1 class="bg-gradient-to-r pb-2 text-center from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl animate-gradient">Login</h1>

        <label class="relative text-gray-400 focus-within:text-white block mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
      <input type="text" name="username" oninput="this.value = this.value.toLowerCase()" onkeypress="return AvoidSpace(event)" placeholder="Username" id="username" required class="appearance-none p-2 border border-blue-600 rounded-lg bg-transparent text-white w-full">
    </label>

    <label class="relative text-gray-400 focus-within:text-white block mb-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" viewBox="0 -960 960 960" ><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/></svg>
      <input type="password" name="password" placeholder="Password" id="password" required class="appearance-none p-2 border border-blue-600 rounded-lg bg-transparent text-white w-full">
    </label>
    <?php 
    if (isset($pesan)) {
    tampilkanError($pesan); 
    }
    ?>
<button name="login" type="submit" class="rounded-lg w-full bg-blue-500 mt-3 hover:bg-blue-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type="button">Login</button>
<a href="register.php" title="Register" class="text-sky-500 text-center font-medium text-sm"><p>Belum punya akun?</p></a>
</form>
</main>
<?php include 'layout/footer.php'; ?>
<?php include 'layout/sc-nav.php'; ?>
<script type="text/javascript">
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;

}
</script>
</body>
</html>