<?php 
	$user = (isset($_SESSION['user']) ? $_SESSION['user'] : false);
	if(!$user) {
		header("location:./");
	}
?>