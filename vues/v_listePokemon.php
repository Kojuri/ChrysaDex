<?php
/** 
 * 
 * Pokédex
 * © ChrysaDex, 2016
 * 
 * Page de gestion des Pokemon
 * Affiche une liste des Pokemon présents dans la base
 * @author  Kojuri
 * @package default
*/
require_once ('include/_metier.lib.php');
?>
<div class="container">
    <h2>Liste des Pokémon</h2>
	<div class="row">
	<div class="col-md-12">
	<section>
	<h4>Recherche</h4>
	<form action="Pokemon" method="post"> 
	<table>
	<?php 	
		echo'<tr><td>
	<label>
		Couleur :
	</label></td><td>';
		afficherListe($lesCouleurs,"cbxCouleur",0,"-",0,$laCouleur);	
	?>
	</td></tr>
	<?php 
		echo'<tr><td>
	<label>
		Type 1 :
	</label></td><td>';
		afficherListe($lesTypes,"cbxTypes1",0,"-",0,$type1);	
	?>
	</td></tr>
	<?php 
		echo'<tr><td>
	<label>
		Type 2 :
	</label></td><td>';
		afficherListe($lesTypes,"cbxTypes2",0,"-",0,$type2);	
	?>
	</td></tr>
	<tr><td>
	<label>Rechercher : </label>
	</td><td>
	<?php
		if($recherche !="*")
		{
			echo'<input type = "text" name="txtRecherche" value="'.$recherche.'" />';
		}
		else
		{
			echo '<input type = "text" name="txtRecherche" />';
		}
	?>
	</td></tr>
	<tr><td>
	<label>Tri : </label></td>
	<td>
	<select name ="tri">
	<?php
	if($tri==0)
	{
		echo '<option value ="0" selected="selected">Numéro croissant</option>';
	}
	else
	{
		echo '<option value ="0">Numéro croissant</option>';
	}
	if($tri==1)
	{
		echo '<option value ="1" selected="selected">Numéro décroissant</option>';
	}
	else
	{
		echo '<option value ="1">Numéro décroissant</option>';
	}
	if($tri==2)
	{
		echo '<option value ="2" selected="selected">Nom de A à Z</option>';
	}
	else
	{
		echo '<option value ="2">Nom de A à Z</option>';
	}
	if($tri==3)
	{
		echo '<option value ="3" selected="selected">Nom de Z à A</option>';
	}
	else
	{
		echo '<option value ="3">Nom de Z à A</option>';
	}
	echo '<option value ="0">----------</option>';
	if($tri==10)
	{
		echo '<option value ="10" selected="selected">Statistiques</option>';
	}	
	else
	{
		echo '<option value ="10">Statistiques</option>';
	}
	if($tri==4)
	{
		echo '<option value ="4" selected="selected">PV</option>';
	}
	else
	{
		echo '<option value ="4">PV</option>';
	}
	if($tri==5)
	{
		echo '<option value ="5" selected="selected">Attaque</option>';
	}
	else
	{
		echo '<option value ="5">Attaque</option>';
	}
	if($tri==6)
	{
		echo '<option value ="6" selected="selected">Défense</option>';
	}
	else
	{
		echo '<option value ="6">Défense</option>';
	}
	if($tri==7)
	{
		echo '<option value ="7" selected="selected">Attaque Spéciale</option>';
	}
	else
	{
		echo '<option value ="7">Attaque Spéciale</option>';
	}
	if($tri==8)
	{
		echo '<option value ="8" selected="selected">Défense Spéciale</option>';
	}
	else
	{
		echo '<option value ="8">Défense Spéciale</option>';
	}
	if($tri==9)
	{
		echo '<option value ="9" selected="selected">Vitesse</option>';
	}
	else
	{
		echo '<option value ="9">Vitesse</option>';
	}
	?>
	</select>
	</table>
	</td></tr>
	<input type="submit" value="OK" style="width:30px">
	<input TYPE="submit" name="submitreset" value="Réinitialiser" style="width:75px">
	</form>
	</div>
	<div class="col-md-12" style="margin-top:20px">
        <fieldset>	
            <legend>Pokémon</legend>
            <div id="object-list">
                <?php
                if($nbPokemon<=1)
				{
					echo '<span>'.$nbPokemon.' Pokémon trouvé'
                        . '</span>';
				}
				else
				{
					echo '<span>'.$nbPokemon.' Pokémon trouvés'
                        . '</span>';
				}
				if(!empty($_SESSION['login']))
				{
					echo "<a href = './ajouterPokemon' style = 'margin-left:20%'>Ajouter un Pokémon</a>";
				}
                // afficher un tableau des Pokemon
                if ($nbPokemon > 0) {
                    // création du tableau
                    echo '<br/><br/><table class="table-responsive table-condensed table-striped table-hover"  style="text-align:center">';
                    // affichage de l'entete du tableau 
                    echo '<tr class="thead-inverse">';
                    // création entete tableau avec noms de colonnes  
                    echo '<th style="text-align:center">Numéro</th>';
					echo '<th style="text-align:center">Sprite</th>';
					if($tri!=2 and $tri!=3)
					{
						if($recherche =="*")
						{
							echo '<th style="text-align:center">Nom</th>';
						}
					}
					if($tri==2 or $tri==3 or $recherche !="*")
					{
							echo '<th style="text-align:center">Nom français</th>';
							echo '<th style="text-align:center">Nom anglais</th>';
							echo '<th style="text-align:center">Nom japonais</th>';
					}
				    echo '<th style="text-align:center">Type</th>';
					if($tri==4)
					{
						echo '<th style="text-align:center">PV de Base</th>';
					}
					if($tri==5)
					{
						echo '<th style="text-align:center">Attaque de Base</th>';
					}
					if($tri==6)
					{
						echo '<th style="text-align:center">Défense de Base</th>';
					}
					if($tri==7)
					{
						echo '<th style="text-align:center">Attaque Spéciale de Base</th>';
					}
					if($tri==8)
					{
						echo '<th style="text-align:center">Défense Spéciale de Base</th>';
					}
					if($tri==9)
					{
						echo '<th style="text-align:center">Vitesse de Base</th>';
					}
					if($tri==10)
					{
						echo '<th style="text-align:center">Moyenne des stats</th>';
					}
				    echo '</tr>';
                    // affichage des lignes du tableau
                    $n = 0;                   
					foreach($lesPokemon as $unPokemon)  {
						if (($n % 2) == 1) {
                            echo '<tr class="impair">';
                        }
                        else {
                            echo '<tr class="pair">';
                        }
                        // afficher la colonne 1 dans un hyperlien
                        echo '<td><a href="/Pokemon/'
                            .$unPokemon->getNomFR().'">'.$unPokemon->getNumero().'</a></td>';
                        // afficher les colonnes suivantes
						$num;
						if($unPokemon->getNumero()<10)
						{
							$num='00'.$unPokemon->getNumero();
						}
						if($unPokemon->getNumero()>=10 and $unPokemon->getNumero()<100)
						{
							$num='0'.$unPokemon->getNumero();			
						}
						if($unPokemon->getNumero()>=100)
						{
							$num=$unPokemon->getNumero();
						}
                        echo '<td><img src="./img/sprites/'.$num.'.gif" height="50%" width="auto"  /></td>';
						echo '<td><a href="Pokemon/'
							.$unPokemon->getNomFR().'">'.$unPokemon->getNomFR().'</a></td>';
						if($tri==2 or $tri==3 or $recherche!="*")
						{
								echo '<td>'.$unPokemon->getNomEN().'</td>';
								echo '<td>'.$unPokemon->getNomJP().'</td>';
						}
						echo '<td><a href="./Types/'.$unPokemon->getType1().'"><img src="./img/types/'.$unPokemon->getType1().'.png" height="15px" width="auto"  /></a>';
						if($unPokemon->getType2()!=null)
						{
							echo '<a href="./Types/'.$unPokemon->getType2().'"><img src="./img/types/'.$unPokemon->getType2().'.png" height="15px" width="auto"  /></a></td>';
						}
						if($tri==4)
						{
							echo '<td>'.$unPokemon->getPVBase().'</td>';
						}
						if($tri==5)
						{
							echo '<td>'.$unPokemon->getAtqBase().'</td>';
						}
						if($tri==6)
						{
							echo '<td>'.$unPokemon->getDefBase().'</td>';
						}
						if($tri==7)
						{
							echo '<td>'.$unPokemon->getAtqSpeBase().'</td>';
						}
						if($tri==8)
						{
							echo '<td>'.$unPokemon->getDefSpeBase().'</td>';
						}
						if($tri==9)
						{
							echo '<td>'.$unPokemon->getVitBase().'</td>';
						}
						if($tri==10)
						{
							echo '<td>'.$unPokemon->getMoyStat().'</td>';
						}
						echo '</tr>';
                        $n++;
                    }
                    echo '</table>';
                }
                else {			
                    echo "Aucun Pokémon trouvé !";
                }		
                ?>
            </div>
        </fieldset>
		</div>
		</section>
    </div>
</div>