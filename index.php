<?php
	session_start();
	require 'not_connected.php';
?>

<!DOCTYPE html>
<html>
<head> 
	<title>Sondages | Connexion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
</head>
<body>
	<form class="animated zoomIn">
		<h2 about="http://google.com">Identifiez-vous</h2>
		<div>
			<label>Nom d'utilisateur:</label>
			<input type="text" id="pseudo">
		</div>

		<div>
			<label>Mot de passe:</label>
			<input type="password" id="password">
		</div>

		<input type="submit" value="Connexion">
	</form>
	<div class="infos animated zoomIn hidden"></div>
	<script src="assets/js/index.js?dsdsds=1"></script>
</body>
</html>
