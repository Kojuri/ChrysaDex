<?php

/**
 * 
 * Pokédex
 * © ChrysaDex, 2016
 * 
 * Business Logic Layer
 *
 * Utilise les services des classes de la bibliothèque Reference
 * Utilise les services de la classe PokemonDal
 * Utilise les services de la classe Application
 *
 * @package 	default
 * @author 	Kojuri
 * @version    	1.2
 */


/*
 *  ====================================================================
 *  Classe Pokemons : fabrique d'objets Pokemon
 *  ====================================================================
 */

// sollicite les méthodes de la classe PokemonDal
require_once ('./modele/Dal/PokemonDal.class.php');
// sollicite les services de la classe Application
require_once ('./modele/App/Application.class.php');
// sollicite la référence
require_once ('./modele/Reference/Pokemon.class.php');

class Pokemons {

    /**
     * Méthodes publiques
     */
    
    /**
     * récupère les Pokemon pour les ouvrages
     * @param   $mode : 0 == tableau assoc, 1 == tableau d'objets
     * @return  un tableau de type $mode 
     */    
    public static function chargerLesPokemon($mode,$tri,$couleur,$type1,$type2,$recherche) {
        $tab = PokemonDal::loadPokemon($mode,$tri,$couleur,$type1,$type2,$recherche);
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unPokemon = new Pokemon(
                            $ligne->Numero, 
                            $ligne->NomFR, 
							$ligne->NomEN,
							$ligne->NomJP,
							$ligne->Type1,
							$ligne->Type2,
							$ligne->Famille,
							$ligne->PMale,
							$ligne->PFemelle,
							$ligne->TauxCapture,
							$ligne->Bonheur,
							$ligne->ExpMax,
							$ligne->PasEclosion,
							$ligne->Taille,
							$ligne->Poids,
							$ligne->PVBase,
							$ligne->AtqBase,
							$ligne->DefBase,
							$ligne->AtqSpeBase,
							$ligne->DefSpeBase,
							$ligne->VitBase,
							$ligne->Description,
							$ligne->Couleur,
							$ligne->Tier,
							$ligne->MoyStat
                    );
                    array_push($res, $unPokemon);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }

	public static function chargerLesPokemonParTier($mode,$tier) {
        $tab = PokemonDal::loadPokemonByTier($mode,$tier);
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $unPokemon = new Pokemon(
                            $ligne->Numero, 
                            $ligne->NomFR, 
							$ligne->NomEN,
							$ligne->NomJP,
							$ligne->Type1,
							$ligne->Type2,
							$ligne->Famille,
							$ligne->PMale,
							$ligne->PFemelle,
							$ligne->TauxCapture,
							$ligne->Bonheur,
							$ligne->ExpMax,
							$ligne->PasEclosion,
							$ligne->Taille,
							$ligne->Poids,
							$ligne->PVBase,
							$ligne->AtqBase,
							$ligne->DefBase,
							$ligne->AtqSpeBase,
							$ligne->DefSpeBase,
							$ligne->VitBase,
							$ligne->Description,
							$ligne->Couleur,
							$ligne->Tier,
							$ligne->MoyStat
                    );
                    array_push($res, $unPokemon);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }
	
	
	public static function chargerLesAttaquesDuPokemon($id) {
        $tab = PokemonDal::loadAttaquesByPokemon($id,0);
        if (Application::dataOK($tab)) {
			return $tab;           
        }
        return NULL;
    }
	
	public static function chargerLesTalentsNaturelsDuPokemon($nom) {
        $tab = PokemonDal::loadTalentsNaturelsByPokemon($nom,0);
        if (Application::dataOK($tab)) {
			return $tab;           
        }
        return NULL;
    }
	
		public static function chargerLesTalentsCachesDuPokemon($nom) {
        $tab = PokemonDal::loadTalentsCachesByPokemon($nom,0);
        if (Application::dataOK($tab)) {
			return $tab;           
        }
        return NULL;
    }
	
    /**
     * vérifie si un Pokemon existe
     * @param   $num : le num du Pokemon à contrôler
     * @return  un booléen
     */    
    public static function PokemonExiste($num) {
        $values = PokemonDal::loadPokemonByID($num, 1);
        $values2 = PokemonDal::loadPokemonByName($num, 1);
        if (Application::dataOK($values)) {
            return 1;
        }
        elseif(Application::dataOK($values2)){
        	return 1;
        }
        else{
        	return 0;
        }
    }
        
    public static function ajouterPokemon($valeurs) {
        $id = PokemonDal::addPokemon(
            $valeurs[0],
            $valeurs[1],
			$valeurs[2],
			$valeurs[3],
			$valeurs[4],
			$valeurs[5],
			$valeurs[6],
			$valeurs[7],
			$valeurs[8],
			$valeurs[9],
			$valeurs[10],
			$valeurs[11],
			$valeurs[12],
			$valeurs[13],
			$valeurs[14],
			$valeurs[15],
			$valeurs[16],
			$valeurs[17],
			$valeurs[18],
			$valeurs[19],
			$valeurs[20],
			$valeurs[21],
			$valeurs[22],
			$valeurs[23],
			$valeurs[24]
        );
        return self::chargerPokemonParID($id);
    }
	
