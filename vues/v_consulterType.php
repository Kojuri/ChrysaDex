<?php
/** 
 * Page d'affichage d'une attaque
 * @author Kojuri
 * @package default
*/
require_once ('include/_metier.lib.php');
?>
<style>
#tbStats{
border-collapse: separate;
border-spacing: 5px 8px; }

</style>
<div id="content">
    <h2><?php echo 'Type '.$unType->getType() ?></h2>   	
    <div id="object-list">
        <div class="corps-form">                      
                <table>
                    <tr>
                        <td class="h-entete">
                            Description :
                        </td>
                        <td class="h-valeur" style="width:300px;" >
                            <?php echo $unType->getDescription() ?>
					    </td>
                    </tr>
                    <tr>
                        <td class="h-entete">
                            Faiblesses :
                        </td>
                        <td class="h-valeur">
                            <?php 
							$lesFaiblesses=explode(",",$unType->getFaiblesses());
							foreach($lesFaiblesses as $uneFaiblesse)
							{
								echo '<a href="Types/'.$uneFaiblesse.'"><img src="./img/types/'.$uneFaiblesse.'.png" /></a> ';
							}
							?>
                        </td>
                    </tr>
					<?php if($unType->getResistances()!=null){ ?>
					<tr>
                        <td class="h-entete">
                            Résistances :
                        </td>
                        <td class="h-valeur">
                            <?php 
							$lesResistances=explode(",",$unType->getResistances());
							foreach($lesResistances as $uneResistance)
							{
								echo '<a href="Types/'.$uneResistance.'"><img src="./img/types/'.$uneResistance.'.png" /></a> ';
							}
							?>
                        </td>
                    </tr>
					<?php } ?>
					<?php if($unType->getImmunites()!=null){ ?>
					<tr>
                        <td class="h-entete">
                            Immunité :
                        </td>
                        <td class="h-valeur">
                            <?php 
							$lesImmunites=explode(",",$unType->getImmunites());
							foreach($lesImmunites as $uneImmunite)
							{
								echo '<a href="Types/'.$uneImmunite.'"><img src="./img/types/'.$uneImmunite.'.png" /></a> ';
							}
							?>
                        </td>
                    </tr>
					<?php } ?>
					<?php if($unType->getSuperEfficace()!=null){ ?>
					<tr>
                        <td class="h-entete">
                            Super efficace sur :
                        </td>
                        <td class="h-valeur">
                            <?php 
							$lesSuperEfficaces=explode(",",$unType->getSuperEfficace());
							foreach($lesSuperEfficaces as $unSuperEfficace)
							{
								echo '<a href="Types/'.$unSuperEfficace.'"><img src="./img/types/'.$unSuperEfficace.'.png" /></a> ';
							}
							?>               
						</td>
                    </tr>
					<?php } ?>
					<tr>
                        <td class="h-entete">
                            Pas très efficace sur :
                        </td>
                        <td class="h-valeur">
                            <?php 
							$lesPeuEfficaces=explode(",",$unType->getPeuEfficace());
							foreach($lesPeuEfficaces as $unPeuEfficace)
							{
								echo '<a href="Types/'.$unPeuEfficace.'"><img src="./img/types/'.$unPeuEfficace.'.png" /></a> ';
							}
							?>
                        </td>
                    </tr>
					<?php if($unType->getInefficace()!=null){ ?>
					<tr>
                        <td class="h-entete">
                            Inefficace :
                        </td>
                        <td class="h-valeur">
                            <?php 
							$lesInefficaces=explode(",",$unType->getInefficace());
							foreach($lesInefficaces as $unInefficace)
							{
								echo '<a href="Types/'.$unInefficace.'"><img src="./img/types/'.$unInefficace.'.png" /></a> ';
							}
							?>
                        </td>
                    </tr>
					<?php } ?>
					</table>
					<br/>
					<h3>Moyenne des stats de base des Pokémon <?php echo $unType->getType() ?> </h3>
					<table id="tbStats" class="table-striped">
					<tr>
                        <td class="h-entete">
                            PV :
                        </td>
						<?php 
							$PVPer = ($PV*100)/255;
						?>
						<td width="70%">
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $PV ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: green; width:<?php echo $PVPer."%" ?>">
							<?php echo $PV ?>
						  </div>
						</div>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Attaque :
                        </td>
						<?php 
							$AtqPer = ($Atq*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $Atq ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: red; width:<?php echo $AtqPer."%" ?>">
							<?php echo $Atq ?>
						  </div>
						</div>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Défense :
                        </td>
						<?php 
							$DefPer = ($Def*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $Def ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: grey; width:<?php echo $DefPer."%" ?>">
							<?php echo $Def ?>
						  </div>
						</div>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Attaque Spéciale :
                        </td>
						<?php 
							$AtqSpePer = ($AtqSpe*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $AtqSpe ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: orange; width:<?php echo $AtqSpePer."%" ?>">
							<?php echo $AtqSpe ?>
						  </div>
						</div>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Défense Spéciale :
                        </td>
						<?php 
							$DefSpePer = ($DefSpe*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $DefSpe ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: pink; width:<?php echo $DefSpePer."%" ?>">
							<?php echo $DefSpe ?>
						  </div>
						</div>
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Vitesse :
                        </td>
						<?php 
							$VitPer = ($Vit*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $Vit ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: blue; width:<?php echo $VitPer."%" ?>">
							<?php echo $Vit ?>
						  </div>
						</div>
						</td>
                    </tr>		
					<tr>
                        <td class="h-entete">
                            Moyenne :
                        </td>
						<?php 
							$MoyPer = ($moy*100)/255;
						?>
						<td>
						<div class="progress" style="margin-bottom:0">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $moy ?>"
						  aria-valuemin="0" aria-valuemax="255" style="background: purple; width:<?php echo $MoyPer."%" ?>">
							<?php echo $moy ?>
						  </div>
						</div>
						</td>
                    </tr>	
                </table>
					<br/>
					<h3>Pokémon de type <?php echo $unType->getType(); ?> </h3>
					<table class="table-bordered table-condensed table-striped table-hover table-responsive">
						<tr>
                            <?php 
							$nb=1;
							$num;
							foreach($lesPokemon as $unPokemon)
							{				
								if(($nb-1)%4==0)
								{
									echo'<tr>';
								}
								if(intval($unPokemon[0])<10)
								{
									$num='00'.$unPokemon[0];
								}
								if(intval($unPokemon[0])>=10 and intval($unPokemon[0])<100)
								{
									$num='0'.$unPokemon[0];			
								}
								if(intval($unPokemon[0])>=100)
								{
									$num=$unPokemon[0];
								}
								echo '<td><img src="./img/sprites/'.$num.'.gif" height="auto" width="11px" style="max-height:11px" />&nbsp;<a href="Pokemon/'.$unPokemon[1].'">'.$unPokemon[1].'</a></td>';
								if($nb%4==0)
								{
									echo'</tr>';
								}
								if($nb==count($lesPokemon))
								{
									echo'</tr>';
								}
								$nb+=1;
							}
							?>
					</table>
					<br/>
					<h3>Attaques de type <?php echo $unType->getType(); ?> </h3>
					<table class="table-bordered table-condensed table-striped table-hover table-responsive">
						<tr>
                            <?php 
							$nb=1;
							foreach($lesAttaques as $uneAttaque)
							{				
								if(($nb-1)%4==0)
								{
									echo'<tr>';
								}					
								echo '<td><a href="Attaques/'.$uneAttaque[0].'">'.$uneAttaque[0].'</a></td>';
								if($nb%4==0)
								{
									echo'</tr>';
								}
								if($nb==count($lesAttaques))
								{
									echo'</tr>';
								}
								$nb+=1;
							}
							?>
					</table>
        </div>
    </div>
</div>
