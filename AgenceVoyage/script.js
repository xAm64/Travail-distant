function genererContenue (_data){
	for (let i = 0; i < _data.length; i++) {
		var voyages = document.createElement('div');
		let donnees = _data[i];
		voyages.setAttribute('class','affiches');
		voyages.innerHTML = '<div id="titre">'+donnees.titre+'</div>'+
		'<div id="photo"><img src="Photos/'+i+'.jpg" alt="'+donnees.titre+'"></div>'+
		'<div id="lieux">'+donnees.depart+' | '+donnees.destination+' | '+donnees.nombre_jours+'jours | prix: '+donnees.prix+' €</div><br>'+
		'<div id="description">'+donnees.description+'</div>';
		document.getElementById("contenue").appendChild(voyages);
	}
}

var lesVoyages = new XMLHttpRequest();
lesVoyages.onreadystatechange=function (){
	if (this.readyState == 4 && this.status == 200 ) {
		data= JSON.parse(this.responseText);
		genererContenue(data);
	}
}

lesVoyages.open("GET", "https://arfp.eu/dataset/voyages.json", true);
lesVoyages.send();