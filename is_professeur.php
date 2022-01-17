<?php 
	if($user->type & !($user->type === 'professeur')) {
		header("location:{$user->type}.php");
	}
?>