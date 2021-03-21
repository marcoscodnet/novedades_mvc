<?php

/**
 * Acción para listar states.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ListStatesAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  StatusGridModel();
	}

}