	public static function modifierPokemon($pokemon) {
        $ligne = $pokemon;
		return PokemonDal::setPokemon(
            $ligne->getNumero(), 
			$ligne->getNomFR(), 
			$ligne->getNomEN(),
			$ligne->getNomJP(),
			$ligne->getType1(),
			$ligne->getType2(),
			$ligne->getFamille(),
			$ligne->getPMale(),
			$ligne->getPFemelle(),
			$ligne->getTauxCapture(),
			$ligne->getBonheur(),
			$ligne->getExpMax(),
			$ligne->getPasEclosion(),
			$ligne->getTaille(),
			$ligne->getPoids(),
			$ligne->getPVBase(),
			$ligne->getAtqBase(),
			$ligne->getDefBase(),
			$ligne->getAtqSpeBase(),
			$ligne->getDefSpeBase(),
			$ligne->getgetVitBase(),
			$ligne->getDescription(),
			$ligne->getCouleur(),
			$ligne->getTier(),
			$ligne->getMoyStat()
        );
    } 
   
    public static function supprimerPokemon($num) {
        return PokemonDal::delPokemon($num);
    }

    public static function chargerPokemonParId($id) {
        $values = PokemonDal::loadPokemonByID($id, 1);
        if (Application::dataOK($values)) {
            $NomFR = $values[0]->NomFR;
			$NomEN = $values[0]->NomEN;
            $NomJP = $values[0]->NomJP;
			$Type1=$values[0]->Type1;
			$Type2=$values[0]->Type2;
			$Famille=$values[0]->Famille;
			$PMale=$values[0]->PMale;
			$PFemelle=$values[0]->PFemelle;
			$TauxCapture=$values[0]->TauxCapture;
			$Bonheur=$values[0]->Bonheur;
			$ExpMax=$values[0]->ExpMax;
			$PasEclosion=$values[0]->PasEclosion;
			$Taille=$values[0]->Taille;
			$Poids=$values[0]->Poids;
			$PVBase=$values[0]->PVBase;
			$AtqBase=$values[0]->AtqBase;
			$DefBase=$values[0]->DefBase;
			$AtqSpeBase=$values[0]->AtqSpeBase;
			$DefSpeBase=$values[0]->DefSpeBase;
			$VitBase=$values[0]->VitBase;
			$Description=$values[0]->Description;
			$Couleur=$values[0]->Couleur;
			$Tier=$values[0]->Tier;
			$MoyStat=$values[0]->MoyStat;
            return new Pokemon ($id, $NomFR,$NomEN,$NomJP,$Type1,$Type2,$Famille,$PMale,
			$PFemelle,$TauxCapture,$Bonheur,$ExpMax,$PasEclosion,$Taille,$Poids,$PVBase,
			$AtqBase,$DefBase,$AtqSpeBase,$DefSpeBase,$VitBase,$Description,$Couleur,$Tier,$MoyStat);
        }
        return NULL;
    }    
    
    
    public static function chargerPokemonParNom($id) {
        $values = PokemonDal::loadPokemonByName($id, 1);
        if (Application::dataOK($values)) {
	        $Numero = $values[0]->Numero;
            $NomFR = $values[0]->NomFR;
			$NomEN = $values[0]->NomEN;
            $NomJP = $values[0]->NomJP;
			$Type1=$values[0]->Type1;
			$Type2=$values[0]->Type2;
			$Famille=$values[0]->Famille;
			$PMale=$values[0]->PMale;
			$PFemelle=$values[0]->PFemelle;
			$TauxCapture=$values[0]->TauxCapture;
			$Bonheur=$values[0]->Bonheur;
			$ExpMax=$values[0]->ExpMax;
			$PasEclosion=$values[0]->PasEclosion;
			$Taille=$values[0]->Taille;
			$Poids=$values[0]->Poids;
			$PVBase=$values[0]->PVBase;
			$AtqBase=$values[0]->AtqBase;
			$DefBase=$values[0]->DefBase;
			$AtqSpeBase=$values[0]->AtqSpeBase;
			$DefSpeBase=$values[0]->DefSpeBase;
			$VitBase=$values[0]->VitBase;
			$Description=$values[0]->Description;
			$Couleur=$values[0]->Couleur;
			$Tier=$values[0]->Tier;
			$MoyStat=$values[0]->MoyStat;
            return new Pokemon ($Numero, $NomFR,$NomEN,$NomJP,$Type1,$Type2,$Famille,$PMale,
			$PFemelle,$TauxCapture,$Bonheur,$ExpMax,$PasEclosion,$Taille,$Poids,$PVBase,
			$AtqBase,$DefBase,$AtqSpeBase,$DefSpeBase,$VitBase,$Description,$Couleur,$Tier,$MoyStat);
        }
        return NULL;
    }    
	
	 public static function chargerLesCouleurs($mode) {
        $tab = PokemonDal::loadCouleurs($mode);
        if (Application::dataOK($tab)) {
			return $tab;           
        }
        return NULL;
    }
	
	public static function chargerLesTypes($mode) {
        $tab = PokemonDal::loadTypes($mode);
        if (Application::dataOK($tab)) {
			return $tab;           
        }
        return NULL;
    }
	
	public static function chargerLesTiers($mode) {
        $tab = PokemonDal::loadTiers($mode);
        if (Application::dataOK($tab)) {
			return $tab;           
        }
        return NULL;
    }
	
}
