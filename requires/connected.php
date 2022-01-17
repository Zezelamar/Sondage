<?php 
	$user = (isset($_SESSION['user']) ? $_SESSION['user'] : false);
	if(!$user) {
		$reponse->details = "Vous devez d'abord ouvrir une session pour continuer.";
		echo json_encode($reponse);
		exit();
	}
?>