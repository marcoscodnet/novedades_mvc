<?php 

/** 
 * Status class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class Status { 
	
	//variables de instancia.
	
	private $cd_status;
	
	private $ds_status;
	

	//Constructor.
	public function Status() { 
		//inicializar variables.
		
		
		$this->cd_status = '';
		
		$this->ds_status = '';
		
		
	}

	//Getters	
		
	public function getCd_status() { 
		return $this->cd_status;
	}
		
	public function getDs_status() { 
		return $this->ds_status;
	}
	
	

	//Setters
	
	public function setCd_status( $value ) { 
		$this->cd_status = $value;
	}
	
	public function setDs_status( $value ) { 
		$this->ds_status = $value;
	}
	
	
} 
?>
