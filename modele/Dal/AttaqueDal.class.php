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
 * @author 	Iruni
 * @version    	1.2
 */

// sollicite les services de la classe PdoDao
require_once ('PdoDao.class.php');

class AttaqueDal { 
       
    /**
     * @param  $style : 0 == tableau assoc, 1 == objet
     * @return  un objet de la classe PDOStatement
    */   
    public static function loadAttaque($style) {
        $cnx = new PdoDao();
        $qry = 'SELECT * FROM Attaques';
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }

    /**
     * charge un objet de la classe Attaque à partir de son nom
     * @param  $nom : le nom de l'Attaque
     * @return  un objet de la classe Attaque
    */   
    public static function loadAttaqueByNom($nom) {
        $cnx = new PdoDao();
        $qry = 'SELECT * FROM Attaques WHERE NomFR = ?';
        $res = $cnx->getRows($qry,array($nom),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }     
	
	public static function loadAttaqueByNum($num) {
        $cnx = new PdoDao();
        $qry = 'SELECT * FROM Attaques WHERE Numero = ?';
        $res = $cnx->getRows($qry,array($num),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    } 
	
	   public static function loadCT($jeu,$style) {
        $cnx = new PdoDao();
        $qry = 'SELECT * FROM CT'.$jeu;
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }
	
}
