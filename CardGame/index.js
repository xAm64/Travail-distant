data = '';
function genererCard(data, _carte){
	if (_carte>= 1 && _carte < data.length){
		var maCarte = data[_carte];
		var carteAfficher = document.createElement('div');
		carteAfficher.setAttribute('class','carte');
		carteAfficher.innerHTML = '<div class="haut"><table><tr><td width=33% rowspan=2 class="levelPerso">'+maCarte.level+'</td><td class="nomPerso">'+maCarte.name+'</td></tr>'+
		'<tr><td>played: '+maCarte.played+' | Victoires: '+maCarte.victory+'</td></table></div>'+
	'<div class="gauche"><img src="armure.png" alt="armure"></div>'+
	'<div class="droite"><table><tr><td class="power"> Power<br>'+maCarte.power+'</td></tr>'+
	'<tr><td class="attack">Attack<br>'+maCarte.attack+'</td></tr>'+
	'<tr><td class="armor">Defence<br>'+maCarte.armor+'</td></tr></table></div>'+
	'<div class="bas">ID joueur :'+maCarte.id+'</div>';
	document.getElementById("afficherCarte").appendChild(carteAfficher);
	}
}
function genererTableau(data) {
	var ligne = 0;
	for (let i = 0; i < data.length; i++){
		var cePerso = data[i];
		var afficherPerso = document.createElement('tr');
		if (ligne == 0){
			afficherPerso.setAttribute('class','pair');
			ligne ++;
		} else {
			afficherPerso.setAttribute('class','impair');
			ligne = 0;
		}
		afficherPerso.innerHTML = '<td>'+cePerso.id+'</td><td>'+cePerso.name+'</td><td>'+cePerso.level+'</td><td>'+cePerso.description+'</td><td>'+cePerso.power+'</td><td>'+cePerso.attack+'</td><td>'+cePerso.armor+'</td><td>'+cePerso.damage+'</td><td>'+cePerso.mitigation+'</td><td>'+cePerso.played+'</td><td>'+cePerso.victory+'</td><td>'+cePerso.defeat+'</td><td>'+cePerso.draw+'</td>';
		document.getElementById("personnages").appendChild(afficherPerso);
	}
}
/* All fonction calculer maximum*/
function maxPower(_data){
	let id = 0;
	let max = _data[0].power;
	for (i = 1; i < _data.length; i++){
		if (_data[i].power > max){
			max = _data[i].power;
			j = i;
		}
	}
	return id +1;
}
function maxArmor(_data){
	let j=0;
	let max = _data[0].armor;
	for (let i = 1 ; i < _data.length; i++){
		if (_data[i].armor > max){
			max = _data[i].armor;
			j = i;
		}
	}
	return j +1;
}
function maxPlayed(_data){
	let j=0;
	let max = _data[0].played;
	for (let i = 1; i < _data.length; i++){
		if (_data[i].played > max){
			max = _data[i].played;
			j= i;
		}
	}
	return j +1;
}
function maxVictory(_data){
	let j=0;
	let max = _data[0].victory;
	for(let i = 1; i<_data.length; i++) {
		if (_data[i].victory > max) {
			max = _data[i].victory;
			j = i;
		}
	}
	return j+1;
}

/* Lancer json */
var lectureCarte = new XMLHttpRequest();
lectureCarte.onreadystatechange=function() {
	if (this.readyState == 4 && this.status == 200) {
		data= JSON.parse(this.responseText);
		genererTableau(data);
		genererCard(data, maxPower(data));
		genererCard(data, maxArmor(data));
		genererCard(data, maxPlayed(data));
		genererCard(data, maxVictory(data));
	}
}
lectureCarte.open("GET","https://arfp.eu/dataset/cards.json", true);
lectureCarte.send();

