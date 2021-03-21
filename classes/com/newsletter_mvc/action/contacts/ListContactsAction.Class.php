<?php

/**
 * Acción para listar contacts.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ListContactsAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  ContactGridModel();
	}

}
