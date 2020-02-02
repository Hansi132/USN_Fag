

function finn(brukernavn) {
    var askpls = new XMLHttpRequest();

    askpls.onreadystatechange = function () {
        if(askpls.readyState===4 && askpls.status === 200) {


            let parts = askpls.responseText.split('|');

            document.getElementById("fornavn").value = parts[0];
            document.getElementById("etternavn").value = parts[1];
            document.getElementById("klassekode").value = parts[2];
            document.getElementById("bildenr").value = parts[3];

        }

    };

    askpls.open("GET", "ajax-finn-student.php?brukernavn=" + brukernavn);
    askpls.send();

}