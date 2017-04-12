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
 * @author 	Kojuri
 * @version    	1.0
 */


/*
 *  ====================================================================
 *  Classe Attaques : fabrique d'objets Types
 *  ====================================================================
 */

// sollicite les méthodes de la classe TypeDal
require_once ('./modele/Dal/TypeDal.class.php');
// sollicite les services de la classe Application
require_once ('./modele/App/Application.class.php');
// sollicite la référence
require_once ('./modele/Reference/Type.class.php');

class Types {

    /**
     * Méthodes publiques
     */
   
    public static function chargerTypeParNom($nom) {
        $values = TypeDal::loadTypeByNom($nom, 1);
        if (Application::dataOK($values)) {
            $Type = $values[0]->Type;
			$Description = $values[0]->Description;
			$Faiblesses=$values[0]->Faiblesses;
			$Resistances=$values[0]->Resistances;
			$Immunites=$values[0]->Immunites;
			$SuperEfficace=$values[0]->SuperEfficace;
			$PeuEfficace=$values[0]->PeuEfficace;
			$Inefficace=$values[0]->Inefficace;
            return new Type ($Type,$Description,$Faiblesses,$Resistances,$Immunites,$SuperEfficace,
			$PeuEfficace,$Inefficace);
        }
        return NULL;
    }    
	  
	
	public static function chargerLesStatsParType($type,$stat) {
        $tab = TypeDal::loadStatByType($type,$stat);
        if (Application::dataOK($tab)) {
			return $tab;           
        }
        return NULL;
    }
	
	public static function chargerLesAttaquesParType($type) {
        $tab = TypeDal::loadAttaquesByType($type);
        if (Application::dataOK($tab)) {
			return $tab;           
        }
        return NULL;
    }
	
	public static function chargerLesPokemonParType($type) {
        $tab = TypeDal::loadPokemonByType($type);
        if (Application::dataOK($tab)) {
			return $tab;           
        }
        return NULL;
    }
	
}
