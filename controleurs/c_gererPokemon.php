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
if (isset($_REQUEST["nom"])) {
    $id = $_REQUEST["nom"];
	if(!empty(Pokemons::chargerPokemonParID($id)))
	{
		$unPokemon = Pokemons::chargerPokemonParID($id);
	}
	elseif(!empty(Pokemons::chargerPokemonParNom($id)))
	{
		$unPokemon = Pokemons::chargerPokemonParNom($id);
	}
}
// charger la vue en fonction du choix de l'utilisateur
switch ($action) {
    case 'consulterPokemon' : {
        /*if (Pokemons::PokemonExiste($id) == 0) 
		{
			Application::addNotification(new Notification("Ce Pokémon n'existe pas !", ERROR));
			echo "Ce Pokémon n'existe pas !";
			echo $id;			
		}
        else {*/
           /* if(($unPokemon->getNumero())==1)
			{
				$prec=Pokemons::chargerPokemonParID($nbPokemon);
			}
			else
			{
				$prec=Pokemons::chargerPokemonParID(($unPokemon->getNumero())-1);
			}
			if(($unPokemon->getNumero())==$nbPokemon)
			{
				$suiv=Pokemons::chargerPokemonParID(1);
			}
			else
			{
				$suiv=Pokemons::chargerPokemonParID(($unPokemon->getNumero())+1);
			}*/
			$lesAttaques=Pokemons::chargerLesAttaquesDuPokemon($unPokemon->getNumero());
			$lesTalentsNaturels=Pokemons::chargerLesTalentsNaturelsDuPokemon($unPokemon->getNomFR());
			$lesTalentsCaches=Pokemons::chargerLesTalentsCachesDuPokemon($unPokemon->getNomFR());
			include 'vues/v_consulterPokemon.php';
      //  }
    } break;  
	case 'ajouterPokemon' : {
		 if(!isset($_SESSION['login']))
		 {
			 echo "<script>document.location.href='./Pokemon';</script>";
		 }
		 else
		 {
			 // initialisation des variables
			 $hasErrors = false;
			 $strNumero = '';
			 $strNomFR = '';
			 $strNomEN = '';
			 $strNomJP = '';
			 $strType1 = '';
			 $strType2 = '';
			 $strFamille = '';
			 $strPMale = 0.5;
			 $strPFemelle = 0.5;
			 $strTauxCapture = 120;
			 $strBonheur = 70;
			 $strExpMax = 1000000;
			 $strPasEclosion = 5120;
			 $strTaille = 1;
			 $strPoids = 5;
			 $strPVBase = 0;
			 $strAtqBase = 0;
			 $strDefBase = 0;
			 $strAtqSpeBase = 0;
			 $strDefSpeBase = 0;
			 $strVitBase = 0;
			 $strDescription = '';
			 $strCouleur = 'Blanc';
			 $strTier = 'NU';
			 $lesTypes = Pokemons::chargerLesTypes(0);
			 $lesCouleurs = Pokemons::chargerLesCouleurs(0);
			 $lesTiers = Pokemons::chargerLesTiers(0);
			// traitement de l'option : saisie ou validation ?
			if (isset($_GET["option"])) {
				$option = htmlentities($_GET["option"]);
			}
			else {
				$option = 'saisirPokemon';
			}
			switch($option) {            
				case 'saisirPokemon' : {
					include 'vues/v_ajouterPokemon.php';
				} break;
				case 'validerPokemon' : {
					// tests de gestion du formulaire
					if (isset($_POST["cmdValider"])) {
						// test zones obligatoires
						if (!empty($_POST["numNumero"]) and !empty($_POST["txtNomFR"])) {
							// les zones obligatoires sont présentes
							$strNumero = ucfirst(htmlentities(
									$_POST["numNumero"])
							);
							$strNomFR = ucfirst(htmlentities(
									$_POST["txtNomFR"])
							);
							$strNomEN = htmlentities(
									$_POST["txtNomEN"]
							);
							
							$strNomJP = htmlentities(
									$_POST["txtNomJP"]
							);
							$strType1 = htmlentities(
									$_POST["cbxType1"]
							);
							$strType2 = htmlentities(
									$_POST["cbxType2"]
							);
							$strFamille = htmlentities(
									$_POST["txtFamille"]
							);
							$strPMale = htmlentities(
									$_POST["numPMale"]
							);
							$strPFemelle = htmlentities(
									$_POST["numPFemelle"]
							);
							$strTauxCapture = htmlentities(
									$_POST["numTauxCapture"]
							);
							$strBonheur = htmlentities(
									$_POST["numBonheur"]
							);
							$strExpMax = htmlentities(
									$_POST["numExpMax"]
							);
							$strPasEclosion = htmlentities(
									$_POST["numPasEclosion"]
							);
							$strTaille = htmlentities(
									$_POST["numTaille"]
							);
							$strPoids = htmlentities(
									$_POST["numPoids"]
							);
							$strDescription = htmlentities(
									$_POST["txtDescription"]
							);
							$strPVBase = htmlentities(
									$_POST["numPVBase"]
							);
							$strAtqBase = htmlentities(
									$_POST["numAtqBase"]
							);
							$strDefBase = htmlentities(
									$_POST["numDefBase"]
							);
							$strAtqSpeBase = htmlentities(
									$_POST["numAtqSpeBase"]
							);
							$strDefSpeBase = htmlentities(
									$_POST["numDefSpeBase"]
							);
							$strVitBase = htmlentities(
									$_POST["numVitBase"]
							);
							$strMoyStat = ($strPVBase + $strAtqBase + $strDefBase + $strAtqSpeBase + $strDefSpeBase + $strVitBase)/6;
							$strCouleur = htmlentities(
									$_POST["cbxCouleur"]
							);
							$strTier = htmlentities(
									$_POST["cbxTier"]
							);
							
							// tests de cohérence 
							// contrôle d'existence d'un Pokémon avec le même numéro
							if (Pokemons::PokemonExiste($strNumero)) {
								// signaler l'erreur
								Application::addNotification(new Notification("Il existe déjà un Pokémon avec ce numéro !", ERROR));
								$hasErrors = true;
							}
						}
						else {
							// une ou plusieurs valeurs n'ont pas été saisies
							if (empty($strNumero)) {                                
								Application::addNotification(new Notification("Le numéro doit être renseigné !", ERROR));
							}
							if (empty($strNomFR)) {
								Application::addNotification(new Notification("Le nom français doit être renseigné !", ERROR));
							}
							$hasErrors = true;
						}
						if (!$hasErrors) {
							// ajout dans la base de données
							$unPokemon = Pokemons::ajouterPokemon(array($strNumero,$strNomFR, $strNomEN, $strNomJP, $strType1, $strType2, $strFamille, $strPMale, $strPFemelle, $strTauxCapture, $strBonheur, $strExpMax, $strPasEclosion, $strTaille, $strPoids, $strPVBase, $strAtqBase, $strDefBase, $strAtqSpeBase, $strDefSpeBase, $strVitBase, $strDescription, $strCouleur, $strTier, $strMoyStat));
							//Application::addNotification(new Notification("Le Pokémon a été ajouté !", SUCCESS));
							echo "<script>
							document.location.href='./Pokemon/".$unPokemon->getNomFR()."';
							</script>";
						}
						else {
							include 'vues/v_ajouterPokemon.php';
						}
					}
				} break;
			} 
		 }
    } break;  
	case 'modifierPokemon' : {
		 if(!isset($_SESSION['login']) or empty($unPokemon))
		 {
			 echo "<script>document.location.href='./Pokemon';</script>";
		 }
		 else
		 {
			 // initialisation des variables
			 $hasErrors = false;
			 $strNumero = $unPokemon->getNumero();
			 $strNomFR = $unPokemon->getNomFR();
			 $strNomEN = $unPokemon->getNomEN();
			 $strNomJP = $unPokemon->getNomJP();
			 $strType1 = $unPokemon->getType1();
			 $strType2 = $unPokemon->getType2();;
			 $strFamille = $unPokemon->getFamille();
			 $strPMale = $unPokemon->getPMale();
			 $strPFemelle = $unPokemon->getPFemelle();
			 $strTauxCapture = $unPokemon->getTauxCapture();
			 $strBonheur = $unPokemon->getBonheur();
			 $strExpMax = $unPokemon->getExpMax();
			 $strPasEclosion = $unPokemon->getPasEclosion();
			 $strTaille = $unPokemon->getTaille();
			 $strPoids = $unPokemon->getPoids();
			 $strPVBase = $unPokemon->getPVBase();
			 $strAtqBase = $unPokemon->getAtqBase();
			 $strDefBase = $unPokemon->getDefBase();
			 $strAtqSpeBase = $unPokemon->getAtqSpeBase();
			 $strDefSpeBase = $unPokemon->getDefSpeBase();
			 $strVitBase = $unPokemon->getVitBase();
			 $strDescription = $unPokemon->getDescription();
			 $strCouleur = $unPokemon->getCouleur();
			 $strTier = $unPokemon->getTier();
			 $lesTypes = Pokemons::chargerLesTypes(0);
			 $lesCouleurs = Pokemons::chargerLesCouleurs(0);
			 $lesTiers = Pokemons::chargerLesTiers(0);
			// traitement de l'option : saisie ou validation ?
			if (isset($_GET["option"])) {
				$option = htmlentities($_GET["option"]);
			}
			else {
				$option = 'saisirPokemon';
			}
			switch($option) {            
				case 'saisirPokemon' : {
					include 'vues/v_modifierPokemon.php';
				} break;
				case 'validerPokemon' : {
					// tests de gestion du formulaire
					if (isset($_POST["cmdValider"])) {
						// test zones obligatoires
						if (!empty($_POST["txtNomFR"])) {
							// les zones obligatoires sont présentes
							$strNomFR = ucfirst(htmlentities(
									$_POST["txtNomFR"])
							);
							$strNomEN = htmlentities(
									$_POST["txtNomEN"]
							);
							
							$strNomJP = htmlentities(
									$_POST["txtNomJP"]
							);
							$strType1 = htmlentities(
									$_POST["cbxType1"]
							);
							$strType2 = htmlentities(
									$_POST["cbxType2"]
							);
							$strFamille = htmlentities(
									$_POST["txtFamille"]
							);
							$strPMale = htmlentities(
									$_POST["numPMale"]
							);
							$strPFemelle = htmlentities(
									$_POST["numPFemelle"]
							);
							$strTauxCapture = htmlentities(
									$_POST["numTauxCapture"]
							);
							$strBonheur = htmlentities(
									$_POST["numBonheur"]
							);
							$strExpMax = htmlentities(
									$_POST["numExpMax"]
							);
							$strPasEclosion = htmlentities(
									$_POST["numPasEclosion"]
							);
							$strTaille = htmlentities(
									$_POST["numTaille"]
							);
							$strPoids = htmlentities(
									$_POST["numPoids"]
							);
							$strDescription = htmlentities(
									$_POST["txtDescription"]
							);
							$strPVBase = htmlentities(
									$_POST["numPVBase"]
							);
							$strAtqBase = htmlentities(
									$_POST["numAtqBase"]
							);
							$strDefBase = htmlentities(
									$_POST["numDefBase"]
							);
							$strAtqSpeBase = htmlentities(
									$_POST["numAtqSpeBase"]
							);
							$strDefSpeBase = htmlentities(
									$_POST["numDefSpeBase"]
							);
							$strVitBase = htmlentities(
									$_POST["numVitBase"]
							);
							$strMoyStat = ($strPVBase + $strAtqBase + $strDefBase + $strAtqSpeBase + $strDefSpeBase + $strVitBase)/6;
							$strCouleur = htmlentities(
									$_POST["cbxCouleur"]
							);
							$strTier = htmlentities(
									$_POST["cbxTier"]
							);
						}
						else {
							// une ou plusieurs valeurs n'ont pas été saisies
							if (empty($strNomFR)) {
								Application::addNotification(new Notification("Le nom français doit être renseigné !", ERROR));
							}
							$hasErrors = true;
						}
						if (!$hasErrors) {
							// ajout dans la base de données
							$unPokemon = Pokemons::modifierPokemon(array($strNumero,$strNomFR, $strNomEN, $strNomJP, $strType1, $strType2, $strFamille, $strPMale, $strPFemelle, $strTauxCapture, $strBonheur, $strExpMax, $strPasEclosion, $strTaille, $strPoids, $strPVBase, $strAtqBase, $strDefBase, $strAtqSpeBase, $strDefSpeBase, $strVitBase, $strDescription, $strCouleur, $strTier, $strMoyStat));
							echo "<script>
							document.location.href='./Pokemon/".$unPokemon->getNomFR()."';
							</script>";
						}
						else {
							include 'vues/v_modifierPokemon.php';
						}
					}
				} break;
			} 
		 }
    } break;  
	case 'supprimerPokemon' : {
	 if(!isset($_SESSION['login']))
	 {
		 echo "<script>document.location.href='./Pokemon';</script>";
	 }
	 else
	 {
		if(!empty($unPokemon))
		{
			// supprimer le Pokémon
			Pokemons::supprimerPokemon($unPokemon->getNumero());
			// afficher la liste
			echo "<script>
			document.location.href='./Pokemon';
			</script>"; 
		}
		else
		{
			// afficher la liste
			echo "<script>
			document.location.href='./Pokemon';
			</script>"; 
		}
	 }		
    } break; 
	default:
	{        		
		if (isset($_POST['submitreset'])=="Reset")
		{
			$laCouleur="*";
			$type1="*";
			$type2="*";
			$recherche="*";
			$tri=0;						
		}
		else
		{
			$laCouleur="*";
			if(isset($_POST["cbxCouleur"]))
			{
				if($_POST["cbxCouleur"]=="" or $_POST["cbxCouleur"]=="-") {
					$laCouleur = "*";
				}
				else
				{
					$laCouleur=$_POST["cbxCouleur"];
				}
			}
			$type1="*";
			if(isset($_POST["cbxTypes1"]))
			{
				if($_POST["cbxTypes1"]=="" or $_POST["cbxTypes1"]=="-") {
					$type1 = "*";
				}
				else
				{
					$type1=$_POST["cbxTypes1"];
				}
			}
			$type2="*";
			if(isset($_POST["cbxTypes2"]))
			{
				if($_POST["cbxTypes2"]=="" or $_POST["cbxTypes2"]=="-") {
					$type2 = "*";
				}
				else
				{
					$type2=$_POST["cbxTypes2"];
				}
			}
			$recherche="*";
			if(isset($_POST["txtRecherche"]))
			{
				if($_POST["txtRecherche"]=="" or $_POST["txtRecherche"]=="-") {
					$recherche = "*";
				}
				else
				{
					$recherche=$_POST["txtRecherche"];
				}
				
			}
			$tri=0;
			if(isset($_POST["tri"]))
			{
				if ($_POST["tri"]=="" or $_POST["tri"]=="-") {
					$tri=0;
				}
				else
				{
					$tri=$_POST["tri"];
				}
			}
		}
		$lesPokemon = Pokemons::chargerLesPokemon(1,$tri,$laCouleur,$type1,$type2,$recherche);	
		$lesCouleurs = Pokemons::chargerLesCouleurs(0);
		$lesTypes = Pokemons::chargerLesTypes(0);
		// afficher le nombre de Pokémon
		$nbPokemon = count($lesPokemon);
        include 'vues/v_listePokemon.php';		
    } break;   
}

