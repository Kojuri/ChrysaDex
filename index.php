<?php
/** 
 * Page d'accueil de l'application Chrysadex

 * Point d'entrée unique de l'application
 * @author Kojuri
 * @package default
 */

session_start(); // début de session

// inclure les bibliothèques de fonctions
require_once 'include/_config.inc.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>ChrysaDex</title>
		<meta name ="description" content="Découvrez toutes les informations sur tous les Pokémon, objets, attaques..." />
		<description hidden>Découvrez toutes les informations sur tous les Pokémon, objets, attaques...</description>
		<META NAME="Keywords" CONTENT="Shaymin, Gives, Giveaway, Pokédex, Showdown, Smogon, Pokebip, Pokepedia, Pokémon, Dex, Dexter, Espace, Type, Tiers, Stratégie, Enju Tomoe, Lou, Lyviaff, YouTube, Chrysacier, Army, Loul, Chrysadex">
		<meta charset="UTF-8" />
		<base href="/pokedex/" />
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		
	    <link rel='stylesheet' href='css/style.css'/>
		<!--  <link rel="stylesheet" type="text/css" href="css/screen.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />-->
	    <link rel="icon" href="img/favicon.png" />
		<link rel="shortcut icon" href="img/favicon.png">
        <link rel="apple-touch-icon" href="img/favicon.png">
		<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>	
   </head>
	
    <body>
	    <?php include("vues/_v_menu.php") ;
 ?>
	<div class="container style = "height:auto">
        <?php
        // composants de la page
      //  include("vues/_v_header.php") ;
        
        // Récupère l'identifiant de la page passée par l'URL.
        // Si non défini, on considère que la page demandée est la page d'accueil
        if (isset($_GET["uc"])) {
            $uc = $_GET["uc"];
        }
        else {
            $uc = 'home';
        }
        
        // variables pour la gestion des messages
        $msg = '';    // message passé à la vue v_afficherMessage
        $lien = '';   // message passé à la vue v_afficherErreurs
        
        // charger l'uc selon son identifiant
        switch ($uc) 
        {
            case 'gererPokemon' : 
                include 'controleurs/c_gererPokemon.php'; break;
			case 'gererAttaques' :
				include 'controleurs/c_gererAttaques.php'; break;
			case 'CTCS' :
				include 'controleurs/c_gererCTCS.php'; break;
            case 'type' :
				include 'controleurs/c_gererTypes.php'; break;
			case 'connexion' :
				include 'connexion.php'; break;
			case 'deconnexion' :
				include 'deconnexion.php'; break;
			default : include 'vues/v_home.php'; break;							
		}
        echo "</div>";
        include("vues/_v_footer.php");
        ?>     
		<script src="js/jquery.js"></script> 
		<script src="js/bootstrap.min.js"></script>		
    </body>
</html>
