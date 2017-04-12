<?php
/**
 * Contrôleur secondaire chargé de la gestion des CT et CS
 * @author  Kojuri
 */

// bibliothèques à utiliser
require_once ('modele/App/Application.class.php');
require_once ('modele/App/Notification.class.php');
require_once ('modele/Render/AdminRender.class.php');
require_once ('modele/Bll/Attaques.class.php');

// récupération de l'action à effectuer
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
else {
    $action = 'CTCS';
}
// si un nom est passé en paramètre, créer un objet (pour consultation)
if (isset($_REQUEST["num"])) {
    $nom = $_REQUEST["num"];
}

// charger la vue en fonction du choix de l'utilisateur
switch ($action) {
    case 'ROSA' : {
			$lesCT=Attaques::chargerLesCT("ROSA");
			include 'vues/v_listeCTCS.php';        
    } break;  
	case 'XY' : {
			$lesCT=Attaques::chargerLesCT("XY");
			include 'vues/v_listeCTCS.php';        
    } break; 
	case 'NB2' : {
			$lesCT=Attaques::chargerLesCT("NB2");
			include 'vues/v_listeCTCS.php';        
    } break; 
	case 'NB' : {
			$lesCT=Attaques::chargerLesCT("NB");
			include 'vues/v_listeCTCS.php';        
    } break; 
	case 'HGSS' : {
			$lesCT=Attaques::chargerLesCT("HGSS");
			include 'vues/v_listeCTCS.php';        
    } break; 
	case 'DPP' : {
			$lesCT=Attaques::chargerLesCT("DPP");
			include 'vues/v_listeCTCS.php';        
    } break; 
	case 'RFVF' : {
			$lesCT=Attaques::chargerLesCT("RFVF");
			include 'vues/v_listeCTCS.php';        
    } break; 
	case 'RSE' : {
			$lesCT=Attaques::chargerLesCT("RSE");
			include 'vues/v_listeCTCS.php';        
    } break; 
	case 'OAC' : {
			$lesCT=Attaques::chargerLesCT("OAC");
			include 'vues/v_listeCTCS.php';        
    } break; 
	case 'RBJ' : {
			$lesCT=Attaques::chargerLesCT("RBJ");
			include 'vues/v_listeCTCS.php';        
    } break; 
	default:
	 {       
		include 'vues/v_CTCS.php'; break;
    } break;   
}

