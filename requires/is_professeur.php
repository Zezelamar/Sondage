<?php
	if ($user->type && ($user->type !== 'professeur')) {
		$reponse->details = "Vous n'avez pas le droit d'accéder à cette ressource.";
		echo json_encode($reponse);
		exit();
	}
?>
