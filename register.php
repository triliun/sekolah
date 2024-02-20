<?php
include 'database.php';
session_start();

if (isset($_SESSION['loggedin'])) {
    header('Location: home.php');
    exit;
}

if (isset($_POST["register"])) {
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $username = $_POST["username"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];


    // Validasi jika password tidak sama
    if ($password1 !== $password2) {
        $pesanError = 'Password tidak sama!';
    } else {
        try {
            // Hash Argon2
            $hash_password = password_hash($password2, PASSWORD_ARGON2ID);

            $sql = "INSERT INTO users (first_name, last_name, username, password) VALUES (?, ?, ?, ?)";
            
            $stmt = $con->prepare($sql);
            $stmt->bind_param('ssss', $first_name, $last_name, $username, $hash_password);

            if ($stmt->execute()) {
                $pesanSuscces = 'Daftar akun berhasil, silahkan login!';
            } else {
                $pesanError = 'Daftar akun gagal, silahkan coba lagi!';
            }

            $stmt->close();
        } catch (mysqli_sql_exception $e) {
            $pesanError = 'Username sudah ada, silahkan ganti!';
        }
    }
    $con->close();
}

function tampilkanError($pesanError)
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
            ' . $pesanError . '
          </p>
        </div>
      </div>
    </div>';
}

function tampilkanSuccess($pesanSuscces)
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
            ' . $pesanSuscces . '
          </p>
        </div>
      </div>
    </div>';
}
?>

<!DOCTYPE html>
<html>
<head>
<?php $title = 'Register'; include 'layout/head.html'; ?>
<body>
<div class="w-full max-w-md mx-auto shadow-2xl" style="margin-top: 10em;">
<form method="POST" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
    <h1 class="mb-4 text-5xl mx-auto text-center font-extrabold leading-none tracking-tight text-orange-500 ">Register</h1>
    <div class="mb-4">
      <div class="grid grid-cols-2 gap-2 mb-2">
      <input type="text" name="first-name" placeholder="First Name" id="first-name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
  
      <input type="text" name="last-name" placeholder="Last Name" id="last-name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

      <input type="text" oninput="this.value = this.value.toLowerCase()" onkeypress="return AvoidSpace(event)" name="username" placeholder="Username" id="username" required class="shadow appearance-none border rounded w-full mb-2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

      <input type="password" name="password1" placeholder="Password" id="password1" required class="shadow mb-2 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

      <input type="password" name="password2" placeholder="Confirm Password" id="password2" required class="shadow mb-2 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <?php 
    if (isset($pesanSuscces)) { 
      tampilkanSuccess($pesanSuscces);
      } elseif (isset($pesanError))
      tampilkanError($pesanError);
    ?>
      
<button type="submit" name="register" class="bg-orange-500 rounded-md w-full mt-3 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-2" type="button">Register</button>
<a href="index.php" title="Login" class="text-sky-500 text-center font-medium text-sm"><p>Sudah punya akun?</p></a>
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

