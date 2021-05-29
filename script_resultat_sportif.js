function creerRequete(){
    var requete = null;
    try{
        requete = new XMLHttpRequest();
    }catch(essainmicrosoft){
        try{
            requete = new ActiveXObject("Msxm12.XMLHTTP");
        }catch(autremicrosoft){
            try{
                requete = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(eche){
                requete = null;
            }
        }
    }
    if(requete == null){
        alert("Impossible de créer l'objet de la requête !");
    }else{
        return requete
    }
}

function show_result_lumiere_inattendue(){
    //Surement pas besoin  -->  var display_field = document.getElementsById("lumina").value;
    //alert("ok");
    var requete = creerRequete();
    var test = "lumiere_inattendue"
    var url = "Model/affichage_donnees.php"

    //Utiliser POST
    requete.open("POST", url, true);
    requete.onreadystatechange = function(){
        afficher_resultat(requete);
    }

    //setRequestHeader
    requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //send
    requete.send("test="+test);
}

function show_result_rythme(){
    //Surement pas besoin  -->  var display_field = document.getElementsById("lumina").value;
    //alert("ok");
    var requete = creerRequete();
    var test = "rythme"
    var url = "view/affichage_donnees.php"

    //Utiliser POST
    requete.open("POST", url, true);
    requete.onreadystatechange = function(){
        afficher_resultat(requete);
    }

    //setRequestHeader
    requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //send
    requete.send("test="+test);
}

function show_result_frequence_cardiaque(){
    //Surement pas besoin  -->  var display_field = document.getElementsById("lumina").value;
    //alert("ok");
    var requete = creerRequete();
    var test = "frequence_cardiaque"
    var url = "view/affichage_donnees.php"

    //Utiliser POST
    requete.open("POST", url, true);
    requete.onreadystatechange = function(){
        afficher_resultat(requete);
    }

    //setRequestHeader
    requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //send
    requete.send("test="+test);
}

function show_result_temperature(){
    //Surement pas besoin  -->  var display_field = document.getElementsById("lumina").value;
    //alert("ok");
    var requete = creerRequete();
    var test = "temperature"
    var url = "view/affichage_donnees.php"

    //Utiliser POST
    requete.open("POST", url, true);
    requete.onreadystatechange = function(){
        afficher_resultat(requete);
    }

    //setRequestHeader
    requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //send
    requete.send("test="+test);
}

function show_result_reconnaissance_sonore(){
    //Surement pas besoin  -->  var display_field = document.getElementsById("lumina").value;
    //alert("ok");
    var requete = creerRequete();
    var test = "reconnaissance_sonore"
    var url = "view/affichage_donnees.php"

    //Utiliser POST
    requete.open("POST", url, true);
    requete.onreadystatechange = function(){
        afficher_resultat(requete);
    }

    //setRequestHeader
    requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //send
    requete.send("test="+test);
}



function afficher_resultat(requete){
    if(requete.readyState == 4 && requete.status == 200){
        var division = document.getElementById("show_results");
        division.innerHTML = requete.responseText;
    }
}