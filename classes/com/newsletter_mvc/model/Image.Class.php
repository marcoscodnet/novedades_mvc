<?php 

/** 
 * Image class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class Image { 
	
	//variables de instancia.
	
	private $cd_image;
	
	private $oImage;
	
	private $oTemplate;
	
	private $ds_image;
	
	private $nu_size;
	
	private $ds_type;
	
	private $dt_date;
	

	//Constructor.
	public function Image() { 
		//inicializar variables.
		
		
		$this->cd_image = '';
		
		$this->ds_image = '';
		
		$this->nu_size = '';
		
		$this->ds_type = '';
		
		$this->dt_date = '';
		
		
		$this->oImage = new Image();
		
		$this->oTemplate = new Template();
		
	}

	//Getters	
		
	public function getCd_image() { 
		return $this->cd_image;
	}
		
	public function getImage() { 
		return $this->oImage;
	}
		
	public function getTemplate() { 
		return $this->oTemplate;
	}
		
	public function getDs_image() { 
		return $this->ds_image;
	}
		
	public function getNu_size() { 
		return $this->nu_size;
	}
		
	public function getDs_type() { 
		return $this->ds_type;
	}
		
	public function getDt_date() { 
		return $this->dt_date;
	}
	
		
	public function getCd_image_category() { 
		return $this->oImage->getCd_image_category();
	}
		
	public function getCd_template() { 
		return $this->oTemplate->getCd_template();
	}
	

	//Setters
	
	public function setCd_image( $value ) { 
		$this->cd_image = $value;
	}
	
	public function setImage( $value ) { 
		$this->oImage = $value;
	}
	
	public function setTemplate( $value ) { 
		$this->oTemplate = $value;
	}
	
	public function setDs_image( $value ) { 
		$this->ds_image = $value;
	}
	
	public function setNu_size( $value ) { 
		$this->nu_size = $value;
	}
	
	public function setDs_type( $value ) { 
		$this->ds_type = $value;
	}
	
	public function setDt_date( $value ) { 
		$this->dt_date = $value;
	}
	
	
	public function setCd_image_category( $value ) { 
		$this->oImage->setCd_image_category( $value );
	}
	
	public function setCd_template( $value ) { 
		$this->oTemplate->setCd_template( $value );
	}
	
} 
?>
