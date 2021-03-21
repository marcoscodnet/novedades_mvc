<?php 

/** 
 * ImageCategory class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ImageCategory { 
	
	//variables de instancia.
	
	private $cd_image_category;
	
	private $ds_image_category;
	

	//Constructor.
	public function ImageCategory() { 
		//inicializar variables.
		
		
		$this->cd_image_category = '';
		
		$this->ds_image_category = '';
		
		
	}

	//Getters	
		
	public function getCd_image_category() { 
		return $this->cd_image_category;
	}
		
	public function getDs_image_category() { 
		return $this->ds_image_category;
	}
	
	

	//Setters
	
	public function setCd_image_category( $value ) { 
		$this->cd_image_category = $value;
	}
	
	public function setDs_image_category( $value ) { 
		$this->ds_image_category = $value;
	}
	
	
} 
?>
