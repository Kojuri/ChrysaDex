<?php
require_once(__DIR__.'/modele/Bll/Pokemons.class.php');

	if (!empty($_POST["couleur"]))
	{
		$lesPokemon = Pokemons::chargerLesPokemonParCouleur($_POST["couleur"]);
	}
	else
	{
		echo 'Aucun Pokémon trouvé.';
	}
?>