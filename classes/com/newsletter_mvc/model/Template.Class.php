<?php 

/** 
 * Template class 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class Template { 
	
	//variables de instancia.
	
	private $cd_template;
	
	private $ds_template;
	
	private $ds_path;
	
	private $nu_image;
	
	private $img_header;
	
	private $img_footer;
	

	//Constructor.
	public function Template() { 
		//inicializar variables.
		
		
		$this->cd_template = '';
		
		$this->ds_template = '';
		
		$this->ds_path = '';
		
		$this->nu_image = '';
		
		$this->img_header = '';
		
		$this->img_footer = '';
	}

	//Getters	
		
	public function getCd_template() { 
		return $this->cd_template;
	}
		
	public function getDs_template() { 
		return $this->ds_template;
	}
		
	public function getDs_path() { 
		return $this->ds_path;
	}
		
	public function getNu_image() { 
		return $this->nu_image;
	}
	
	

	//Setters
	
	public function setCd_template( $value ) { 
		$this->cd_template = $value;
	}
	
	public function setDs_template( $value ) { 
		$this->ds_template = $value;
	}
	
	public function setDs_path( $value ) { 
		$this->ds_path = $value;
	}
	
	public function setNu_image( $value ) { 
		$this->nu_image = $value;
	}
	
	

	public function getImg_header()
	{
	    return $this->img_header;
	}

	public function setImg_header($img_header)
	{
	    $this->img_header = $img_header;
	}

	public function getImg_footer()
	{
	    return $this->img_footer;
	}

	public function setImg_footer($img_footer)
	{
	    $this->img_footer = $img_footer;
	}
} 
?>
