<?php
/** 
 * Page de gestion des Pokémon
 * @author Kojuri
 * @package default
*/

?>
<style>
#tbStats{
border-collapse: separate;
border-spacing: 5px 8px; }

</style>

<div id="content">
    <h2><?php echo'Fiche de '.$unPokemon->getNomFR() ?></h2>    
    <div id="object-list">
        <div class="corps-form">
		<?php /*
		<div id="breadcrumb" style="margin-left:15%">
		◄ <?php echo $prec->getNumero(); ?> &nbsp; <a href="index.php?uc=gererPokemon&action=consulterPokemon&id=<?php echo $prec->getNumero(); ?>">  <?php echo $prec->getNomFR(); ?> </a>&nbsp;		
		<?php echo $unPokemon->getNomFR() ?> &nbsp;
		<a href="index.php?uc=gererPokemon&action=consulterPokemon&id=<?php echo $suiv->getNumero(); ?>"> <?php echo $suiv->getNomFR(); ?></a> &nbsp; <?php echo $suiv->getNumero().' ►'; ?> 
		</div> */ ?>
            <fieldset>
			<style>
.btDelete{
    display: inline-block;
    padding: 8px;
    background: #CA3943;
    color: white;
    text-decoration: none;
    border:1px solid #CA3943;
    border-radius: 3px;
    -webkit-transition: all 0.2s ease;
    -moz-transition: all 0.2s ease;
    transition: all 0.2s ease;
	font-size: 40%;
    vertical-align: middle;
	float:right;
	
}
.btDelete a
{
	color:white;
}
.btDelete a:hover
{
	color: yellow;
	text-decoration:none;
}
.btDelete:hover{
    color: yellow;
	background: red;
}
			</style>
                <legend>Informations générales <?php if(!empty($_SESSION['login'])){?><div class="btDelete"><a href ="#" onclick="ConfirmSuppression(); return false;">Supprimer</a></div><?php } ?></legend>                      
                <script type="text/javascript">
				   function ConfirmSuppression() {
					   if (confirm("Voulez-vous supprimer ce Pokémon ?")) { // Clic sur OK
						   document.location.href ="supprimerPokemon/<?php echo $unPokemon->getNumero() ?>";
					   }
				   }
				</script>
				<table class="table-striped">
                    <tr>
                        <td class="h-entete">
                            Numéro :
                        </td>
                        <td class="h-valeur" style="width:300px;" >
                            <?php echo $unPokemon->getNumero() ?>
					    </td>
					    <td class="h-valeur" rowspan="15" style="width:300px">
						  <?php $num;
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
						echo '<img src="./img/artwork/Sugimori_'.$num.'.png" height="auto" width="auto" style="float:left; max-width:350px; max-height:350px"/>' ; ?>
						</td>
                    </tr>
                    <tr>
                        <td class="h-entete">
                            Nom FR :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getNomFR() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Nom EN :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getNomEN() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Nom JP :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getNomJP() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Type :
                        </td>
                        <td class="h-valeur">
                            <?php echo '<a href="Types/'.$unPokemon->getType1().'"><img src="./img/types/'.$unPokemon->getType1().'.png" /></a>';
						if($unPokemon->getType2()!=null)
						{
							echo '<a href="Types/'.$unPokemon->getType2().'"><img src="./img/types/'.$unPokemon->getType2().'.png" /></a></td>';
						}
							?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Famille :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getFamille() ?>
                        </td>
                    </tr>
					<?php
					if($lesTalentsNaturels != NULL)
					{
						if(count($lesTalentsNaturels)!=1)
						{
							$i=1;
						}
						else
						{
							$i="";
						}
						foreach($lesTalentsNaturels as $naturel)
						{
							echo '<tr>';
							echo '<td class="h-entete">';
							echo 'Talent '.($i).' :';
							echo '</td>';
							echo '<td class="h-valeur">';
							echo $naturel[0];
							echo '</td>';
							echo '</tr>';
							$i++;
						}
					}
					?>
					<?php
					if($lesTalentsCaches!=null)
					{
						if(count($lesTalentsCaches)!=1)
						{
							$i=1;
						}
						else
						{
							$i="";
						}
						foreach($lesTalentsCaches as $cache)
						{
							echo '<tr>';
							echo '<td class="h-entete">';
							echo 'Talent caché '.($i).' :';
							echo '</td>';
							echo '<td class="h-valeur">';
							echo $cache[0];
							echo '</td>';
							echo '</tr>';
							$i++;
						}
					}
					?>
					<tr>
                        <td class="h-entete">
                            Genre :
                        </td>
                        <td class="h-valeur">
                            <?php 
							$M=($unPokemon->getPMale())*100;
							$F=($unPokemon->getPFemelle())*100;
							if($M != 0 or $F != 0)
							{
								echo 'M : '.$M.' % F : '.$F.' %' ; 								
							}
							else
							{
								echo "Assexué";
							} 
							?>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Taux de capture :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getTauxCapture() ?>               
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Bonheur de base :&nbsp;
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getBonheur() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Exp. Max :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getExpMax() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Taille :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getTaille().' m' ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Poids :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getPoids().' kg' ?>
                        </td>
                    </tr>			
					</table>
					<table>
					<tr>
                        <td class="h-entete">
                            Nombre de pas avant éclosion :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getPasEclosion() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Couleur :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getCouleur() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Description :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getDescription() ?>
                        </td>
                    </tr>					
					<tr>
                        <td class="h-entete">
                            Tier :
                        </td>
                        <td class="h-valeur">
                            <?php echo $unPokemon->getTier() ?>
                        </td>
                    </tr>
					</table>
					</fieldset>
					<fieldset>
					<legend>Statistiques de Base</legend>
					<table id="tbStats" class="table-striped">
					<tr>
                        <td class="h-entete">
                            PV :
                        </td>
						<?php 
							$PVPer = (($unPokemon->getPVBase())*100)/255;
						?>
						<td width="70%">
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $unPokemon->getPVBase() ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: green; width:<?php echo $PVPer."%" ?>">
							<?php echo $unPokemon->getPVBase() ?>
						  </div>
						</div>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Attaque :
                        </td>
						<?php 
							$AtqPer = (($unPokemon->getAtqBase())*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $unPokemon->getAtqBase() ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: red; width:<?php echo $AtqPer."%" ?>">
							<?php echo $unPokemon->getAtqBase() ?>
						  </div>
						</div>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Défense :
                        </td>
						<?php 
							$DefPer = (($unPokemon->getDefBase())*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $unPokemon->getDefBase() ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: grey; width:<?php echo $DefPer."%" ?>">
							<?php echo $unPokemon->getDefBase() ?>
						  </div>
						</div>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Attaque Spéciale :
                        </td>
						<?php 
							$AtqSpePer = (($unPokemon->getAtqSpeBase())*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $unPokemon->getAtqSpeBase() ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: orange; width:<?php echo $AtqSpePer."%" ?>">
							<?php echo $unPokemon->getAtqSpeBase() ?>
						  </div>
						</div>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Défense Spéciale :
                        </td>
						<?php 
							$DefSpePer = (($unPokemon->getDefSpeBase())*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $unPokemon->getDefSpeBase() ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: pink; width:<?php echo $DefSpePer."%" ?>">
							<?php echo $unPokemon->getDefSpeBase() ?>
						  </div>
						</div>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Vitesse :
                        </td>
						<?php 
							$VitPer = (($unPokemon->getVitBase())*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $unPokemon->getVitBase() ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: blue; width:<?php echo $VitPer."%" ?>">
							<?php echo $unPokemon->getVitBase() ?>
						  </div>
						</div>
						</td>
                    </tr>					
                </table>
            </fieldset>         
			<fieldset>
					<legend>Attaques apprises par niveau</legend>
					<table class="table-striped">
					<tr>
                        <th style="text-align:left">
                            Attaque
                        </th>
						<?php 
						$videRS=true;
						foreach($lesAttaques as $uneAttaque)
						{
							if($lesAttaques[0][2]!=null)
							{
								$videRS=false;
							}
						}
						if($videRS==false){ ?>
                        <th style="text-align:center">
							RS
						</th>
						<?php } ?>
						<?php 
						$videE=true;
						foreach($lesAttaques as $uneAttaque)
						{
							if($lesAttaques[0][2]!=null)
							{
								$videE=false;
							}
						}
						if($videE==false){ 
						?>
						<th style="text-align:center">
							E
						</th>
						<?php } ?>
						<?php 
						$videRFVF=true;
						foreach($lesAttaques as $uneAttaque)
						{
							if($lesAttaques[0][2]!=null)
							{
								$videRFVF=false;
							}
						}
						if($videRFVF==false){ ?>
                        <th style="text-align:center">
                            RfVf
                        </th>
						<?php } ?>
						<?php 
						$videDP=true;
						foreach($lesAttaques as $uneAttaque)
						{
							if($lesAttaques[0][2]!=null)
							{
								$videDP=false;
							}
						}
						if($videDP==false){ ?>
                        <th style="text-align:center">
                             DP
						</th>
						<?php } ?>
						<?php 
						$videP=true;
						foreach($lesAttaques as $uneAttaque)
						{
							if($lesAttaques[0][2]!=null)
							{
								$videP=false;
							}
						}
						if($videP==false){ ?>
						<th style="text-align:center">	
							P
						</th>
						<?php } ?>
						<?php 
						$videHGSS=true;
						foreach($lesAttaques as $uneAttaque)
						{
							if($lesAttaques[0][2]!=null)
							{
								$videHGSS=false;
							}
						}
						if($videHGSS==false){ ?>
                        <th style="text-align:center">
                            HGSS
                        </th>
						<?php } ?>
						<?php 
						$videNB=true;
						foreach($lesAttaques as $uneAttaque)
						{
							if($lesAttaques[0][2]!=null)
							{
								$videNB=false;
							}
						}
						if($videNB==false){ ?>
                        <th style="text-align:center">
							NB
						</th>
						<?php } ?>
						<?php 
						$videNB2=true;
						foreach($lesAttaques as $uneAttaque)
						{
							if($lesAttaques[0][2]!=null)
							{
								$videNB2=false;
							}
						}
						if($videNB2==false){ ?>
						<th style="text-align:center">
							N2B2
						</th>
						<?php } ?>
                        <th style="text-align:center">
                            XY
                        </th>
                        <th style="text-align:center">
                            ROSA
						</th>
                    </tr>
					<?php
					$n = 0;
					foreach($lesAttaques as $uneAttaque)  {
					if (($n % 2) == 1) {
                            echo '<tr class="impair">';
                        }
                        else {
                            echo '<tr class="pair">';
                        }
                        // afficher la colonne 1 dans un hyperlien
                        echo '<td width="15%"><a href="Attaques/'
                            .$uneAttaque[1].'">'.$uneAttaque[1].'</a></td>';
                        // afficher les colonnes suivantes
						if($videRS==false)
						{
							echo '<td width="7%" style="text-align:center">'.$uneAttaque[2].'</td>';
						}
						if($videE==false)
						{
							echo '<td width="7%" style="text-align:center">'.$uneAttaque[3].'</td>';
						}
						if($videRFVF==false)
						{
							echo '<td width="7%" style="text-align:center">'.$uneAttaque[4].'</td>';
						}
						if($videDP==false)
						{
							echo '<td width="7%" style="text-align:center">'.$uneAttaque[5].'</td>';
						}
						if($videP==false)
						{
							echo '<td width="7%" style="text-align:center">'.$uneAttaque[6].'</td>';
						}
						if($videHGSS==false)
						{
							echo '<td width="7%" style="text-align:center">'.$uneAttaque[7].'</td>';
						}
						if($videNB==false)
						{
							echo '<td width="7%" style="text-align:center">'.$uneAttaque[8].'</td>';
						}
						if($videNB2==false)
						{
							echo '<td width="7%" style="text-align:center">'.$uneAttaque[9].'</td>';
						}
						echo '<td width="7%" style="text-align:center">'.$uneAttaque[10].'</td>';
						echo '<td width="7%" style="text-align:center">'.$uneAttaque[11].'</td>';
						echo '</tr>';
					}					
					?>
                </table>
            </fieldset>       			
        </div>
    </div>
</div>
