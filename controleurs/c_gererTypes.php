<?php
/**
 * Contrôleur secondaire chargé de la gestion des Attaques
 * @author  Kojuri
 */

// bibliothèques à utiliser
require_once ('modele/App/Application.class.php');
require_once ('modele/App/Notification.class.php');
require_once ('modele/Render/AdminRender.class.php');
require_once ('modele/Bll/Types.class.php');

// récupération de l'action à effectuer
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
else {
    $action = 'Type';
}
// si un nom est passé en paramètre, créer un objet (pour consultation)
if (isset($_REQUEST["nom"])) {
    $nom = $_REQUEST["nom"];
    $unType = Types::chargerTypeParNom($nom);
}
// charger la vue en fonction du choix de l'utilisateur
switch ($action) { 
default:
	 {       
		$uneChaine=Types::chargerLesStatsParType($nom,"PV");
		$valeur="";
		foreach($uneChaine as $uneLettre)
		{
			$valeur.=$uneLettre[0];
		}
		$PV=floatval($valeur);
		$uneChaine=Types::chargerLesStatsParType($nom,"Atq");
		$valeur="";
		foreach($uneChaine as $uneLettre)
		{
			$valeur.=$uneLettre[0];
		}
		$Atq=floatval($valeur);
		$uneChaine=Types::chargerLesStatsParType($nom,"Def");
		$valeur="";
		foreach($uneChaine as $uneLettre)
		{
			$valeur.=$uneLettre[0];
		}
		$Def=floatval($valeur);
		$uneChaine=Types::chargerLesStatsParType($nom,"AtqSpe");
		$valeur="";
		foreach($uneChaine as $uneLettre)
		{
			$valeur.=$uneLettre[0];
		}
		$AtqSpe=floatval($valeur);
		$uneChaine=Types::chargerLesStatsParType($nom,"DefSpe");
		$valeur="";
		foreach($uneChaine as $uneLettre)
		{
			$valeur.=$uneLettre[0];
		}
		$DefSpe=floatval($valeur);
		$uneChaine=Types::chargerLesStatsParType($nom,"Vit");
		$valeur="";
		foreach($uneChaine as $uneLettre)
		{
			$valeur.=$uneLettre[0];
		}
		$Vit=floatval($valeur);
		$moy=($PV+$Atq+$Def+$AtqSpe+$DefSpe+$Vit)/6;
		$moy=round($moy,2);
		$PV=round($PV,0);
		$Atq=round($Atq,0);
		$Def=round($Def,0);
		$AtqSpe=round($AtqSpe,0);
		$DefSpe=round($DefSpe,0);
		$Vit=round($Vit,0);		
		$lesAttaques=Types::chargerLesAttaquesParType($nom);
		$lesPokemon=Types::chargerLesPokemonParType($nom);
		include 'vues/v_consulterType.php'; break;
    } break;   
}

