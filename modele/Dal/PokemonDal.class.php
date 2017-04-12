<?php
/** 
 * Pokédex
 * © ChrysaDex, 2016
 * 
 * Data Access Layer
 * Classe d'accès aux données 
 *
 * Utilise les services de la classe PdoDao
 *
 * @package 	default
 * @author 	Kojuri
 * @version    	1.4
 */

// sollicite les services de la classe PdoDao
require_once ('PdoDao.class.php');

class PokemonDal { 
       
    /**
     * @param  $style : 0 == tableau assoc, 1 == objet
     * @return  un objet de la classe PDOStatement
    */   
    public static function loadPokemon($style,$tri,$couleur,$type1,$type2,$recherche) {
		$cnx = new PdoDao();
        $qry = 'SELECT * FROM Pokemon';		
		if($couleur!="*" or $type1!="*" or $type2!="*" or $recherche!="*")
		{
			$qry.=' WHERE';
			if($couleur!="*")
			{
				$qry.=' Couleur="'.$couleur.'"';
			}
			if($type1!="*" and $couleur!="*")
			{
				$qry.=' AND';
			}
			if($type1!="*")
			{
				$qry.=' Type1="'.$type1.'"';
			}	
			if($type2!="*")
			{
				if($couleur!="*" or $type1!="*")
				{
					$qry.=' AND';
				}
				$qry.=' Type2="'.$type2.'"';
			}
			if($recherche!="*")
			{
				if($couleur!="*" or $type1!="*" or $type2!="*")
				{
					$qry.=' AND (';
				}
				$qry.=' NomFR like "%'.$recherche.'%" OR NomEN like "%'.$recherche.'%" OR NomJP like "%'.$recherche.'%"';
				if($couleur!="*" or $type1!="*" or $type2!="*")
				{
					$qry.=')';
				}
			}
		}				
		switch($tri)
		{
			case 0:
			{
				$qry.=' ORDER BY Numero';
			}break;
			case 1:
			{
				$qry.=' ORDER BY Numero DESC';
			}break;
			case 2:
			{
				$qry.=' ORDER BY NomFR';
			}break;
			case 3:
			{
				$qry.=' ORDER BY NomFR DESC';
			}break;
			case 4:
			{
				$qry.=' ORDER BY PVBase DESC';
			}break;
			case 5:
			{
				$qry.=' ORDER BY AtqBase DESC';
			}break;
			case 6:
			{
				$qry.=' ORDER BY DefBase DESC';
			}break;
			case 7:
			{
				$qry.=' ORDER BY AtqSpeBase DESC';
			}break;
			case 8:
			{
				$qry.=' ORDER BY DefSpeBase DESC';
			}break;
			case 9:
			{
				$qry.=' ORDER BY VitBase DESC';
			}break;
			case 10:
			{
				$qry.=' ORDER BY MoyStat DESC';
			}break;
			default:
			{
				$qry.=' ORDER BY Numero';
			}break;
		}
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
    }

	
	public static function loadPokemonByTier($style,$tier) {
		$cnx = new PdoDao();
        $qry = 'SELECT * FROM Pokemon WHERE Tier='.$tier;
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
         $qry = 'CALL sp_loadPokemonByID(?)';
         $res = $cnx->getRows($qry,array($id),1);
         if (is_a($res,'PDOException')) {
             return PDO_EXCEPTION_VALUE;
         }
         return $res;
     }   
	
	
	/**
     * charge un objet de la classe Pokemon à partir de son nom
     * @param  $id : le nom du Pokemon
     * @return  un objet de la classe Pokemon
    */    	
	  public static function loadPokemonByName($id) {
         $cnx = new PdoDao();
         $qry = 'CALL sp_loadPokemonByName(?)';
         $res = $cnx->getRows($qry,array($id),1);
         if (is_a($res,'PDOException')) {
             return PDO_EXCEPTION_VALUE;
         }
         return $res;
     }   
	 
