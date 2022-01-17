<?php 
	if($user->type & !($user->type === 'etudiant')) {
		header("location:{$user->type}.php");
	}
?>