<?php

$filnavn="./student.txt";  /* filnavn angitt */

$angittFagkode=$_GET["klassekode"];

print ("<table border=0>");  /* starten på tabellen definert */

$filoperasjon="r";  /* filoperasjon ("r" -for lesing) angitt  */

$fil = fopen($filnavn,$filoperasjon);  /* filen åpnet */

while ($linje = fgets ($fil))  /* en linje lest fra fil */
{
    if ($linje != "")  /* linjen lest fra fil er ikke tom */
        {$del = explode (";" , $linje);  /* innholdet av linjen delt opp */
            $brukernavn=trim($del[0]);  /* fagkode hentet ut */
            $fornavn=trim($del[1]); /* oppgavenr hentet ut */
            $etternavn=trim($del[2]);
            $klassekode=trim($del[3]);/* frist hentet ut */
            if ($angittFagkode==$klassekode )  /* fagkode finnes på fil */
                {print ("<tr> <td> $brukernavn $fornavn $etternavn $klassekode </td> </tr>");  /* ny rad skrevet */
                }
        }
}

fclose ($fil);  /* filen lukket */
print ("</table>");  /* slutten på tabellen definert */