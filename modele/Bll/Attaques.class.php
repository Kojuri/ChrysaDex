<?php

/**
 * 
 * Pokédex
 * © Chrysadex, 2016
 * 
 * Business Logic Layer
 *
 * Utilise les services des classes de la bibliothèque Reference
 * Utilise les services de la classe AttaqueDal
 * Utilise les services de la classe Application
 *
 * @package 	default
 * @author 	Iruni
 * @version    	1.3
 */


/*
 *  ====================================================================
 *  Classe Attaques : fabrique d'objets Attaque
 *  ====================================================================
 */

// sollicite les méthodes de la classe AttaqueDal
require_once ('./modele/Dal/AttaqueDal.class.php');
// sollicite les services de la classe Application
require_once ('./modele/App/Application.class.php');
// sollicite la référence
require_once ('./modele/Reference/Attaque.class.php');

class Attaques {

    /**
     * Méthodes publiques
     */
    
    /**
     * récupère les Attaques
     * @param   $mode : 0 == tableau assoc, 1 == tableau d'objets
     * @return  un tableau de type $mode 
     */    
    public static function chargerLesAttaques($mode) {
        $tab = AttaqueDal::loadAttaque(1);
        if (Application::dataOK($tab)) {
            if ($mode == 1) {
                $res = array();
                foreach ($tab as $ligne) {
                    $uneAttaque = new Attaque(
                            $ligne->NomFR, 
							$ligne->NomEN,
							$ligne->Type,
							$ligne->Description,
							$ligne->PP,
							$ligne->Puissance,
							$ligne->Precision,
							$ligne->Categorie,
							$ligne->CTRSE,
							$ligne->CTDPP,
							$ligne->CTHGSS,
							$ligne->CTNB,
							$ligne->CTNB2,
							$ligne->CTXY,
							$ligne->CTROSA,
							$ligne->Numero
                    );
                    array_push($res, $uneAttaque);
                }
                return $res;
            }
            else {
                return $tab;
            }
        }
        return NULL;
    }

    /**
     * vérifie si une Attaqur existe
     * @param   $nom : le nom de l'Attaque à contrôler
     * @return  un booléen
     */    
    public static function AttaqueExiste($nom) {
        $values = AttaqueDal::loadAttaqueByNom($nom, 1);
        if (Application::dataOK($values)) {
            return 1;
        }
        return 0;
    }
   

    public static function chargerAttaqueParNom($nom) {
        $values = AttaqueDal::loadAttaqueByNom($nom, 1);
        if (Application::dataOK($values)) {
            $NomFR = $values[0]->NomFR;
			$NomEN = $values[0]->NomEN;
			$Type=$values[0]->Type;
			$Description=$values[0]->Description;
			$PP=$values[0]->PP;
			$Puissance=$values[0]->Puissance;
			$Precision=$values[0]->Precision;
			$Categorie=$values[0]->Categorie;
			$CTRSE=$values[0]->CTRSE;
			$CTDPP=$values[0]->CTDPP;
			$CTHGSS=$values[0]->CTHGSS;
			$CTNB=$values[0]->CTNB;
			$CTNB2=$values[0]->CTNB2;
			$CTXY=$values[0]->CTXY;
			$CTROSA=$values[0]->CTROSA;
			$Numero=$values[0]->Numero;
            return new Attaque ($NomFR,$NomEN,$Type,$Description,$PP,$Puissance,
			$Precision,$Categorie,$CTRSE,$CTDPP,$CTHGSS,$CTNB,$CTNB2,$CTXY,$CTROSA,$Numero);
        }
        return NULL;
    }    
	
	 public static function chargerAttaqueParNum($num) {
        $values = AttaqueDal::loadAttaqueByNum($num, 1);
        if (Application::dataOK($values)) {
            $NomFR = $values[0]->NomFR;
			$NomEN = $values[0]->NomEN;
			$Type=$values[0]->Type;
			$Description=$values[0]->Description;
			$PP=$values[0]->PP;
			$Puissance=$values[0]->Puissance;
			$Precision=$values[0]->Precision;
			$Categorie=$values[0]->Categorie;
			$CTRSE=$values[0]->CTRSE;
			$CTDPP=$values[0]->CTDPP;
			$CTHGSS=$values[0]->CTHGSS;
			$CTNB=$values[0]->CTNB;
			$CTNB2=$values[0]->CTNB2;
			$CTXY=$values[0]->CTXY;
			$CTROSA=$values[0]->CTROSA;
			$Numero=$values[0]->Numero;
            return new Attaque ($NomFR,$NomEN,$Type,$Description,$PP,$Puissance,
			$Precision,$Categorie,$CTRSE,$CTDPP,$CTHGSS,$CTNB,$CTNB2,$CTXY,$CTROSA,$Numero);
        }
        return NULL;
    }    
	
	public static function chargerLesCT($jeu) {
        $tab = AttaqueDal::loadCT($jeu,0);
        if (Application::dataOK($tab)) {
			return $tab;           
        }
        return NULL;
    }
	
}
