<?php
session_start();
include 'database.php';

if (isset($_SESSION['loggedin'])) {
    header('Location: home.php');
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
                header('Location: home.php');
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
    <div class="bg-red-100 rounded-lg text-red-800 text-sm p-4 flex justify-between">
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

function showSuccess($message)
{
    echo '
    <div class="bg-green-100 rounded-lg text-green-800 text-sm p-4 flex justify-between">
      <div>
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
          </svg>
          <p>
            <span class="font-extrabold">Info:</span>
            ' . $message . '
          </p>
        </div>
      </div>
    </div>';
}
?>


<!DOCTYPE html>
<html>
<?php $title = 'Login 🔒'; include 'layout/head.html'; ?>
<body>
<div class="w-full max-w-md mx-auto shadow-2xl" style="margin-top: 10em;">
<form method="post" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
    <h1 class="mb-4 text-5xl mx-auto text-center font-extrabold leading-none tracking-tight text-green-500 ">Login 🔒</h1>
    <div class="mb-4">
      <label for="username" class="block text-gray-600 text-sm font-bold mb-2" for="username">
        <i class="fas fa-user"></i>
      </label>
      <input type="text" name="username" oninput="this.value = this.value.toLowerCase()" onkeypress="return AvoidSpace(event)" placeholder="Username" id="username" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      <label for="password" class="block text-gray-600 text-sm font-bold mb-2" for="username">
        <i class="fas fa-user"></i>
      </label>
      <input type="password" name="password" placeholder="Password" id="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <?php 
    if (isset($pesan)) {
    tampilkanError($pesan); 
    }
    ?>
<button name="login" type="submit"class="bg-green-500 rounded-md w-full mt-3 hover:bg-green-700 text-white font-bold py-2 px-4 mb-2 rounded focus:outline-none focus:shadow-outline" type="button">Login</button>
<a href="register.php" title="Register" class="text-sky-500 text-center font-medium text-sm"><p>Belum punya akun?</p></a>
</form>
</div>
<script type="text/javascript">
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;

}
</script>
</body>
</html>