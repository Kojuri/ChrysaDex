<?php
/** 
 * Page permettant l'ajout d'un Pokémon
 * @author 
 * @package default
*/

require_once ('include/_metier.lib.php');
?>
<div id="content">    
    <h2>Gestion des Pokémon</h2>
    <?php AdminRender::showNotifications(); ?>
    <div id="object-list">
        <form action="index.php?uc=gererPokemon&action=modifierPokemon&option=validerPokemon" method="post">
            <div class="corps-form">
                <fieldset>
                    <legend>Modifier un Pokémon</legend>
                    <table class="table-responsive table-condensed" >
                        <tr>
                            <td>
                                <label for="numNumero">
                                    Numéro :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="numNumero" 
                                    name="numNumero"
                                    size="3" maxlength="3" disabled="disabled"
                                    <?php
                                        if (!empty($strNumero)) {
                                            echo ' value="'.$strNumero.'"';
                                        }
                                    ?>
									required
                                />
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <label for="txtNomFR">
                                    Nom français :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtNomFR" 
                                    name="txtNomFR"
                                    size="20" maxlength="20"
                                    <?php
                                        if (!empty($strNomFR)) {
                                            echo ' value="'.$strNomFR.'"';
                                        }
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="txtNomEN">
                                    Nom anglais :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtNomEN" 
                                    name="txtNomEN"
                                    size="20" maxlength="20"
                                    <?php
                                        if (!empty($strNomEN)) {
                                            echo ' value="'.$strNomEN.'"';
                                        }
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="txtNomJP">
                                    Nom japonais :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtNomJP" 
                                    name="txtNomJP"
                                    size="20" maxlength="20"
                                    <?php
                                        if (!empty($strNomJP)) {
                                            echo ' value="'.$strNomJP.'"';
                                        }
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<?php 
						echo'<tr><td>
						<label>
							Type 1 :
						</label></td><td>';
							afficherListe($lesTypes,"cbxType1",0,"none",0,$strType1);	
						?>
						</td></tr>
						<?php 
							echo'<tr><td>
						<label>
							Type 2 :
						</label></td><td>';
							afficherListe($lesTypes,"cbxType2",0,"",0,$strType2);	
						?>
						</td></tr>
						<tr>
                            <td valign="top">
                                <label for="txtFamille">
                                    Famille :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="text" id="txtFamille" 
                                    name="txtFamille"
                                    size="20" maxlength="20"
                                    <?php
                                        if (!empty($strFamille)) {
                                            echo ' value="'.$strFamille.'"';
                                        }
                                    ?>
                                />
                            </td>
							<tr>
                            <td valign="top">
                                <label for="numPMale">
                                    Pourcentage de mâle :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numPMale" 
                                    name="numPMale"
                                    step="0.01" min="0" max="1"
                                    <?php
                                        if (!empty($strPMale)) {
                                            echo ' value="'.$strPMale.'"';
                                        }
                                    ?>
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numPFemelle">
                                    Pourcentage de femelle :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numPFemelle" 
                                    name="numPFemelle"
                                    step="0.01" min="0" max="1"
                                    <?php
                                        if (!empty($strPFemelle)) {
                                            echo ' value="'.$strPFemelle.'"';
                                        }
                                    ?>
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numTauxCapture">
                                    Taux de capture :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numTauxCapture" 
                                    name="numTauxCapture"
                                    step="1" min="0" max="255"
                                    <?php
                                        if (!empty($strTauxCapture)) {
                                            echo ' value="'.$strTauxCapture.'"';
                                        }
                                    ?>
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numBonheur">
                                    Bonheur de base :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numBonheur" 
                                    name="numBonheur"
                                    step="1" min="0" max="255"
                                    <?php
                                        if (!empty($strBonheur)) {
                                            echo ' value="'.$strBonheur.'"';
                                        }
                                    ?>
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numExpMax">
                                    Expérience maximum :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numExpMax" 
                                    name="numExpMax"
                                    step="1" min="0" max="2000000"
                                    <?php
                                        if (!empty($strExpMax)) {
                                            echo ' value="'.$strExpMax.'"';
                                        }
                                    ?>
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numPasEclosion">
                                    Nombre de pas avant éclosion :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numPasEclosion" 
                                    name="numPasEclosion"
                                    step="1" min="0" max="100000"
                                    <?php
                                        if (!empty($strPasEclosion)) {
                                            echo ' value="'.$strPasEclosion.'"';
                                        }
                                    ?>
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numTaille">
                                    Taille (en mètres) :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numTaille" 
                                    name="numTaille"
                                    step="0.1" min="0" max="100"
                                    <?php
                                        if (!empty($strTaille)) {
                                            echo ' value="'.$strTaille.'"';
                                        }
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numPoids">
                                    Poids (en kg) :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numPoids" 
                                    name="numPoids"
                                    step="0.1" min="0" max="2000"
                                    <?php
                                        if (!empty($strPoids)) {
                                            echo ' value="'.$strPoids.'"';
                                        }
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numPVBase">
                                    PV de base :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numPVBase" 
                                    name="numPVBase"
                                    step="1" min="0" max="255"
                                    <?php
										echo ' value="'.$strPVBase.'"';
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numAtqBase">
                                    Attaque de base :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numAtqBase" 
                                    name="numAtqBase"
                                    step="1" min="0" max="255"
                                    <?php
										echo ' value="'.$strAtqBase.'"';
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numDefBase">
                                    Défense de base :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numDefBase" 
                                    name="numDefBase"
                                    step="1" min="0" max="255"
                                    <?php
										echo ' value="'.$strDefBase.'"';
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numAtqSpeBase">
                                    Attaque spéciale de base :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numAtqSpeBase" 
                                    name="numAtqSpeBase"
                                    step="1" min="0" max="255"
                                    <?php
										echo ' value="'.$strAtqSpeBase.'"';
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numDefSpeBase">
                                    Défense spéciale de base :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numDefSpeBase" 
                                    name="numDefSpeBase"
                                    step="1" min="0" max="255"
                                    <?php
										echo ' value="'.$strDefSpeBase.'"';
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="numVitBase">
                                    Vitesse de base :
                                </label>
                            </td>
                            <td>
                                <input 
                                    type="number" id="numVitBase" 
                                    name="numVitBase"
                                    step="1" min="0" max="255"
                                    <?php
										echo ' value="'.$strVitBase.'"';
                                    ?>
									required
                                />
                            </td>
                        </tr>
						<tr>
                            <td valign="top">
                                <label for="txtDescription">
                                    Description :
                                </label>
                            </td>
                            <td>
                                <textarea
                                    id="txtDescription" 
                                    name="txtDescription"
									required
								><?php
                                        if (!empty($strDescription)) {
                                            echo $strDescription;
                                        }
                                    ?></textarea>
                            </td>
							<tr>
							<?php 	
								echo'<tr><td>
							<label>
								Couleur :
							</label></td><td>';
								afficherListe($lesCouleurs,"cbxCouleur",0,"none",0,$strCouleur);	
							?>
							</td></tr>
							<tr>
							<?php 	
								echo'<tr><td>
							<label>
								Tier :
							</label></td><td>';
								afficherListe($lesTiers,"cbxTier",0,"none",0,$strTier);	
								//var_dump($lesTiers);
							?>
							</td></tr>
                    </table>
                </fieldset>
            </div>
            <div class="pied-form">
                <p>
                    <input id="cmdValider" name="cmdValider" 
                           type="submit"
                           value="Modifier"
                    />
                </p> 
            </div>
        </form>
    </div>
</div>          
