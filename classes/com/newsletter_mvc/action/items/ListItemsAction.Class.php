<?php

/**
 * Acción para listar items.
 * 
 * @author Marcos
 * @since 13-07-2015
 * 
 */
class ListItemsAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  ItemGridModel();
	}

}
