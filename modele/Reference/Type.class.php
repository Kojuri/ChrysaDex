<?php
/** 
 * 
 * Pokédex
 * © Chrysadex, 2016
 * 
 * References
 * Classes métier
 *
 *
 * @package 	default
 * @author 	Kojuri
 * @version    	1.0
 */


/*
 *  ====================================================================
 *  Classe Attaque : représente un type
 *  ====================================================================
*/

class Type {
    private $_Type;
	private $_Description;
	private $_Faiblesses;
	private $_Resistances;
	private $_Immunites;
	private $_SuperEfficace;
	private $_PeuEfficace;
	private $_Inefficace;

    /**
     * Constructeur 
    */				
    public function __construct(
            $p_Type,
			$p_Description,
			$p_Faiblesses,
			$p_Resistances,
			$p_Immunites,
			$p_SuperEfficace,
			$p_PeuEfficace,
			$p_Inefficace
    ) {
        $this->setType($p_Type);
		$this->setDescription($p_Description);
		$this->setFaiblesses($p_Faiblesses);
		$this->setResistances($p_Resistances);
		$this->setImmunites($p_Immunites);
		$this->setSuperEfficace($p_SuperEfficace);
		$this->setPeuEfficace($p_PeuEfficace);
		$this->setInefficace($p_Inefficace);
    }  
    
    /**
     * Accesseurs
    */

   public function getType () {
        return $this->_Type;
}
    
   public function getDescription () {
	return $this->_Description;
}

   public function getFaiblesses () {
	return $this->_Faiblesses;
}
   public function getResistances () {
	return $this->_Resistances;
}
   public function getImmunites () {
	return $this->_Immunites;
}
   public function getSuperEfficace () {
	return $this->_SuperEfficace;
}
   public function getPeuEfficace () {
	return $this->_PeuEfficace;
}
   public function getInefficace () {
	return $this->_Inefficace;
}
  
   public function setType ($p_Type) {
	     return $this->_Type=$p_Type;
	}
		
		 public function setDescription ($p_Description) {
	     return $this->_Description=$p_Description;
	}
		
	   public function setFaiblesses ($p_Faiblesses) {
		return $this->_Faiblesses=$p_Faiblesses;
	}

	   public function setResistances ($p_Resistances) {
		return $this->_Resistances=$p_Resistances;
	}
	   public function setImmunites ($p_Immunites) {
		return $this->_Immunites=$p_Immunites;
	}
	   public function setSuperEfficace ($p_SuperEfficace) {
		return $this->_SuperEfficace=$p_SuperEfficace;
	}
	   public function setPeuEfficace ($p_PeuEfficace) {
		return $this->_PeuEfficace=$p_PeuEfficace;
	}
	   public function setInefficace ($p_Inefficace) {
		return $this->_Inefficace=$p_Inefficace;
	}
	 
}
