<?php 

/** 
 * Category class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class Category { 
	
	//variables de instancia.
	
	private $cd_category;
	
	private $ds_category;
	

	//Constructor.
	public function Category() { 
		//inicializar variables.
		
		
		$this->cd_category = '';
		
		$this->ds_category = '';
		
		
	}

	//Getters	
		
	public function getCd_category() { 
		return $this->cd_category;
	}
		
	public function getDs_category() { 
		return $this->ds_category;
	}
	
	

	//Setters
	
	public function setCd_category( $value ) { 
		$this->cd_category = $value;
	}
	
	public function setDs_category( $value ) { 
		$this->ds_category = $value;
	}
	
	
} 
?>
