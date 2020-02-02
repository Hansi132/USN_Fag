

function finn(bildenr) {
    var ask = new XMLHttpRequest();

    ask.onreadystatechange = function () {
        if(ask.readyState===4 && ask.status === 200) {
            let parts = ask.responseText.split('|');

            document.getElementById("filnavn").value = parts[0];
            document.getElementById("beskrivelse").value = parts[1];
            document.getElementById("opplastingsdato").value = parts[2];

        }

    };

    ask.open("GET", "ajax-finn-bilde.php?bildenr=" + bildenr);
    ask.send();

}