function genererTableau(_data){
    var tableau = document.createElement(table);
    tableau.innerHTML = '<tr><th>nom</th><th>adresse</th><th>prix</th><th>commentaire</th><th>note</th><th>date de visite</th></tr>';
    for (i = 0; i < _data.length ; i++){
        var cetteLigne = _data[i];
        tableau.innerHTML = '<tr><td>'+cetteLigne.nom+'</td><td>'+cetteLigne.adresse+'</td><td>'+cetteLigne.prix+'</td><td>'+cetteLigne.commentaire+'</td><td>'+cetteLigne.note+'</td><td>'+cetteLigne.dateVisite+'</td></tr>';
        document.getElementById("contenue").appendChild(tableau);
    }
}

var listerResto = new XMLHttpRequest();
listerResto.onreadystatechange=function(){
    if (this.readyState == 4 && this.status == 200){
        data = JSON.parse(this.responseText);
        genererTableau(data);
    }
}

listerResto.open("GET", "resto.json", true);
listerResto.send();