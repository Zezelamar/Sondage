<?php 
	$user = (isset($_SESSION['user']) ? $_SESSION['user'] : false);

	if($user && $user->type) {
		header("location:{$user->type}.php");
	}
?>