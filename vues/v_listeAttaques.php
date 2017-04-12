<?php
/** 
 * 
 * Pokédex
 * © Chrysadex, 2016
 * 
 * Page de gestion des Attaques
 * Affiche une liste des Attaques présentes dans la base
 * @author  Iruni
 * @package default
*/
require_once ('include/_metier.lib.php');
?>
<div id="content">
    <h2>Liste des Attaques</h2>
	
    <div class="corps-form">
        <fieldset>	
            <legend>Attaques</legend>
            <div id="object-list">
                <?php
                if($nbAttaques<=1)
				{
					echo '<span>'.$nbAttaques.' attaque trouvée'
                        . '</span><br /><br />';
				}
				else
				{
					echo '<span>'.$nbAttaques.' attaques trouvées'
                        . '</span><br /><br />';
				}
                // afficher un tableau des Attaques
                if ($nbAttaques > 0) {
                    // création du tableau
                    echo '<table class="table-responsive table-condensed table-striped table-hover style="text-align:center">';
                    // affichage de l'entete du tableau 
                    echo '<tr class="thead-inverse">';
                    // création entete tableau avec noms de colonnes  
                    echo '<th style="text-align:center">Nom français</th>';
					echo '<th style="text-align:center">Nom anglais</th>';
                    echo '<th style="text-align:center">Type</th>';
				    echo '<th style="text-align:center">Description</th>';
					echo '<th style="text-align:center">PP</th>';
					echo '<th style="text-align:center">Puis.</th>';
					echo '<th style="text-align:center">Préc.</th>';
					echo '<th style="text-align:center">Catégorie</th>';
				    echo '</tr>';
                    // affichage des lignes du tableau
                    $n = 0;
                    foreach($lesAttaques as $uneAttaque)  {
                        if (($n % 2) == 1) {
                            echo '<tr class="impair">';
                        }
                        else {
                            echo '<tr class="pair">';
                        }
                        // afficher la colonne 1 dans un hyperlien
                        echo '<td><a href="Attaques/'
                            .$uneAttaque->getNomFR().'">'.$uneAttaque->getNomFR().'</a></td>';
                        // afficher les colonnes suivantes
                        echo '<td>'.$uneAttaque->getNomEN().'</td>';
						echo '<td><a href="Types/'.$uneAttaque->getType().'"><img src="./img/types/'.$uneAttaque->getType().'.png" height="15px" width="auto"  /></a>';
						echo '<td>'.$uneAttaque->getDescription().'</td>';
						echo '<td>'.$uneAttaque->getPP().'</td>';
						echo '<td>'.$uneAttaque->getPuissance().'</td>';
						echo '<td>'.$uneAttaque->getPrecision().'</td>';
						echo '<td><img src="./img/'.$uneAttaque->getCategorie().'.gif" /></td>';
						echo '</tr>';
                        $n++;
                    }
                    echo '</table>';
                }
                else {			
                    echo "Aucune attaque trouvée !";
                }		
                ?>
            </div>
        </fieldset>
    </div>
</div>