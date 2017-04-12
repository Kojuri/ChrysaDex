<?php
/**
 * Contrôleur secondaire chargé de la gestion des Tiers
 * @author  Kojuri
 */

// bibliothèques à utiliser
require_once ('modele/App/Application.class.php');
require_once ('modele/App/Notification.class.php');
require_once ('modele/Render/AdminRender.class.php');
require_once ('modele/Bll/Pokemons.class.php');

// récupération de l'action à effectuer
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
else {
    $action = 'tiers';
}

// si un tier est passé en paramètre
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
	$lesPokemon=Pokemons::chargerLesPokemonParTier(1,$id);
	include 'vues/v_Tier.php';		
}
else
{
	include 'vues/v_listeTiers.php';	
}

