<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth antialiased">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simple Kalkulator</title>
	<link rel="stylesheet" href="style.css">
	<script src="../index.js"></script>
</head>
<body class="bg-gray-900 backdrop-blur-3xl">
<?php include '../layout/cek-login.php' ?>
<?php include '../layout/navbar.php'?>
	<div class="container" style="max-width: 17em;">
		<input class="display"/>

		<div class="buttons">
			<button class="operator" data-value="AC">AC</button>
			<button class="operator" data-value="DEL">DEL</button>
			<button class="operator" data-value="%">%</button>
			<button class="operator" data-value="/">/</button>

			<button data-value="7">7</button>
			<button data-value="8">8</button>
			<button data-value="9">9</button>
			<button class="operator" data-value="*">*</button>
			
			<button data-value="4">4</button>
			<button data-value="5">5</button>
			<button data-value="6">6</button>
			<button class="operator" data-value="-">-</button>
			
			<button data-value="1">1</button>
			<button data-value="2">2</button>
			<button data-value="3">3</button>
			<button class="operator" data-value="+">+</button>
			
			<button data-value="0">0</button>
			<button data-value="00">00</button>
			<button class="operator" data-value=".">.</button>
			<button class="operator" data-value="=">=</button>
		</div>
	</div>

	<section>
		<a href="https://www.instagram.com/varrelaljabaar" title="Varrel Al Jabaar">By @varrelaljabaar</a>
	</section>
	
	<script src="index.js"></script>
</body>
</html>