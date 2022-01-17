<?php 
	$user = (isset($_SESSION['user']) ? $_SESSION['user'] : false);

	if($user && isset($user->pseudo)) {
		$reponse->error = true;
		$reponse->details = 'Vous avez déjà une session en cours.';
		echo json_encode($reponse);
		exit();
	}
?>