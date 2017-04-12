<?php
/**
 * Contrôleur secondaire chargé de la gestion des Pokémon
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
    $action = 'listerPokemon';
}
// si un id est passé en paramètre, créer un objet (pour consultation)
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    $unPokemon = Pokemons::chargerPokemonParID($id);
}

// charger la vue en fonction du choix de l'utilisateur
switch ($action) {
    case 'consulterPokemon' : {
        if ($unPokemon == NULL) {
            Application::addNotification(new Notification("Ce Pokémon n'existe pas !", ERROR));
        }
        else {
            include 'vues/v_consulterPokemon.php';
        }
    } break;  
default:
	 {
        // récupérer les Pokémon
        $lesPokemon = Pokemons::chargerLesPokemon(1);
        // afficher le nombre de Pokémon
        $nbPokemon = count($lesPokemon);
        include 'vues/v_listePokemon.php';
    } break;   
}

