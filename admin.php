<?php 
	session_start();
	require 'connected.php';
	require 'is_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page | Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./assets/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/materialdesignicons.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/admin.css?ds">
</head>
<body>
	  <div class="head">
			<h1>Sondages</h1>
			<hr class="sep">
		</div>
		<div class="body">
			<ul class="menu">
				<li class="animated slideInDown"><span>Menu</span></li>
				<li class="animated fadeInLeft"><a id="niveaux">Niveaux</a></li>
				<li class="animated fadeInLeft"><a id="modules">Modules</a></li>
				<li class="animated fadeInLeft"><a id="etudiants">Étudiants</a></li>
				<li class="animated fadeInLeft"><a id="professeurs">Professeurs</a></li>
				<li class="animated fadeInLeft"><a id="administrateurs">Administrateurs</a></li>
			</ul>
			<div class="content">
				<div class="temporaire">
					<div class="animated fadeIn hidden _intro">
						<div class="_1">
							<h1 class="animated hidden zoomIn">Site web<br>dynamique</h1>
							<div class="animated hidden fadeInLeft">
								<span>HTML</span>
								<span>CSS</span>
								<span>PHP &amp; MySQL</span>
							</div>
						</div>
						<div class="_2 animated hidden fadeInDown">
							<p>Intérroger rapidement des personnes<br>pour se faire une opinion générale</p>
						</div>
					</div>
					<div class="animated hidden _pourquoi">
						<h1 class="animated fadeInUp">Pourquoi ?</h1>
						<p class="animated hidden fadeInDown">Améliorer l'activité de l'enseignant</p>
					</div>
					<div class="animated hidden _procede">
						<div class="animated fadeIn _professeur">
							<h2 class="animated fadeInLeft">Professeur</h2>
							<ul class="animated hidden fadeInLeft">
								<li class="animated zoomIn">Définir</li>
								<li class="animated zoomIn">Modifier</li>
								<li class="animated zoomIn">Enrichir</li>
								<li class="animated zoomIn">Consulter</li>
							</ul>
						</div>
						<div class="animated hidden fadeIn _etudiant">
							<h2 class="animated fadeInRight">Étudiant</h2>
							<ul class="animated hidden fadeInRight">
								<li class="animated zoomIn">Consulter</li>
								<li class="animated zoomIn">Participer</li>
								<li class="animated zoomIn">Proposer</li>
								<li class="animated zoomIn">Répondre</li>
							</ul>
						</div>
						<div class="animated hidden fadeIn _systeme">
							<h2 class="animated fadeInRight">Serveur</h2>
							<ul class="animated hidden fadeInRight">
								<li class="animated zoomIn">Récuillir</li>
								<li class="animated zoomIn">Analyser</li>
								<li class="animated zoomIn">Trier</li>
								<li class="animated zoomIn">Transmettre</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="animated hidden zoomIn principal">
					<div class="header">
						<h2 class="title"></h2>
						<ul>
							<li><span title="Ajouter" class="add mdi mdi-24px mdi-account-plus"></li>
							<li><span title="Modifier" class="edit mdi-inactive mdi mdi-24px mdi-account-edit"></li>
							<li><span title="Supprimer" class="remove mdi-inactive mdi mdi-24px mdi-account-remove"></li>
						</ul>
						<span class="mdi mdi-24px mdi-close"></span>
					</div>
					<div class="body">
						<ul class="animated hidden fadeIn administrateurs">
							<li>
								<span>Ident.</span>
								<span>Nom</span>
								<span>Prénom</span>
								<span>Pseudo</span>
							</li>
						</ul>

						<ul class="animated hidden fadeIn professeurs">
						</ul>

						<ul class="animated hidden fadeIn etudiants">
						</ul>

						<ul class="animated hidden fadeIn niveaux">

						</ul>

						<ul class="animated hidden fadeIn modules">
						</ul>
					</div>
				</div>
			</div>
		</div>


		<div id="forms" class="animated hidden fadeIn">
			<form class="admin hidden animated zoomIn">
				<span class="mdi mdi-24px mdi-dark mdi-close"></span>
				<h2>Sauvegarde</h2>

				<div>
					<label>Nom</label>
					<input type="text" id="nom" name="nom" autocomplete="off">
				</div>

				<div>
					<label>Prénom</label>
					<input type="text" id="prenom" name="prenom" autocomplete="off">
				</div>

				<div>
					<label>Nom d'utilisateur</label>
					<input type="text" id="pseudo" name="pseudo" autocomplete="off">
				</div>

				<div>
					<label>Nouvau mot de passe</label>
					<input type="password" id="password" name="password" autocomplete="off">
				</div>

				<div>
					<label>Confirmation mot de passe</label>
					<input type="password" id="_password" name="_password" autocomplete="off">
				</div>

				<div><input type="submit" value="Enregister"></div>
			</form>

			<form class="niveau hidden animated zoomIn">
				<!-- <span class="mdi mdi-24px mdi-dark mdi-close"></span>
				<h2>Élaboration du sondage</h2>
				<div class="form-content">
					<div class="description">
						<div class="description">
							<label>Décrivez votre sondage</label>
							<textarea id="description">Sondage du module IA</textarea>
						</div>
						<div class="remplissage">
							Questions
							<span></span>
						</div>
						<div class="questions">
							<div class="question" id="_1">
								<p class="contenu">#1.	<span>Assistez-vous aux séances de IA ?</span></p>
								<div class="reponses">
									<label class="reponse inline" id=""><input type="checkbox" name="_1"> Oui, le cours</label>
									<label class="reponse inline" id=""><input type="checkbox" name="_1" checked="checked"> Oui, le TD</label>
								</div>
							</div>

							<div class="question" id="_2">
								<p class="contenu">#2.	<span>Quel est votre niveau d'assimilation (0 - 100) ?</span></p>
								<div class="reponses">
									<div class="reponse block" id="">
										<label class="contenu">Sur une échelle de 1 à 10</label>
										<input type="number" min="0" max="100" class="element">
									</div>
								</div>
							</div>

							<div class="question" id="_3">
								<p class="contenu">#3.	<span>S'il y a manque d'assimilation, pourquoi ?</span></p>
								<div class="reponses">
									<label class="reponse inline" id=""><input type="checkbox" name="_11"> La langue</label>
									<label class="reponse inline" id=""><input type="checkbox" name="_12"> Difficulté du contenu</label>
									<label class="reponse inline" id=""><input type="checkbox" name="_13"> Manque de révisions et non préparation TD</label>
									<label class="reponse inline" id=""><input type="checkbox" name="_14"> Non  maîtrise des pré-réquis</label>
									<div class="reponse block" id="">
										<label class="contenu">Autre</label>
										<textarea class="element"></textarea>
									</div>
								</div>
							</div>

							<div class="question" id="_4">
								<p class="contenu">#4.	<span>Quelle est votre priorité pour le module ?</span></p>
								<div class="reponses">
									<label class="reponse inline" id=""><input type="radio" name="_1"> Acquérir le savoir</label>
									<label class="reponse inline" id=""><input type="radio" name="_1"> La note</label>
								</div>
							</div>

							<div class="question" id="_5">
								<p class="contenu">#5.	<span>Quel est votre degré d'intérêt pour le module ?</span></p>
								<div class="reponses">
									<label class="reponse inline" id=""><input type="radio" name="_1"> Le même que les autres modules</label>
									<label class="reponse inline" id=""><input type="radio" name="_1"> Moins</label>
									<label class="reponse inline" id=""><input type="radio" name="_1"> Plus</label>
								</div>
							</div>

							<div class="question" id="_6">
								<p class="contenu">#6.	<span>Que peut-il être amélioré au Cours/TD ?</span></p>
								<div class="reponses">
									<div class="reponse block" id="">
										<label class="contenu">Votre réponse</label>
										<textarea class="element"></textarea>
									</div>
								</div>
							</div>

						</div>


					</div>
					<div class="_menu">
						<span class="mdi mdi-24px mdi-plus add_question" title="Ajouter une question au sondage"></span>
						<span class="_rempli"></span>
						<span class="mdi mdi-24px mdi-play"> Lancer</span>
					</div>
				</div> -->
			</form>

			<div class="infos animated zoomIn hidden"></div>
		</div>
		<script src="./assets/js/admin.js?ds"></script>
</body>
</html>

									<!-- <div class="reponse block" id="">
										<label class="contenu">Sur une échelle de 1 à 10</label>
										<select class="element">
											<option>A</option>
											<option>A</option>
											<option>A</option>
											<option>A</option>
											<option>A</option>
										</select>
										<textarea class="element"></textarea>
									</div> -->
