
function validateClass(){

    var klassekode = document.getElementById("klassekode");
    var klassenavn = document.getElementById("klassenavn");
    var studiekode = document.getElementById("studiekode");
    var feilmelding ="";

    if(studiekode.value.trim()==""){
        feilmelding = "Studiumkode er ikke fylt ut";
        document.getElementById("melding").style.color="#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    }

    if(klassekode.value.trim()=="") {
        feilmelding = "Klassekode er ikke fylt ut";
        document.getElementById("melding").style.color="#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    }
    else if (klassekode.value.trim().length !=3 ){
        feilmelding = "Klassekode must be 3 characters";
        document.getElementById("melding").style.color="#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    }
    else if (!klassekode.value.trim().match(/^[a-zæøå]{2}\d/i)){
        feilmelding = "Klassekode must be 2 letters and one number";
        document.getElementById("melding").style.color="#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    }
    else if (klassenavn.value.trim()==""){
        feilmelding = "Fyll ut klassenavn";
        document.getElementById("melding").style.color="#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    }
    else {
        return true;
    }
}

function validateStudent() {


    var fornavn = document.getElementById("fornavn");
    var etternavn = document.getElementById("etternavn");
    var klassekode = document.getElementById("klassekode");
    var brukernavn = document.getElementById("brukernavn");
    var feilmelding = "";

    if (klassekode.value.trim() == "") {
        feilmelding = "Klassekode er ikke fylt ut";
        document.getElementById("melding").style.color = "#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    } else if (klassekode.value.trim().length != 3) {
        feilmelding = "Klassekode must be 3 characters";
        document.getElementById("melding").style.color = "#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    } else if (!klassekode.value.trim().match(/^[a-zæøå]{2}\d/i)) {
        feilmelding = "Klassekode must be 2 letters and one number";
        document.getElementById("melding").style.color = "#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    } else if (fornavn.value.trim() == "") {
        feilmelding = "Fill out fornavn";
        document.getElementById("melding").style.color = "#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    } else if (etternavn.value.trim() == "") {
        feilmelding = "Fill out etternavn";
        document.getElementById("melding").style.color = "#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    } else if (brukernavn.value.trim() == "") {
        feilmelding = "Fill out brukernavn";
        document.getElementById("melding").style.color = "#FF0000";
        document.getElementById("melding").innerHTML = feilmelding;
        return false;
    } else {
        return true;
    }
}

function validateBilde() {

    var bildenr = document.getElementById("bildenr");
    var opplastingsdato = document.getElementById("opplastingsdato");
    var filnavn = document.getElementById("filnavn");
    var beskrivelse = document.getElementById("beskrivelse");
    var feilmelding = "";


    }




