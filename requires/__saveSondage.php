<?php 
	session_start();
	require 'connected.php';

	$r = new stdClass();

	$r->success = false;
	$r->details = "Votre sondage n'est pas valide ou contient des champs vides. Veuillez les corriger.";

	require 'is_professeur.php';
	require 'db_connect.php';

	extract($_POST);

	$sondage = json_decode($sondage);

	$user->module = $db->query("SELECT id FROM module WHERE professeur = {$user->id} AND niveau = {$sondage->niveau}")->fetch(PDO::FETCH_OBJ)->id;

	if(isset($sondage, $sondage->questions, $sondage->description)) {

		$r->details = "Impossible d'enregistrer votre sondage, veuillez réessayer plus tard.";
		$db->beginTransaction();

		$req = $db->exec("INSERT INTO sondage SET description = {$db->quote($sondage->description)}, module = {$user->module}");
		if($req) {
			$sondage_id = $db->lastInsertId();
			$safe = false;
			foreach ($sondage->questions as $question) {
				$req = $db->exec("INSERT INTO question SET contenu = {$db->quote($question->contenu)}, sondage = $sondage_id");
				if($req) {
					$question_id = $db->lastInsertId();
					foreach ($question->reponses as $reponse) {
						$req = $db->exec("INSERT INTO reponse SET contenu = {$db->quote($reponse->contenu)}, type = {$db->quote($reponse->type)}, question = $question_id, min = {$db->quote($reponse->min)}, max = {$db->quote($reponse->max)}");
						if($req) {
							$safe = true;
						} else {
							$safe = false;
							break;
						}
					}
					if(!$safe) {
						break;
					}
				} else {
					$db->rollback();
					break;
				}
			}
			if(!$safe) {
				$db->rollback();
			} else {
				$r->success = true;
				$r->details = "Votre sondage est lancé avec succès!";
				$db->commit();
			}
		} else {
			$db->rollback();
		}
	}

	echo json_encode($r);
?>