if(brukerFinnes($brukernavn)){
  print("Brukernavn finnes fra før av");
    } else {
      $sql = "INSERT INTO BRUKER VALUES('$brukernavn','$passord');";
      mysqli_query($db, $sql) or die ("Cant register data");
      print ("F&oslash; lgende data er n&aring; registrert: <br /> ");
      print ("Brukernavn: $brukernavn <br /> Passord: $passord <br />  <br />");
      print ("<a href='innlogging.php'>G&aring; til innloggingsside </a>");
    }