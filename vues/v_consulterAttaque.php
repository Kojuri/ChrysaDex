<?php
/** 
 * Page d'affichage d'une attaque
 * @author Kojuri
 * @package default
*/
?>

<div id="content">
    <h2><?php echo $uneAttaque->getNomFR() ?></h2>    
    <div id="object-list">
        <div class="corps-form">
				<div id="breadcrumb" style="margin-left:15%">
			◄ &nbsp; <a href="Attaques/<?php echo $prec->getNomFR(); ?>">  <?php echo $prec->getNomFR(); ?> </a>&nbsp;		
		<?php echo $uneAttaque->getNomFR() ?> &nbsp;
		<a href="Attaques/<?php echo $suiv->getNomFR(); ?>"> <?php echo $suiv->getNomFR(); ?></a> &nbsp;  ► 
		</div>
            <fieldset>
                <legend>Attaque</legend>                        
                <table class="table-striped">
                    <tr>
                        <td class="h-entete" width="25%">
                            Nom français :&nbsp;
                        </td>
                        <td class="h-valeur">
                            <?php echo $uneAttaque->getNomFR() ?>
					    </td>
                    </tr>
                    <tr>
                        <td class="h-entete">
                            Nom anglais :
                        </td>
                        <td class="h-valeur">
                            <?php echo $uneAttaque->getNomEN() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Type :
                        </td>
                        <td class="h-valeur">
                            <?php echo '<a href="Types/'.$uneAttaque->getType().'"><img src="./img/types/'.$uneAttaque->getType().'.png"  /></a>';
							?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Description :
                        </td>
                        <td class="h-valeur">
                            <?php echo $uneAttaque->getDescription() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            PP :
                        </td>
                        <td class="h-valeur">
                            <?php echo $uneAttaque->getPP() ?>               
						</td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Puissance :
                        </td>
                        <td class="h-valeur">
                            <?php echo $uneAttaque->getPuissance() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Précision :
                        </td>
                        <td class="h-valeur">
                            <?php echo $uneAttaque->getPrecision() ?>
                        </td>
                    </tr>
					<tr>
                        <td class="h-entete">
                            Catégorie :
                        </td>
                        <td class="h-valeur">
                            <?php echo $uneAttaque->getCategorie() ?>
                        </td>
                    </tr>
					<?php if(($uneAttaque->getCTRSE())!="-"){ ?>
					<tr>
                        <td class="h-entete">
                            CT RSE :
                        </td>
                        <td class="h-valeur">
                            <?php echo '<a href="CT-CS/RSE#'.$uneAttaque->getCTRSE().'">'.$uneAttaque->getCTRSE().'</a>' ?>
                        </td>
                    </tr>
					<?php } ?>
					<?php if(($uneAttaque->getCTDPP())!="-"){ ?>
					<tr>
                        <td class="h-entete">
                            CT DPP :
                        </td>
                        <td class="h-valeur">
                            <?php echo '<a href="CT-CS/DPP#'.$uneAttaque->getCTDPP().'">'.$uneAttaque->getCTDPP().'</a>' ?>
                        </td>
                    </tr>
					<?php } ?>
					<?php if(($uneAttaque->getCTHGSS())!="-"){ ?>
					<tr>
                        <td class="h-entete">
                            CT HGSS :
                        </td>
                        <td class="h-valeur">
							<?php echo '<a href="CT-CS/HGSS#'.$uneAttaque->getCTHGSS().'">'.$uneAttaque->getCTHGSS().'</a>' ?>                        </td>
                    </tr>
					<?php } ?>
					<?php if(($uneAttaque->getCTNB())!="-"){ ?>
					<tr>
                        <td class="h-entete">
                            CT NB :
                        </td>
                        <td class="h-valeur">
                            <?php echo '<a href="CT-CS/NB#'.$uneAttaque->getCTNB().'">'.$uneAttaque->getCTNB().'</a>' ?>
                        </td>
                    </tr>	
					<?php } ?>
					<?php if(($uneAttaque->getCTNB2())!="-"){ ?>					
					<tr>
                        <td class="h-entete">
                            CT N2B2 :
                        </td>
                        <td class="h-valeur">
                            <?php echo '<a href="CT-CS/NB2#'.$uneAttaque->getCTNB2().'">'.$uneAttaque->getCTNB2().'</a>' ?>
                        </td>
                    </tr>
					<?php } ?>
					<?php if(($uneAttaque->getCTXY())!="-"){ ?>
					<tr>
                        <td class="h-entete">
                            CT XY :
                        </td>
                        <td class="h-valeur">
                            <?php echo '<a href="CT-CS/XY#'.$uneAttaque->getCTXY().'">'.$uneAttaque->getCTXY().'</a>' ?>
                        </td>
                    </tr>
					<?php } ?>
					<?php if(($uneAttaque->getCTROSA())!="-"){ ?>
					<tr>
                        <td class="h-entete">
                            CT ROSA :
                        </td>
                        <td class="h-valeur">
                            <?php echo '<a href="CT-CS/ROSA#'.$uneAttaque->getCTROSA().'">'.$uneAttaque->getCTROSA().'</a>' ?>
                        </td>
                    </tr>
					<?php } ?>
					</table>
					</fieldset>						
        </div>
    </div>
</div>
