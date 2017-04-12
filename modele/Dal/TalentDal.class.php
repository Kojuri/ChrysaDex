<?php
/** 
 * Pokédex
 * © Pokedex, 2016
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

class PokemonDal { 
       
    /**
     * @param  $style : 0 == tableau assoc, 1 == objet
     * @return  un objet de la classe PDOStatement
    */   
    public static function loadPokemon($style) {
        $cnx = new PdoDao();
        $qry = 'SELECT * FROM Pokemon';
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }

    /**
     * charge un objet de la classe Pokemon à partir de son num
     * @param  $id : le num du Pokemon
     * @return  un objet de la classe Pokemon
    */   
    public static function loadPokemonByID($id) {
        $cnx = new PdoDao();
        $qry = 'SELECT * FROM Pokemon WHERE Numero = ?';
        $res = $cnx->getRows($qry,array($id),1);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }     
}
