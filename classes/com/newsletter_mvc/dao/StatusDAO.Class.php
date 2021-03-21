<?php 

/** 
 * DAO para Status 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class StatusDAO { 

	/**
	 * se persiste la nueva entity
	 * @param Status $oStatus entity a persistir.
	 */
	public static function addStatus(Status $oStatus) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_status = $oStatus->getDs_status();
		
		
		
		$tableName = BOL_TABLE_STATUS;
		
		$sql = "INSERT INTO $tableName (ds_status) VALUES('$ds_status')"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oStatus->setCd_status( $cd );
	}


	/**
	 * se modifica la entity
	 * @param Status $oStatus entity a modificar.
	 */
	public static function updateStatus(Status $oStatus) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_status = $oStatus->getDs_status();
		
		
		$cd_status = CdtFormatUtils::ifEmpty( $oStatus->getCd_status(), 'null' );
		
		

		$tableName = BOL_TABLE_STATUS;
		
		$sql = "UPDATE $tableName SET ds_status = '$ds_status' WHERE cd_status = $cd_status "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param Status $oStatus entity a eliminar.
	 */
	public static function deleteStatus(Status $oStatus) { 
		$db = CdtDbManager::getConnection(); 

		$cd_status = $oStatus->getCd_status();

		$tableName = BOL_TABLE_STATUS;
		
		$sql = "DELETE FROM $tableName WHERE cd_status = $cd_status "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Status]
	 */
	public static function getStates(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_STATUS;

		$sql = "SELECT * FROM $tableName ";
		//TODO left joins
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new StatusFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getStatesCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_STATUS;
		
		$sql = "SELECT count(*) as count FROM $tableName "; 
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
	 * @return Status
	 */
	public static function getStatus(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_STATUS;
		
		$sql = "SELECT * FROM $tableName ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new StatusFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}

} 
?>
