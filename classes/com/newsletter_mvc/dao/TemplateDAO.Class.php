<?php 

/** 
 * DAO para Template 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class TemplateDAO { 

	/**
	 * se persiste la nueva entity
	 * @param Template $oTemplate entity a persistir.
	 */
	public static function addTemplate(Template $oTemplate) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_template = $oTemplate->getDs_template();
		
		$ds_path = $oTemplate->getDs_path();
		
		
		$nu_image =  CdtFormatUtils::ifEmpty( $oTemplate->getNu_image(), 'null' );
		
		$img_header = $oTemplate->getImg_header();
		
		$img_footer = $oTemplate->getImg_footer();
		
		$tableName = BOL_TABLE_TEMPLATE;
		
		$sql = "INSERT INTO $tableName (ds_template, ds_path, nu_image, img_footer, img_header) VALUES('$ds_template', '$ds_path', $nu_image, '$img_footer', '$img_header')"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oTemplate->setCd_template( $cd );
	}


	/**
	 * se modifica la entity
	 * @param Template $oTemplate entity a modificar.
	 */
	public static function updateTemplate(Template $oTemplate) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_template = $oTemplate->getDs_template();
		
		$ds_path = $oTemplate->getDs_path();
		
		
		$cd_template = CdtFormatUtils::ifEmpty( $oTemplate->getCd_template(), 'null' );
		
		$nu_image = CdtFormatUtils::ifEmpty( $oTemplate->getNu_image(), 'null' );
		
		$img_header = $oTemplate->getImg_header();
		
		$img_footer = $oTemplate->getImg_footer();

		$tableName = BOL_TABLE_TEMPLATE;
		
		$sql = "UPDATE $tableName SET ds_template = '$ds_template', ds_path = '$ds_path', nu_image = $nu_image, img_header = '$img_header', img_footer = '$img_footer' WHERE cd_template = $cd_template "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param Template $oTemplate entity a eliminar.
	 */
	public static function deleteTemplate(Template $oTemplate) { 
		$db = CdtDbManager::getConnection(); 

		$cd_template = $oTemplate->getCd_template();

		$tableName = BOL_TABLE_TEMPLATE;
		
		$sql = "DELETE FROM $tableName WHERE cd_template = $cd_template "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Template]
	 */
	public static function getTemplates(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_TEMPLATE;

		$sql = "SELECT * FROM $tableName ";
		//TODO left joins
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new TemplateFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getTemplatesCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_TEMPLATE;
		
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
	 * @return Template
	 */
	public static function getTemplate(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_TEMPLATE;
		
		$sql = "SELECT * FROM $tableName ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new TemplateFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}

} 
?>
