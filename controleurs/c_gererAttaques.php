<?php
/**
 * Contr�leur secondaire charg� de la gestion des Attaques
 * @author  Kojuri
 */

// biblioth�ques � utiliser
require_once ('modele/App/Application.class.php');
require_once ('modele/App/Notification.class.php');
require_once ('modele/Render/AdminRender.class.php');
require_once ('modele/Bll/Attaques.class.php');

// r�cup�ration de l'action � effectuer
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
else {
    $action = 'gererAttaques';
}
// si un nom est pass� en param�tre, cr�er un objet (pour consultation)
if (isset($_REQUEST["nom"])) {
    $nom = $_REQUEST["nom"];
    $uneAttaque = Attaques::chargerAttaqueParNom($nom);
}
// r�cup�rer les Attaques
$lesAttaques=Attaques::chargerLesAttaques(1);
// afficher le nombre d'attaques
$nbAttaques=count($lesAttaques);
// charger la vue en fonction du choix de l'utilisateur
switch ($action) {
    case 'consulterAttaque' : {
        if ($uneAttaque == NULL) {
            Application::addNotification(new Notification("Cette attaque n'existe pas !", ERROR));
        }
        else {
            if(($uneAttaque->getNumero())==1)
			{
				$prec=Attaques::chargerAttaqueParNum($nbAttaques);
			}
			else
			{
				$prec=Attaques::chargerAttaqueParNum(($uneAttaque->getNumero())-1);
			}
			if(($uneAttaque->getNumero())==$nbAttaques)
			{
				$suiv=Attaques::chargerAttaqueParNum(1);
			}
			else
			{
				$suiv=Attaques::chargerAttaqueParNum(($uneAttaque->getNumero())+1);
			}
			include 'vues/v_consulterAttaque.php';
        }
    } break;  
default:
	 {       
		include 'vues/v_listeAttaques.php'; break;
    } break;   
}

