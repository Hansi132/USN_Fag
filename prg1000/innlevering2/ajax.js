
function visOppgaver(klassekode)


{
    var foresporsel=new XMLHttpRequest();  /* oppretter request-objekt */


    foresporsel.onreadystatechange=function()
    {
        if (foresporsel.readyState==4 && foresporsel.status==200)  /* responsen er fullført og vellykket */
            {
                document.getElementById("melding1").innerHTML=foresporsel.responseText;/* responsteksten legges i meldingsfeltet */
            }
        }


    foresporsel.open("GET","ajaxsok.php?klassekode="+klassekode);  /* angir metode og URL

*/
    foresporsel.send();  /* sender en request */

}


