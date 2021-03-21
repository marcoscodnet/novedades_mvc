<?php

/**
 * Acción para listar categories.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ListCategoriesAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  CategoryGridModel();
	}

}
