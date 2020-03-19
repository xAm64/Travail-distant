let total = 0;
let nombreEmployes = 0;
let liste = '';
function genererTableau(_data) {
	let pair = true;
	nombreEmployes = _data.length;
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
		liste.sort((a, b) => a.employee_salary - b.employee_salary);
		genererTableau(liste);
	}
}

listEmployes.open("GET", "http://dummy.restapiexample.com/api/v1/employees", true);
listEmployes.send();