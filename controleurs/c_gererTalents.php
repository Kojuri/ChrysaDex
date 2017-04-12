<?php
/**
 * Contr�leur secondaire charg� de la gestion des Pok�mon
 * @author  Kojuri
 */

// biblioth�ques � utiliser
require_once ('modele/App/Application.class.php');
require_once ('modele/App/Notification.class.php');
require_once ('modele/Render/AdminRender.class.php');
require_once ('modele/Bll/Pokemons.class.php');

// r�cup�ration de l'action � effectuer
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
else {
    $action = 'listerPokemon';
}
// si un id est pass� en param�tre, cr�er un objet (pour consultation)
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    $unPokemon = Pokemons::chargerPokemonParID($id);
}

// charger la vue en fonction du choix de l'utilisateur
switch ($action) {
    case 'consulterPokemon' : {
        if ($unPokemon == NULL) {
            Application::addNotification(new Notification("Ce Pok�mon n'existe pas !", ERROR));
        }
        else {
            include 'vues/v_consulterPokemon.php';
        }
    } break;  
default:
	 {
        // r�cup�rer les Pok�mon
        $lesPokemon = Pokemons::chargerLesPokemon(1);
        // afficher le nombre de Pok�mon
        $nbPokemon = count($lesPokemon);
        include 'vues/v_listePokemon.php';
    } break;   
}

