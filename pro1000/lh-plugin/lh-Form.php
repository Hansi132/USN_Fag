<?php

/* --------------- */
/*   Form Design   */
/* --------------- */

?>

<form class="form" method="post" name="form" action= this.php>
	<label for="name">Navn</label>
	<input type="text" class="name" id="name" required>
	<label for="email">E-Post</label>
	<input type="email" class="email" id="email" required>
	<label for="telefon">Telefon</label>
	<input type="text" class="telefon" id="telefon" required>
	<label for="hvorfor">Hva</label>
	<textarea class="hvorfor" name="hvorfor" id="hvorfor">Hva ønsker du?</textarea>
	<br>
	<input type="submit" name="submit" id="submit" value="Send"/>

</form>