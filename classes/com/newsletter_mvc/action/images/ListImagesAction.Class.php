<?php

/**
 * Acción para listar images.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ListImagesAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  ImageGridModel();
	}

}
