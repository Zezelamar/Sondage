var
	form = document.querySelector('form'),
	pseudo = form.querySelector('#pseudo'),
	password = form.querySelector('#password'),
	infos = document.querySelector('div.infos'),
	ajax = new XMLHttpRequest(),
	connexion = form.querySelector('input[type=submit]')
;

ajax.onload = function() {
	connexion.disabled = false;
	var data = JSON.parse(ajax.responseText);
	if (data.success) {
		infos.classList.remove('hidden');
		document.location.href = data.type + '.php';
	} else {
		infos.classList.remove('error');
		infos.classList.remove('info');
		infos.classList.add(data.error ? 'error':'info');
		infos.textContent = data.details;
		infos.classList.remove('hidden');
	}
}

form.onsubmit = function(e) {
	e.preventDefault();
	infos.classList.add('hidden');
	if((pseudo.value.trim().length > 7) && (password.value.trim().length > 0)) {
		ajax.open('POST', './requires/index.php');
		ajax.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
		ajax.send('pseudo=' + encodeURIComponent(pseudo.value.trim()) + '&password=' + encodeURIComponent(password.value.trim()));
		connexion.disabled = true;
	} else {
		infos.classList.add('error');
		infos.classList.remove('info');
		infos.classList.remove('hidden');
		infos.textContent = 'Certains champs sont vides ou invalides.';
		console.log('tout va bien')
	}
};
