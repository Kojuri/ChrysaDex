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
 * @author 	Iruni
 * @version    	1.1
 */


/*
 *  ====================================================================
 *  Classe Attaque : représente une attaque
 *  ====================================================================
*/

class Attaque {
    private $_NomFR;
	private $_NomEN;
	private $_Type;
	private $_Description;
	private $_PP;
	private $_Puissance;
	private $_Precision;
	private $_Categorie;
	private $_CTRSE;
	private $_CTDPP;
	private $_CTHGSS;
	private $_CTNB;
	private $_CTNB2;
    private $_CTXY;
	private $_CTROSA;
	private $_Numero;

    /**
     * Constructeur 
    */				
    public function __construct(
            $p_NomFR,
			$p_NomEN,
			$p_Type,
			$p_Description,
			$p_PP,
			$p_Puissance,
			$p_Precision,
			$p_Categorie,
			$p_CTRSE,
			$p_CTDPP,
			$p_CTHGSS,
			$p_CTNB,
			$p_CTNB2,
			$p_CTXY,
			$p_CTROSA,
			$p_Numero
    ) {
        $this->setNomFR($p_NomFR);
		$this->setNomEN($p_NomEN);
		$this->setType($p_Type);
		$this->setDescription($p_Description);
		$this->setPP($p_PP);
		$this->setPuissance($p_Puissance);
		$this->setPrecision($p_Precision);
		$this->setCategorie($p_Categorie);
		$this->setCTRSE($p_CTRSE);
		$this->setCTDPP($p_CTDPP);
		$this->setCTHGSS($p_CTHGSS);
		$this->setCTNB($p_CTNB);
		$this->setCTNB2($p_CTNB2);
		$this->setCTXY($p_CTXY);
		$this->setCTROSA($p_CTROSA);
		$this->setNumero($p_Numero);
    }  
    
    /**
     * Accesseurs
    */

   public function getNomFR () {
        return $this->_NomFR;
}
    
   public function getNomEN () {
	return $this->_NomEN;
}

   public function getType () {
	return $this->_Type;
}
   public function getDescription () {
	return $this->_Description;
}
   public function getPP () {
	return $this->_PP;
}
   public function getPuissance () {
	return $this->_Puissance;
}
   public function getPrecision () {
	return $this->_Precision;
}
   public function getCategorie () {
	return $this->_Categorie;
}
   public function getCTRSE () {
	return $this->_CTRSE;
}
   public function getCTDPP () {
	return $this->_CTDPP;
}
   public function getCTHGSS () {
	return $this->_CTHGSS;
}
   public function getCTNB () {
	return $this->_CTNB;
}
   public function getCTNB2 () {
	return $this->_CTNB2;
}
   public function getCTXY () {
	return $this->_CTXY;
}
   public function getCTROSA () {
	return $this->_CTXY;
}
   public function getNumero () {
    return $this->_Numero;
}
	
    /**
     * Mutateurs
    */

	   public function setNomFR ($p_NomFR) {
	     return $this->_NomFR=$p_NomFR;
	}
		
	   public function setNomEN ($p_NomEN) {
		return $this->_NomEN=$p_NomEN;
	}

	   public function setType ($p_Type) {
		return $this->_Type=$p_Type;
	}
	   public function setDescription ($p_Description) {
		return $this->_Description=$p_Description;
	}
	   public function setPP ($p_PP) {
		return $this->_PP=$p_PP;
	}
	   public function setPuissance ($p_Puissance) {
		return $this->_Puissance=$p_Puissance;
	}
	   public function setPrecision ($p_Precision) {
		return $this->_Precision=$p_Precision;
	}
	   public function setCategorie ($p_Categorie) {
		return $this->_Categorie=$p_Categorie;
	}
	   public function setCTRSE ($p_CTRSE) {
		return $this->_CTRSE=$p_CTRSE;
	}
	   public function setCTDPP ($p_CTDPP) {
		return $this->_CTDPP=$p_CTDPP;
	}
	   public function setCTHGSS ($p_CTHGSS) {
		return $this->_CTHGSS=$p_CTHGSS;
	}
	   public function setCTNB ($p_CTNB) {
		return $this->_CTNB=$p_CTNB;
	}
	   public function setCTNB2 ($p_CTNB2) {
		return $this->_CTNB2=$p_CTNB2;
	}
	   public function setCTXY ($p_CTXY) {
		return $this->_CTXY=$p_CTXY;
	}
	   public function setCTROSA ($p_CTROSA) {
		return $this->_CTROSA=$p_CTROSA;
	}
	   public function setNumero ($p_Numero) {
	    return $this->_Numero=$p_Numero;
	}

}
