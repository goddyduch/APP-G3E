<?php

session_start();
echo $_SESSION['droits'];
if ($_SESSION['access'] != true OR $_SESSION['droits'] != "Administrateur")
{
	header('Location: pageconnexion.php');
  	exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Administration</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <header>
    	<div id=conteneur>
    		<input type="submit" value="Accès database"/>
    		<input type="submit" value="Gérer les profils"/>
    		<input type="submit" value="Gérer FAQ"/>
    		<input type="submit" value="Gérer site web"/>
    		<input type="submit" value="Mon profil"/>
    	</div>
    </header>
    <body>
        <h1>Bienvenue <?php echo $_GET['user'] ?>!</h1>
    </body>
