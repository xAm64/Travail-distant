img = 1;
nombreDePhotos = 0;
data = '';

function genererDiapo(_data){
	nombreDePhotos = _data.length;
	if (img >= 1 && img < _data.length) {
		var monObjet = _data[img];
	var carousel = document.createElement('div');
	carousel.setAttribute('class','carousel-iner');
	carousel.innerHTML = '<div class="carousel-item active"><img class="d-block w-100" id="imageCarousel" src="photos_volcans/'+monObjet.ID+'.jpg" alt="'+monObjet.alt+'">'+
	'<div class= "carousel-caption d-block"><p class="titre" id="titreImage">'+monObjet.titre+'</p></div>';
	document.getElementById("animation").appendChild(carousel);
	} else {
		img = 1;
		maRequete.open("GET", "liste.json", true);
		maRequete.send();
	}
}

var maRequete = new XMLHttpRequest();
maRequete.onreadystatechange=function () {
	if (this.readyState == 4 && this.status == 200) {
		data= JSON.parse(this.responseText);
		genererDiapo(data);
	}
}

maRequete.open("GET", "liste.json", true);
maRequete.send();

imgMin = document.getElementById("min").value;
imgMax = document.getElementById("max").value;

document.getElementById("carPrev").addEventListener("click",previous);
document.getElementById("carNext").addEventListener("click",next);

function genererText() {
	document.getElementById("imageCarousel").src = 'photos_volcans/'+img+'.jpg';
	document.getElementById("imageCarousel").alt = data[img-1].alt;
	document.getElementById("titreImage").innerHTML = data[img-1].titre;
}
function previous () {
	if (img <= imgMin) {
		img = imgMax;
	} else {
		img --;
	}
	genererText();
}
function next() {
	if (img >= imgMax) {
		img = imgMin;
	} else {
		img ++;
	}
	genererText();
}

document.getElementById("validation").addEventListener("click", updateImages);
function updateImages() {
	if (document.getElementById("min").value >= 1 && document.getElementById("min").value <= nombreDePhotos) {
		imgMin = document.getElementById("min").value;
	} else {
		imgMin = 1;
	}
	if (document.getElementById("max").value >= 1 && document.getElementById("max").value <= nombreDePhotos) {
		imgMax = document.getElementById("max").value;
	} else {
		imgMax = nombreDePhotos;
	}
	if (imgMin > imgMax) {
		let imgTemp = imgMin;
		imgMin = imgMax;
		imgMax = imgTemp;
	}
	img = imgMin;
	genererText();
	setInterval('next()', 15000);
}