

function finn(klassekode) {
    var askpls = new XMLHttpRequest();

    askpls.onreadystatechange = function () {
        if(askpls.readyState===4 && askpls.status === 200) {


            let parts = askpls.responseText.split('|');

            document.getElementById("klassenavn").value = parts[0];
            document.getElementById("studiekode").value = parts[1];

        }

    };

    askpls.open("GET", "ajax-finn-klasse.php?klassekode=" + klassekode);
    askpls.send();

}