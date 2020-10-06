<?php
session_start();
$id_session = session_id();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Connexion</title>
        <link rel="stylesheet" href="style2.css"/>
    </head>

    <body>
        <div id="conteneur">
            <section id=sectioncentre>
                <h2>Connexion requise</h2>
                <form method="post" action="pageconnexion.php" class="form">
                    <p>Utilisateur : <input type="text" name="login" id="login"/></p>
                    <p>Mot de passe : <input type="password" name="password" id="password"/></p>
                    <input type="submit" value="Connexion"/>
                </form>
                <?php 
                
                    if (isset($_POST['login'], $_POST['password']))
                    {
                        $login = $_POST['login']; 
                        $password = $_POST['password'];

                        try
                        {
                            $bdd = new PDO('mysql:host=localhost;dbname=raph1;charset=utf8', 'root', '');
                        }
                        catch (Exception $e)
                        {
                            die('Erreur : ' . $e->getMessage());
                        }

                        $reponse = $bdd->query('SELECT * FROM logins');
                        while ($donnees = $reponse->fetch())

                            if($login == $donnees['login'] AND $password == $donnees['password'])
                            {
                                $user = $donnees['user'];

                                $_SESSION['user'] = $user;
                                $_SESSION['login'] = $login;
                                $_SESSION['password'] = $password;
                                $_SESSION['access'] = true;
                                $_SESSION['droits'] = $donnees['droits'];

                                header('Location: Accueil.php?user='.$user);
                                exit();
                            }
                            else
                            {
                                $user = "REFUSE";
                            }
                        if ($user == "REFUSE")
                        {
                            echo "<p>Mot de passe ou login incorrect</p>";
                        }
                    }
                ?>
            </section>
            <section id=sectionimage>
            <p><img src="ressources/horus_logo.png" alt="logo de horus"> </p>
            </section>
        </div>
    </body>
</html>

