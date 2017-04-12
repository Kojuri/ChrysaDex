<?php
/** 
 * Pokédex
 * © Chrysadex, 2016
 * 
 * Data Access Layer
 * Classe d'accès aux données 
 *
 * Utilise les services de la classe PdoDao
 *
 * @package 	default
 * @author 	Kojuri
 * @version    	1.0
 */

// sollicite les services de la classe PdoDao
require_once ('PdoDao.class.php');

class TypeDal { 
       
    /**
     * charge un objet de la classe Attaque à partir de son nom
     * @param  $nom : le nom de l'Attaque
     * @return  un objet de la classe Attaque
    */   
    public static function loadTypeByNom($nom) {
        $cnx = new PdoDao();
        $qry = 'SELECT * FROM Types WHERE Type = ?';
        $res = $cnx->getRows($qry,array($nom),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }     
	
	public static function loadPokemonByType($type) {
        $cnx = new PdoDao();
        $qry = 'SELECT Numero, NomFR FROM Pokemon WHERE Type1 = "'.$type.'" OR Type2 = "'.$type.'"';
        $res = $cnx->getRows($qry,array(),0);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }
	
	public static function loadAttaquesByType($type) {
        $cnx = new PdoDao();
        $qry = 'SELECT NomFR FROM Attaques WHERE Type = "'.$type.'"';
        $res = $cnx->getRows($qry,array(),0);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }
	
	public static function loadStatByType($type,$stat) {
        $cnx = new PdoDao();
        $qry = 'SELECT AVG('.$stat.'Base) FROM Pokemon WHERE Type1="'.$type.'" OR Type2="'.$type.'"';
        $res = $cnx->getRows($qry,array(),0);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }
	
}
