<?php
	session_start();
	
	$reponse = new stdClass();
	$reponse->success = false;
	$reponse->admins = array();

	require 'connected.php';
	require 'is_admin.php';
	require 'db_connect.php';

	extract($_POST);

	if(isset($get)) {
		$reponse->success = true;
		$req = $db->query('SELECT users.id, pseudo, nom, prenom FROM users INNER JOIN admin ON users.id = admin.id');
		while($admin = $req->fetch(PDO::FETCH_OBJ)) {
			$reponse->admins[] = $admin;
		}
	}
	echo json_encode($reponse);
?>