<?php 

/** 
 * Item class 
 *  
 * @author Marcos
 * @since 13/07/2015
 */ 
class Item { 
	
	//variables de instancia.
	
	private $cd_item;
	
	private $ds_item;
	
	private $ds_image;
	
	private $oNewsletter;
	
	private $nu_order;
	

	//Constructor.
	public function Item() { 
		//inicializar variables.
		
		
		$this->cd_item = '';
		
		$this->ds_item = '';
		
		$this->ds_image = '';
		
		$this->nu_order = '';
		
		
		$this->oNewsletter = new Newsletter();
		
	}

	//Getters	
		
	public function getCd_item() { 
		return $this->cd_item;
	}
		
	public function getDs_item() { 
		return $this->ds_item;
	}
		
	public function getDs_image() { 
		return $this->ds_image;
	}
		
	public function getNewsletter() { 
		return $this->oNewsletter;
	}
		
	public function getNu_order() { 
		return $this->nu_order;
	}
	
		
	public function getCd_newsletter() { 
		return $this->oNewsletter->getCd_newsletter();
	}
	
	public function getDs_newsletter() { 
		return $this->oNewsletter->getDs_newsletter();
	}
	

	//Setters
	
	public function setCd_item( $value ) { 
		$this->cd_item = $value;
	}
	
	public function setDs_item( $value ) { 
		$this->ds_item = $value;
	}
	
	public function setDs_image( $value ) { 
		$this->ds_image = $value;
	}
	
	public function setNewsletter( $value ) { 
		$this->oNewsletter = $value;
	}
	
	public function setNu_order( $value ) { 
		$this->nu_order = $value;
	}
	
	
	public function setCd_newsletter( $value ) { 
		$this->oNewsletter->setCd_newsletter( $value );
	}
	
} 
?>
