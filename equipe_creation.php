<?php 
    session_start();
    require("./model/config/commandes.php");
    
    $_nom1 = "KOKO NTIBONERA Beni";
    $_nom2 = "LERO MUSA Moise";
    $_nom3 = "LUCIEN CALAZIRE Richard";

    $_mat1 = "7442/2021-2022";
    $_mat2 = "5769/2021-2022";
    $_mat3 = "7471/2021-2022";

    $_promotion = "Etudiant en troisième année de licence a l'institut supérieure de commerce de Bukavu (ISC/Bukavu)";
    
    $_encadreur = "ASS AUGUSTIN CILABARA NELSON";
    $_directeur = "ASS AUGUSTIN CILABARA NELSON";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel = "stylesheet" href = "./vue/styles/style_equipe_creation.css"/>
        <title><?=  $_SESSION['systeme'] ?></title>

    </head>
    <body>
        <?php 
            include("menu.php");
        ?>

        <section class="creation" id="creation">

            <?php 
                if(isset($_POST['bt_recherche'])){

                    header('Location:http://localhost/KIVU_SHOW/index.php');
                    exit;                            
                }
            ?>
            
            <div class="contenu">
                <h3 class="titre">Projet tutoré portant sur <Br/><span>LA CONCEPTION ET 
                    LA REALISATION D’UN SYSTEME DE GESTION DE PROGRAMME ET DE RESERVATION 
                    DES BILLETS DE SPECTALE</span><Br/></h3>
                <p>Presenté par : <Br/></p>
            <div class="info">

                <div class="InfoBlock">
                <div class="contenu_second">
                    <div class="left">
                        <img class="image" src="./img/profil1.jpg" alt="logo">
                    </div>
                    <div class="right">
                        <h3 class="nom"><?=  $_nom1 ?></h3>
                        <h2>    <?= $_mat1 ?>   </h2>
                        <p class="parag"><?=  $_promotion ?></p>
                    </div>
                </div>

                <div class="contenu_second">
                    <div class="left">
                        <img class="image" src="./img/IMG_904.jpg" alt="logo">
                    </div>
                    <div class="right">
                        <h3 class="nom"><?=  $_nom2 ?></h3>
                        <h2>    <?= $_mat2 ?>   </h2>
                        <p class="parag"><?=  $_promotion ?></p>
                    </div>
                </div>

                <div class="contenu_second">
                    <div class="left">
                        <img class="image" src="./img/profil3.JPG" alt="logo">
                    </div>
                    <div class="right">
                        <h3 class="nom"><?=  $_nom3 ?></h3>
                        <h2>    <?= $_mat3 ?>   </h2>
                        <p class="parag"><?=  $_promotion ?></p>
                    </div>
                </div>
                </div>
                </div>
                <p class="parag" >Travail encadré par : <?=  $_encadreur ?></p>
                <p class="parag">Travail dirigé par : <?=  $_directeur ?></p>

            </div>
        </section>
    
        <?php 
            include("copyright.php");
        ?>      
        
        <script src="./vue/js/index.js"></script>
    </body>
</html> 