<?php 

/** 
 * DAO para Item 
 *  
 * @author Marcos
 * @since 13/07/2015
 */ 
class ItemDAO { 

	/**
	 * se persiste la nueva entity
	 * @param Item $oItem entity a persistir.
	 */
	public static function addItem(Item $oItem) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_item = $oItem->getDs_item();
		
		$ds_image = $oItem->getDs_image();
		
		
		$cd_newsletter =  CdtFormatUtils::ifEmpty( $oItem->getCd_newsletter(), 'null' );
		
		$nu_order =  CdtFormatUtils::ifEmpty( $oItem->getNu_order(), 'null' );
		
		
		$tableName = BOL_TABLE_ITEM;
		
		$sql = "INSERT INTO $tableName (ds_item, ds_image, cd_newsletter, nu_order) VALUES('$ds_item', '$ds_image', $cd_newsletter, $nu_order)"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oItem->setCd_item( $cd );
	}


	/**
	 * se modifica la entity
	 * @param Item $oItem entity a modificar.
	 */
	public static function updateItem(Item $oItem) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_item = $oItem->getDs_item();
		
		$ds_image = $oItem->getDs_image();
		
		
		$cd_item = CdtFormatUtils::ifEmpty( $oItem->getCd_item(), 'null' );
		
		$cd_newsletter = CdtFormatUtils::ifEmpty( $oItem->getCd_newsletter(), 'null' );
		
		$nu_order = CdtFormatUtils::ifEmpty( $oItem->getNu_order(), 'null' );
		
		

		$tableName = BOL_TABLE_ITEM;
		
		$sql = "UPDATE $tableName SET ds_item = '$ds_item', ds_image = '$ds_image', cd_newsletter = $cd_newsletter, nu_order = $nu_order WHERE cd_item = $cd_item "; 
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param Item $oItem entity a eliminar.
	 */
	public static function deleteItem(Item $oItem) { 
		$db = CdtDbManager::getConnection(); 

		$cd_item = $oItem->getCd_item();

		$tableName = BOL_TABLE_ITEM;
		
		$sql = "DELETE FROM $tableName WHERE cd_item = $cd_item "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Item]
	 */
	public static function getItems(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_ITEM;
		$tableName2 = BOL_TABLE_NEWSLETTER;

		$sql = "SELECT I.*, N.ds_newsletter FROM $tableName I";
		$sql .= " LEFT JOIN $tableName2 N ON(N.cd_newsletter=I.cd_newsletter) ";
		//TODO left joins
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new ItemFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getItemsCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_ITEM;
		$tableName2 = BOL_TABLE_NEWSLETTER;
		
		$sql = "SELECT count(*) as count FROM $tableName I"; 
		$sql .= " LEFT JOIN $tableName2 N ON(N.cd_newsletter=I.cd_newsletter) ";
		//TODO left joins
		
		$sql .= $oCriteria->buildCriteriaWithoutPaging();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$next = $db->sql_fetchassoc($result);
		$cant = $next['count'];
		$db->sql_freeresult($result);
		return ((int) $cant);
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return Item
	 */
	public static function getItem(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_ITEM;
		$tableName2 = BOL_TABLE_NEWSLETTER;
		
		$sql = "SELECT I.*, N.ds_newsletter FROM $tableName I";
		$sql .= " LEFT JOIN $tableName2 N ON(N.cd_newsletter=I.cd_newsletter) ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new ItemFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}

} 
?>
