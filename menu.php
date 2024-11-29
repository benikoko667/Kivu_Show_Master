<?php 
    $nom_site = "www.isc_projet_tutorés.net";
?>

<header>
    
    <img class="logo" src="./img/logo.png" alt="logo">
          
    <div class="gauche">
        <div class="menutoggle" onclick="toggleMenu();">
            <p> ☰ </p>
        </div>

        <ul class="navbar">
            <li><a href="index.php#acceuil" onclick="toggleMenu();">Acceuil</a></li>
            <li><a href="equipe_creation.php" onclick="toggleMenu();">Apropos</a></li>
            <li><a href="authentification.php" onclick="toggleMenu();">Compte</a></li>
        </ul>

        <div class="sarch">
            <form name="recherche" method="post" action="">
                <select name="type_recherche" id="type_recherche">
                    <option value="nom">Nom spectacle</option>
                    <option value="acteur">Nom acteur</option>
                </select>
                <div class="recherche_principale">
                    <input id="motcle" type="text" name="mot_recherche" placeholder=" ">
                    <input class="btfind" type="submit" name="bt_recherche" value="Recherche"> 
                </div>
            </form>  
        </div>

    </div>

</header>