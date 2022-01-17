window.addEventListener('load', function() {
	var
		REG_NOM = /^(?:[a-zâäàéèùûêëîïôöçñ]+[ ]?)+$/i,
		REG_PRENOM = /^(?:[a-zâäàéèûùêëîïôöçñ]+[ ]?)+$/i,
		REG_PSEUDO = /^[0-9a-z_@.]{8,}$/i
	;
	var
		_body = document.querySelector('body div.body'),
		temp = document.querySelector('div.body > .content > .temporaire'),
		current = {},
		principal = document.querySelector('.principal'),
		_title = principal.querySelector('.title'),
		_add = principal.querySelector('.add'),
		_edit = principal.querySelector('.edit'),
		_remove = principal.querySelector('.remove'),
		_close = principal.querySelector('.close'),
		sondages = principal.querySelector('div.sondages'),
		menuSondages = document.querySelector('#sondages'),
		arret_temporaire = false,
		forms = document.querySelector('#forms'),
		sondagesForm = forms.querySelector('form.sondage'),
		addSondageQuestion = sondagesForm.querySelector('.add_question'),
		sondagesFormQuestions = sondagesForm.querySelector('.questions'),
		submitSondage = sondagesForm.querySelector('.lancer_sondage'),
		choix_type_de_reponse = document.querySelector('div.choix_type_de_reponse'),
		infos = forms.querySelector('.infos'),
		currentSelected = false,
		sondage = question_editing = editing = global_question = global_parent = global_type = false
	;


	menuSondages.onclick = gestionSondages;

	function init() {
		var
			intro = temp.querySelector('._intro'),
			site = intro.querySelector('._1 h1'),
			langages = intro.querySelector('._1 div'),
			definition = intro.querySelector('._2'),
			pourquoi = temp.querySelector('._pourquoi'),
			p_pourquoi = pourquoi.querySelector('p'),
			procede = temp.querySelector('._procede'),
			professeur = procede.querySelector('._professeur'),
			p_list = professeur.querySelector('ul'),
			etudiant = procede.querySelector('._etudiant'),
			e_list = etudiant.querySelector('ul'),
			systeme = procede.querySelector('._systeme'),
			s_list = systeme.querySelector('ul')
		;

		temp.classList.remove('hidden');
		setTimeout(function() {
			intro.classList.remove('hidden');
			setTimeout(function() {
				site.classList.remove('hidden');
				setTimeout(function() {
					langages.classList.remove('hidden');
					setTimeout(function() {
						definition.classList.remove('hidden');
						setTimeout(function() {
							intro.classList.remove('fadeIn');
							intro.classList.add('fadeOutUp');
							intro.classList.add('hidden');
							intro.classList.remove('fadeOutUp');
							site.classList.add('hidden');
							langages.classList.add('hidden');
							definition.classList.add('hidden');
							pourquoi.classList.remove('hidden');
							setTimeout(function() {
								p_pourquoi.classList.remove('hidden');
								setTimeout(function() {
									procede.classList.remove('hidden');
									p_list.classList.remove('hidden');
									setTimeout(function() {
										etudiant.classList.remove('hidden');
										e_list.classList.remove('hidden');
										setTimeout(function() {
											systeme.classList.remove('hidden');
											s_list.classList.remove('hidden');
											setTimeout(function() {
												pourquoi.classList.add('fadeOutLeft');
												procede.classList.add('fadeOutDown');
												setTimeout(function() {
													pourquoi.classList.add('hidden');
													pourquoi.classList.remove('fadeOutLeft');
													p_pourquoi.classList.add('hidden');
													procede.classList.add('hidden');
													procede.classList.remove('fadeOutDown');
													p_list.classList.add('hidden');
													etudiant.classList.add('hidden');
													e_list.classList.add('hidden');
													systeme.classList.add('hidden');
													temp.classList.add('hidden');
													if(!arret_temporaire) init();
												}, 200);
											}, 6000);
										}, 2000);
									}, 2000);
								}, 1000);
							}, 1000);
						}, 2000);
					}, 1000);
				}, 1000);
			}, 200);
		}, 200);
	}

	init();


	function __init() {
		temp.classList.add('hidden');
		arret_temporaire = true;
		if(current.element) {
			current.element.classList.add('hidden');
			current.menu.disabled = false;
			_add.classList.remove(current.class_);
			_edit.classList.remove(current.class_);
			_remove.classList.remove(current.class_);
		}
		_edit.classList.add('mdi-inactive');
		_remove.classList.add('mdi-inactive');
		principal.classList.remove('hidden');
	}


	function gestionSondages() {
		__init();
		this.disabled = true;

		_title.textContent = 'Sondages';
		
		current.menu = this;
		current.class_ = 'sondage';

		_add.classList.add(current.class_);
		_edit.classList.add(current.class_);
		_remove.classList.add(current.class_);

		current.element = sondages;
		current.element.classList.remove('hidden');
	}

	function closeForm(form) {
		form.parentNode.classList.add('zoomOut');
		setTimeout(function() {
			form.parentNode.classList.remove('zoomOut');
			form.parentNode.classList.add('hidden');
			forms.classList.add('fadeOut');
			setTimeout(function() {
				forms.classList.remove('fadeOut');
				forms.classList.add('hidden');
				infos.classList.add('hidden');
				form.reset();
			}, 200);
		}, 200);
	}


	function displayQuestion(question) {
		var
			div = document.createElement('div'),
			dv = document.createElement('div'),
			p = document.createElement('p'),
			span = document.createElement('span')
		;

		div.className = 'question';
		div.id = '_' + question.id;

			p.className = 'contenu';
			p.textContent = "#" + question.id + "\t";
				span.textContent = question.contenu;
			p.appendChild(span);

		div.appendChild(p);

			span = document.createElement('span');
			span.className = 'mdi mdi-18px mdi-plus add_reponse';
			span.textContent = ' ajouter un réponse';

			span.onclick = function(e) {
				choix_type_de_reponse.classList.remove('hidden');
				choix_type_de_reponse.querySelector('.labels').classList.remove('hidden');
				choix_type_de_reponse.querySelector('div.number').classList.add('hidden');
				var
					labels = choix_type_de_reponse.querySelectorAll('.labels label')
				;
				for(var i=0; i<labels.length; i++) {
					labels[i].onclick = function(e) {
						(function(label) {
							if(label.className == 'number') {
								choix_type_de_reponse.querySelector('.labels').classList.add('hidden');
								choix_type_de_reponse.querySelector('div.number').classList.remove('hidden');
								choix_type_de_reponse.querySelector('input[type=button]').classList.remove('hidden');
								choix_type_de_reponse.querySelector('div.number input.min').value = '';
								choix_type_de_reponse.querySelector('div.number input.max').value = '';
								global_parent = dv;
								global_question = question;
								global_type = label.className;
							} else {
								choix_type_de_reponse.classList.add('hidden');
								var reponse = {
									id: question.reponses.length + 1,
									contenu: prompt('Écrivez votre réponse'),
									type: label.className,
									max: false,
									min: false
								};
								if(reponse.contenu) {
									question_editing = false;
									question.reponses.push(reponse);
									displayReponse(dv, reponse, question.id);
								}
							}
						})(e.currentTarget);
					}
				}
			};

			dv.className = 'reponses';
			dv.appendChild(span);

			if(question.reponses.length > 0) {
				question.reponses.forEach(function(reponse) {
					dv = displayReponse(dv, reponse, question.id);
				});
			}

		div.appendChild(dv);

		sondagesFormQuestions.appendChild(div);
	}

	choix_type_de_reponse.querySelector('input[type=button]').onclick = function() {
		choix_type_de_reponse.classList.add('hidden');
		var reponse = {
			id: global_question.reponses.length + 1,
			contenu: prompt('Écrivez votre réponse'),
			type: global_type,
			max: choix_type_de_reponse.querySelector('input.max').value.trim(),
			min: choix_type_de_reponse.querySelector('input.min').value.trim()
		};
		if(reponse.contenu) {
			question_editing = false;
			global_question.reponses.push(reponse);
			displayReponse(global_parent, reponse, global_question.id);
			global_parent = false;
			global_question = false;
			global_type = false;
		}
	}


	function displayReponse(elementParent, reponse, id) {
		var 
			element = false,
			input = false
		;

		if(['radio', 'checkbox'].includes(reponse.type)) {
			element = document.createElement('label');
			element.className = 'reponse inline';
			element.id = '_' + reponse.id;
				input = document.createElement('input');
				input.type = reponse.type;
				input.name = '_' + (reponse.type == "radio" ? '' : reponse.id) + id;
			element.appendChild(input);
			element.appendChild(document.createTextNode(reponse.contenu + ' '));
			elementParent.insertBefore(element, elementParent.lastElementChild);
		} else if(['text', 'textarea'].includes(reponse.type)) {
			var d_parent = document.createElement('div');
			d_parent.id = reponse.id;
			d_parent.className = 'reponse block';

				element = document.createElement('label');
				element.className = 'contenu';
				element.appendChild(document.createTextNode(reponse.contenu));

			d_parent.appendChild(element);

				input = document.createElement(reponse.type == 'text' ? 'input':'textarea');
				if(reponse.type == 'text') input.type = reponse.type;
				input.className = 'element';

			d_parent.appendChild(input);
			elementParent.insertBefore(d_parent, elementParent.lastElementChild);
		} else {
			var d_parent = document.createElement('div');
			d_parent.id = reponse.id;
			d_parent.className = 'reponse block';

				element = document.createElement('label');
				element.className = 'contenu';
				element.appendChild(document.createTextNode(reponse.contenu));

			d_parent.appendChild(element);

				input = document.createElement('input');
				input.type = 'number';
				input.className = 'element';
				input.max = reponse.max;
				input.min = reponse.min;

			d_parent.appendChild(input);
			elementParent.insertBefore(d_parent, elementParent.lastElementChild);
		}
		console.log(sondage.questions);
	} 


	/* TOUS LES EVENEMENTS */

	_add.onclick = function() {
		forms.classList.remove('hidden');
		if (this.classList.contains('admin')) {
			adminForm.classList.remove('hidden');
		} else if (this.classList.contains('sondage')) {
			sondage = {};
			questions_id = 0;
			sondage.questions = {};
			sondagesFormQuestions.innerHTML = '';
			sondagesForm.classList.remove('hidden');
		}
	}

	var closes = forms.querySelectorAll('.mdi-close');

	for(var i=0; i<closes.length; i++) {
		closes[i].onclick = function() {
			var $this = this;
			closeForm(this);
		};
	}

	_body.onclick = function(e) {
		if((e.target === current.element) || (e.target === _body) || (e.target === menuSondages.parentNode.parentNode)) {
			if(!!currentSelected && current.element.querySelector('#_' + currentSelected.id))
				current.element.querySelector('#_' + currentSelected.id).classList.remove('active');
			currentSelected = false;
			_edit.classList.add('mdi-inactive');
			_remove.classList.add('mdi-inactive');
		}
	};

	addSondageQuestion.onclick = function() {
		if(!question_editing) {
			question_editing = true;
			sondage.questions[++questions_id] = {
				id: questions_id,
				contenu: prompt('Écrivez votre question'),
				reponses: []
			};
			if(!!sondage.questions[questions_id].contenu && (sondage.questions[questions_id].contenu.trim().length > 0)) {
				displayQuestion(sondage.questions[questions_id]);
			} else {
				sondage.questions[questions_id--] = undefined;
				question_editing = false;
	 		}
	 	} else {
	 		alert('Vous devez d\'abord ajouter au moins une réponse à votre question pour continuer.');
	 	}
	};

	submitSondage.onclick = function() {
		var ajax = new XMLHttpRequest();

		ajax.onload = function() {
			var data = JSON.parse(ajax.responseText);
			if(data.success) {
				alert(data.details);
				closeForm(sondagesForm);
			} else {
				alert(data.details);
			}
		};

		if(!question_editing) {
			if(sondage && sondage.questions['1'] && (sondagesForm.querySelector('#description').value.trim().length > 0)) {
				sondage.description = sondagesForm.querySelector('#description').value.trim();
				sondage.niveau = 2;
				ajax.open('POST', './requires/__saveSondage.php');
				// ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
				var fd = new FormData();
				fd.append('sondage', JSON.stringify(sondage));
				ajax.send(fd);
			} else {
				alert('Votre sondage est invalide, veuillez remplir tous les champs.');
			}
		} else {
			alert('Vous avez une question sans réponses. Veuillez d\'abord la compléter.');
		}
	}

	choix_type_de_reponse.querySelector('.mdi-close').onclick = function() {
		choix_type_de_reponse.classList.add('hidden');
	};

}, false);
