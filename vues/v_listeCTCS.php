<?php
/** 
 * 
 * Pokédex
 * © Chrysadex, 2016
 * 
 * Page de gestion des CT/CS
 * Affiche une liste des CT/CS présentes dans la base
 * @author  Iruni
 * @package default
*/
require_once ('include/_metier.lib.php');
require_once ('modele/Bll/Attaques.class.php');

?>
<div id="content">
<?php
$jeu="";
switch($_GET['action']){
	case 'ROSA': {
		$jeu="Rubis Oméga Saphir Alpha";
	}break;
	case 'XY': {
		$jeu="XY";
	}break;
	case 'RBJ': {
		$jeu="Rouge/Bleu/Jaune";
	}break;
	case 'NB2': {
		$jeu="Noir 2 Blanc 2";
	}break;
	case 'NB': {
		$jeu="Noir & Blanc";
	}break;
	case 'HGSS': {
		$jeu="HeartGold SoulSilver";
	}break;
	case 'DPP': {
		$jeu="Diamant/Perle/Platine";
	}break;
	case 'RFVF': {
		$jeu="Rouge Feu & Vert Feuille";
	}break;
	case 'RSE': {
		$jeu="Rubis/Saphir/Emeraude";
	}break;
	case 'OAC': {
		$jeu="Or/Argent/Cristal";
	}break;	
}


?>
    <h2>Liste des CT et CS de Pokémon <?php echo $jeu ?> </h2>
    <div class="corps-form">
        <fieldset>	
            <legend>CT & CS</legend>
            <div id="object-list">
                <?php             
                // afficher un tableau des CT/CS
                    // création du tableau
                    echo '<table class="table-responsive table-condensed table-striped table-hover"  style="text-align:center">';
                    // affichage de l'entete du tableau 
                    echo '<tr class="thead-inverse">';
                    // création entete tableau avec noms de colonnes  
                    echo '<th style="text-align:center">Numéro</th>';
					echo '<th style="text-align:center">Nom</th>';
					echo '<th style="text-align:center">Type</th>';
                    echo '<th style="text-align:center">Localisation</th>';
				    echo '</tr>';
                    // affichage des lignes du tableau
                    $n = 0;
                    foreach($lesCT as $uneCT)  {
                        if (($n % 2) == 1) {
                            echo '<tr class="impair">';
                        }
                        else {
                            echo '<tr class="pair">';
                        }
                        // afficher la colonne 1 dans un hyperlien
						$uneAttaque=Attaques::chargerAttaqueParNom(str_to_noaccent($uneCT[1]));
						echo '<td id="'.$uneCT[0].'">'.$uneCT[0].'</td>';
						echo '<td><a href="Attaques/'.$uneAttaque->getNomFR().'">'.$uneCT[1].'</a></td>';
						echo '<td><a href="Types/'.$uneAttaque->getType().'"><img src="./img/types/'.$uneAttaque->getType().'.png" height="15px" width="auto"  /></a>';
						echo '<td>'.$uneCT[2].'</td>';
						echo '</tr>';
                        $n++;
                    }
                    echo '</table>';              
                ?>
            </div>
        </fieldset>
    </div>
</div>