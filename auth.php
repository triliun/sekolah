<?php
session_start();
include 'database.php';

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Tolong masukan username dan password!');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {

	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();

	$stmt->store_result();

	if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();

	if ($_POST['password'] === $password) {

		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		// echo 'Welcome ' . $_SESSION['name'] . '!';
		header('Location: berat-badan.php');
	} else {
		echo 'Username dan Password salah!';
	}
} else {
	// Username salah
	echo 'Username dan Password salah!';
}
	$stmt->close();
}
?>