	  public static function addPokemon(
             $_Numero,
			 $_NomFR,
			 $_NomEN,
			 $_NomJP,
			 $_Type1,
			 $_Type2,
			 $_Famille,
			 $_PMale,
			 $_PFemelle,
			 $_TauxCapture,
			 $_Bonheur,
			 $_ExpMax,
			 $_PasEclosion,
			 $_Taille,
			 $_Poids,
			 $_PVBase,
			 $_AtqBase,
			 $_DefBase,
			 $_AtqSpeBase,
			 $_DefSpeBase,
			 $_VitBase,
			 $_Description,
			 $_Couleur,
			 $_Tier,
			 $_MoyStat
    ) {
        $cnx = new PdoDao();
        $qry = 'INSERT INTO pokemon VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $res = $cnx->execSQL($qry,array(
                 $_Numero,
				 $_NomFR,
				 $_NomEN,
				 $_NomJP,
				 $_Type1,
				 $_Type2,
				 $_Famille,
				 $_PMale,
				 $_PFemelle,
				 $_TauxCapture,
				 $_Bonheur,
				 $_ExpMax,
				 $_PasEclosion,
				 $_Taille,
				 $_Poids,
				 $_PVBase,
				 $_AtqBase,
				 $_DefBase,
				 $_AtqSpeBase,
				 $_DefSpeBase,
				 $_VitBase,
				 $_Description,
				 $_Couleur,
				 $_Tier,
				 $_MoyStat
            )
        );
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $_Numero;
    }
	
	public static function setPokemon(
             $_Numero,
			 $_NomFR,
			 $_NomEN,
			 $_NomJP,
			 $_Type1,
			 $_Type2,
			 $_Famille,
			 $_PMale,
			 $_PFemelle,
			 $_TauxCapture,
			 $_Bonheur,
			 $_ExpMax,
			 $_PasEclosion,
			 $_Taille,
			 $_Poids,
			 $_PVBase,
			 $_AtqBase,
			 $_DefBase,
			 $_AtqSpeBase,
			 $_DefSpeBase,
			 $_VitBase,
			 $_Description,
			 $_Couleur,
			 $_Tier,
			 $_MoyStat
    ) {
        $cnx = new PdoDao();
        $qry = 'UPDATE Pokemon SET NomFR = ?, NomEN = ?, NomJP = ?, Type1 = ?, Type2 = ?, Famille = ?, PMale = ?, PFemelle = ?, TauxCapture = ?, Bonheur = ?, ExpMax = ?, PasEclosion = ?, Taille = ?, Poids = ?, PVBase = ?, AtqBase = ?, DefBase = ?, AtqSpeBase = ?, DefSpeBase = ?, VitBase = ?, Couleur = ?, Tier = ?, MoyStat = ? WHERE Numero = ?';
        $res = $cnx->execSQL($qry,array(
				 $_NomFR,
				 $_NomEN,
				 $_NomJP,
				 $_Type1,
				 $_Type2,
				 $_Famille,
				 $_PMale,
				 $_PFemelle,
				 $_TauxCapture,
				 $_Bonheur,
				 $_ExpMax,
				 $_PasEclosion,
				 $_Taille,
				 $_Poids,
				 $_PVBase,
				 $_AtqBase,
				 $_DefBase,
				 $_AtqSpeBase,
				 $_DefSpeBase,
				 $_VitBase,
				 $_Description,
				 $_Couleur,
				 $_Tier,
				 $_MoyStat,
				 $_Numero
            ));
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }

	/**
     * supprime un Pokémon
     * @param   int $num : le numéro du Pokémon à supprimer
    */      
    public static function delPokemon($num) {
        $cnx = new PdoDao();
        $qry = 'DELETE FROM Pokemon WHERE Numero = ?';
        $res = $cnx->execSQL($qry,array($num));
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }  
	
	public static function loadCouleurs($style){
		$cnx = new PdoDao();
        $qry = 'SELECT Couleur FROM Pokemon GROUP BY Couleur';
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
	}
	
	public static function loadTiers($style){
		$cnx = new PdoDao();
        $qry = 'SELECT Tier FROM Pokemon GROUP BY Tier';
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
	}
	
	public static function loadTypes($style){
		$cnx = new PdoDao();
        $qry = 'SELECT Type1 FROM Pokemon GROUP BY Type1';
        $res = $cnx->getRows($qry,array(),$style);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }        
        return $res;
	}

	    public static function loadAttaquesByPokemon($id) {
        $cnx = new PdoDao();
        $qry = 'SELECT * FROM Attaques_Pokemon WHERE NumPokemon = ?';
        $res = $cnx->getRows($qry,array($id),0);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }  
	
	public static function loadTalentsNaturelsByPokemon($nom) {
        $cnx = new PdoDao();
        $qry = 'SELECT NomFR FROM Talents WHERE TalentNaturel like "%'.$nom.'%"';
        $res = $cnx->getRows($qry,array($nom),0);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    }  
		
		public static function loadTalentsCachesByPokemon($nom) {
        $cnx = new PdoDao();
        $qry = 'SELECT NomFR FROM Talents WHERE TalentCache like "%'.$nom.'%"';
        $res = $cnx->getRows($qry,array($nom),0);
        if (is_a($res,'PDOException')) {
            return PDO_EXCEPTION_VALUE;
        }
        return $res;
    } 	
		
}
