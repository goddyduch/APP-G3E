<?php
session_start();
unset($_SESSION);
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8" />
    </head>
    <body>
		<?php
 			header('Location: pageconnexion.php');
  			exit();
		?>
    	<a href="pageconnexion.php">lien</a>
    </body>
</html>
