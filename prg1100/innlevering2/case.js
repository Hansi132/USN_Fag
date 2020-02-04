function fokus(element){
    element.style.background="#2865bb";
}

function mistetFokus(element) {
    element.style.background= "#f4f4f4";
}

function musInn(element){
    document.getElementById("melding").style.color="#2865bb";

    if (element==document.getElementById("klassekode")){
        document.getElementById("melding").innerHTML="Klassekode should be two letters and one number.";
    }

    if (element==document.getElementById("klassenavn")){
        document.getElementById("melding").innerHTML="You have to give the class a name";
    }

    if (element==document.getElementById("fornavn")){
        document.getElementById("melding").innerHTML="You should put a first name";
    }

    if (element==document.getElementById("etternavn")){
        document.getElementById("melding").innerHTML="You should put a last name";
    }

    if (element==document.getElementById("brukernavn")){
        document.getElementById("melding").innerHTML="You should put a  username";
    }

    if (element==document.getElementById("studiekode")){
        document.getElementById("melding").innerHTML="You should put a coursecode";
    }




}


function musUt(){
    document.getElementById("melding").innerHTML="";
}


function fjernMelding()

{
    document.getElementById("melding").innerHTML="";
}