<?php
	if ($user->type && ($user->type !== 'admin')) {
		$reponse->details = "Vous n'avez pas le droit d'accéder à cette ressource.";
		echo json_encode($reponse);
		exit();
	}
?>
