let liste = '';
/* Les ordres */
let orderSalaire = false;
let orderNaissance = false;
let orderID = false;
/* contenue */
function genererTableau(_data) {
	let total = 0;
	let afficherTitre = document.createElement('tr');
	afficherTitre.innerHTML ='<tr><th>ID<button onclick="ordreID();">±</button></th><th>Nom Prénom</th><th>Mail</th><th>Salaire Mensuel<button onclick="ordreSalaire();">±</button></th><th>Année de naissance<button onclick="ordreNaissance();">±</button></th><th>Action</th></tr>';
	document.getElementById("eployes").appendChild(afficherTitre);
	let pair = true;
	let nombreEmployes = _data.length;
	for (let i = 0; i < _data.length; i++) {
		let employe = _data[i];
		/* calcul Àge */
		let currentDate = new Date();
		let currentYear = currentDate.getFullYear();
		let yearBirth = (currentYear - employe.employee_age);
		/* calcul mail */
		let nameBrut = employe.employee_name;
		let mailDown = nameBrut.toLowerCase();
		let firstLetter = mailDown.charAt(0);
		let separe = mailDown.split(" ");
		let secondNom = separe[1];
		let mail = firstLetter +'.'+ secondNom;
		/* Calcul salaire */
		let salaire = employe.employee_salary/100;
		total += salaire;
		/* suite du code */
		let afficherEmploye = document.createElement('tr');
		if (pair == true) {
			afficherEmploye.setAttribute('class','pair');
			pair = false;
		} else {
			afficherEmploye.setAttribute('class','impair');
			pair = true;
		}
		afficherEmploye.innerHTML = '<td>'+employe.id+'</td><td>'+nameBrut+'</td><td>'+mail+'@email.com</td><td>'+salaire+'</td><td>'+yearBirth+'</td><td><button>Dupliquer</button><button>Supprimmer</button></td>';
		document.getElementById("eployes").appendChild(afficherEmploye);
		if (i == _data.length-1) {
			document.getElementById("total").innerHTML = 'Le total du nombre d\'employés est de :'+nombreEmployes+' pour un salaire total de: '+total+'€';
		}
	}
}

var listEmployes = new XMLHttpRequest();
listEmployes.onreadystatechange= function() {
	if(this.readyState == 4 && this.status == 200) {
		data= JSON.parse(this.responseText);
		liste = data.data;
		genererTableau(liste);
	}
}

listEmployes.open("GET", "http://dummy.restapiexample.com/api/v1/employees", true);
listEmployes.send();

function deleteContenue(){
	document.getElementById("eployes").innerHTML = "";
	genererTableau(liste);
}

function ordreSalaire() {
	deleteContenue();
	if (orderSalaire == true){
		liste.sort((a, b) => a.employee_salary - b.employee_salary);
		orderSalaire = false;
	} else {
		liste.sort((b, a) => a.employee_salary - b.employee_salary);
		orderSalaire = true;
	}
}

function ordreNaissance() {
	deleteContenue();
	if (orderNaissance == true) {
		liste.sort((a, b) => a.employee_age - b.employee_age);
		orderNaissance = false;
	} else {
		liste.sort((b, a) => a.employee_age - b.employee_age);
		orderNaissance = true;
	}
}

function ordreID(){
	deleteContenue();
	if (orderID == true) {
		liste.sort((a, b) => a.id - b.id);
		orderID = false;
	} else {
		liste.sort((b, a) => a.id - b.id);
		orderID = true;
	}
}