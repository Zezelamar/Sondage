<?php 
	session_start();

	$reponse = new stdClass();

	$reponse->success = false;
	$reponse->details = 'Les données sont incorrectes.';

	require 'not_connected.php';
	require 'db_connect.php';

	extract($_POST);

	if(isset($pseudo, $password) ) {
		$pseudo = htmlspecialchars($pseudo);
		$password = htmlspecialchars($password);
		if ((mb_strlen($pseudo) > 7) && (mb_strlen($password) > 0)) {
			$password = sha1($password);
			$reponse->details = 'Aucun utilisateur ne correspond à votre requête.';
			$req = $db->query("SELECT id, type FROM users WHERE pseudo = {$db->quote($pseudo)} AND password = {$db->quote($password)}");

			if($result = $req->fetch(PDO::FETCH_OBJ)) {
				$req = $db->query("SELECT * FROM {$result->type} WHERE id = {$result->id}");
				if($user = $req->fetch(PDO::FETCH_OBJ)) {
					$user->type = $result->type;
					$user->pseudo = $pseudo;
  
					$_SESSION['user'] = $user;

					$reponse->success = true;
					$reponse->type = $result->type;
				} else {
					$reponse->details = "Votre compte n'existe plus, veuillez contacter un administrateur.";
				}
			} else {
				$reponse->details = "Aucun utilisateur ne correspond aux données que vous avez saisies.";
				$reponse->error = true;
			}
		}
	}

	echo json_encode($reponse);
?>