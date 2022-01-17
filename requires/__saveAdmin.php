<?php 
	session_start();
	
	$reponse = new stdClass();
	$reponse->success = false;
	$reponse->error = false;
	$reponse->admins = array();
	$reponse->details = "Certains champs du formulaire sont vides ou invalides.\nVeuillez les corriger.";

	require 'connected.php';
	require 'is_admin.php';
	require 'db_connect.php';

	extract($_POST);

	if(isset($nom, $prenom, $pseudo, $password, $_password)) {
		if(isset($id)) $id = (int) htmlspecialchars($id);
		$nom = htmlspecialchars($nom);
		$prenom = htmlspecialchars($prenom);
		$pseudo = htmlspecialchars($pseudo);
		$password = htmlspecialchars($password);
		$_password = htmlspecialchars($_password);

		$reponse->error = true;
		$reponse->details = "Les mots de passe ne correspondent pas.";

		if($password === $_password) {

			$password = sha1($password);
			
			$reponse->error = false;
			$reponse->details = "Un Administrateur avec le même nom d'utilisateur existe déjà.";

			if(isset($id)) {
				$sql1 = "UPDATE admin SET nom={$db->quote($nom)}, prenom={$db->quote($prenom)} WHERE id = " + $id;
			} else {
				$sql1 = "INSERT INTO admin SET nom={$db->quote($nom)}, prenom={$db->quote($prenom)}";
			}
			$db->beginTransaction();

			$req = $db->exec($sql1);

			if($req) {
				$_id = isset($id) ? $id : $db->lastInsertId();
				if(isset($id)) {
					$sql2 = "UPDATE users SET pseudo={$db->quote($pseudo)}, password={$db->quote($password)} WHERE id = " + $_id;
				} else {
					$sql2 = "INSERT INTO users SET id = $_id, type='admin', pseudo={$db->quote($pseudo)}, password={$db->quote($password)}";
				}
				$reponse->success = $db->exec($sql2);
				if($reponse->success) {
					$db->commit();
					$reponse->details = "Administrateur sauvegardé avec succès.";
					$reponse->admin = new stdClass();
					$reponse->admin->id = $_id;
					$reponse->admin->nom = $nom;
					$reponse->admin->prenom = $prenom;
					$reponse->admin->pseudo = $pseudo;
				} else {
					$db->rollback();
				}
			} else {
				$db->rollback();
			}
		}
	}	

	echo json_encode($reponse);
?>