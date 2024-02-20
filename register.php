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
    <div class="bg-red-100 rounded-lg-lg text-red-800 text-sm p-4 flex justify-between">
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
    <div class="bg-green-100 rounded-lg-lg text-green-800 text-sm p-4 flex justify-between">
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
<main class="w-full max-w-md mx-auto" style="margin-top: 10em;">
<form method="POST" class="bg-white rounded-lg px-8 pt-6 pb-8 mb-4">
    <h1 class="mb-4 text-5xl mx-auto text-center font-extrabold leading-none tracking-tight text-orange-500 ">Register</h1>
    <div class="mb-4">
      <div class="grid grid-cols-2 gap-2 mb-2">
      <input type="text" name="first-name" placeholder="First Name" id="first-name" required class=" appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
  
      <input type="text" name="last-name" placeholder="Last Name" id="last-name" required class=" appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <label class="relative text-gray-400 focus-within:text-gray-600 block mb-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
      <input type="text" oninput="this.value = this.value.toLowerCase()" onkeypress="return AvoidSpace(event)" name="username" placeholder="Username" id="username" required class=" appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </label>

    <label class="relative text-gray-400 focus-within:text-gray-600 block mb-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" viewBox="0 -960 960 960" ><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/></svg>
      <input type="password" name="password1" placeholder="Password" id="password1" required class=" appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </label>

    <label class="relative text-gray-400 focus-within:text-gray-600 block mb-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-6 h-6 absolute top-1/2 transform -translate-y-1/2 right-3" fill="currentColor" viewBox="0 -960 960 960" ><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/></svg>
      <input type="password" name="password2" placeholder="Confirm Password" id="password2" required class=" appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </label>
    </div>
    <?php 
    if (isset($pesanSuscces)) { 
      tampilkanSuccess($pesanSuscces);
      } elseif (isset($pesanError))
      tampilkanError($pesanError);
    ?>
      
<button type="submit" name="register" class="bg-orange-500 rounded-lg-md w-full mt-3 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline mb-2" type="button">Register</button>
<a href="index.php" title="Login" class="text-sky-500 text-center font-medium text-sm"><p>Sudah punya akun?</p></a>
</form>
</main>
<script type="text/javascript">
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;

}
</script>
</body>
</html>

