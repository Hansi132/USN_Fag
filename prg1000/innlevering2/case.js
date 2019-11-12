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
}