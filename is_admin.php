<?php 
	if($user->type & !($user->type === 'admin')) {
		header("location:{$user->type}.php");
	}
?>