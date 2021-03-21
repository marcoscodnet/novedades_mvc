<?php

class ListCategoriesToSendAction  extends CdtOutputAction {
	
	protected $oGrid;
	
	protected function getLayout(){
		$oLayout = new CdtLayoutBasicAjax();
		return $oLayout;
	}
	

		
	protected function buildGrid(){
		$oGrid = $this->getNewGrid();
		
		//obtenemos el modelo de la grilla y el renderer
		$oGridModel = $this->getGridModel(  );
		$oGridRenderer = $this->getGridRenderer( $oGrid );
		
		//creamos el criteria y obtenemos las entities.
		$oCriteria = $this->getCdtSearchCriteria( $oGrid, $oGridModel );
		$oManager = $oGridModel->getEntityManager();
		$entities = $oManager->getEntities ( $oCriteria );
		$totalRows = $oManager->getEntitiesCount (  $oCriteria );
		
		//les seteamos el resultado al modelo.
		$oGridModel->setEntities( $entities );
		$oGridModel->setTotalRows( $totalRows );

		$oGrid->setGridModel( $oGridModel );
		$oGrid->setCriteria( $oCriteria );
		$oGrid->setGridRenderer( $oGridRenderer );

		$this->oGrid = $oGrid;
		return $oGrid;
	}
	
	protected function getOutputContent(){

		try{
			
			$oGrid = $this->buildGrid();
			//$oGrid->show();
			return $oGrid->show();
			
		}catch(GenericException $ex){
			
			 CdtUtils::log_error ( "ERROR =>" . $ex->getMessage() );
			
		}
		return "";
	}

	
	
	public function getOutputTitle(){
		if( $this->oGrid != null )
			return $this->oGrid->getTitle();
		else "error";
	}

		
		
	protected function getGridModel(  ){
		$gridModelClazz  =  'CategoryGridModel' ;
		return CdtReflectionUtils::newInstance( $gridModelClazz );
	}
	
	
	
	protected function getCdtSearchCriteria( CMPGrid $oGrid, GridModel $oGridModel ){
	
        $gridId = 'cd_category';

        //recuperamos los par�metros.
        $filterValue = CdtUtils::getParam("filterValue_$gridId", "");
        $page = CdtUtils::getParam("page_$gridId", 1);
        $orderType = CdtUtils::getParam("orderType_$gridId", "DESC");
        $orderField = CdtUtils::getParam("orderField_$gridId", $oGridModel->getDefaultOrderField());
        $filterField = CdtUtils::getParam("filterField_$gridId", "");

        //armamos el criteria
        $oCriteria = new CdtSearchCriteria();

        if (empty($filterField))
        	$filterField = $oGridModel->getDefaultFilterField();
        	
		//agregamos cada filter que tenga valor.
        for ($index = 0; $index < $oGridModel->getFiltersCount(); $index++) {

            $oFilterModel = $oGridModel->getFilterModel($index);

            $name = $oFilterModel->getDs_name();
            $field = $oFilterModel->getDs_sqlField();
            if (empty($field))
                $field = $oFilterModel->getDs_field();

        	$value = utf8_decode($oFilterModel->getDs_value());
			
            if(empty($value)){
               	//el get convierte "." por "_" as� que lo convertimos.
            	$value = utf8_decode(CdtUtils::getParam(str_replace(".", "_", $name) . "_" . $gridId, "","",false));
        	}			
            $this->addSelectedFilter($oCriteria, $field, $value, $oFilterModel);
            
            
            //agregamos el filtro por default.
            if( ($name == $filterField) ){
	        	$this->addSelectedFilter($oCriteria, $field, $filterValue, $oFilterModel);            	
            }
            
            
        }
        
        $oCriteria->addOrder($orderField, $orderType);
        $oCriteria->setPage($page);
        $oCriteria->setRowPerPage(ROW_PER_PAGE);
		
        
        $oGridModel->enhanceCriteria( $oCriteria );
        
        return $oCriteria;
    }

	/**
     * se agrega el filtro seleccionado
     * @param CdtSearchCriteria $oCriteria criterio de b�squeda
     * @param string $filterField campo por el cual filtrar
     * @param string $filterValue valor a filtrar
     */
    protected function addSelectedFilter(CdtSearchCriteria $oCriteria, $filterField, $filterValue, GridFilterModel $oFilterModel) {
        
		if( $filterValue == "yes"){
			
			$ds_operator = $oFilterModel->getDs_operator();
			$oCriteriaFormat = $oFilterModel->getCriteriaFormatValue();
        	$oCriteria->addFilter($filterField, 1, $ds_operator , $oCriteriaFormat );
        	
		}elseif( $filterValue == "no"){
			
			$ds_operator = $oFilterModel->getDs_operator();
			$oCriteriaFormat = $oFilterModel->getCriteriaFormatValue();
        	$oCriteria->addFilter($filterField, 0, $ds_operator , $oCriteriaFormat );
        	
		}elseif( $filterValue==-1){
			
			return;
			
		}elseif (!empty($filterValue) ) {
        	
        	//$filterValue = $oFilterModel->getFormat()->format( $filterValue );
        	$ds_operator = $oFilterModel->getDs_operator();
        	$oCriteriaFormat = $oFilterModel->getCriteriaFormatValue();
        	$oCriteria->addFilter($filterField, $filterValue, $ds_operator , $oCriteriaFormat );

       }
    }
	
	protected function getGridRenderer( $oGrid ){
		
		$renderer = CdtReflectionUtils::newInstance( BOL_NEWSLETTER_POPUP_MULTIPLE_CATEGORIES );
		
		return $renderer;
		
	}
	
	protected function getNewGrid(){
		$oGrid =  new CMPGrid();
		//$inputId = CdtUtils::getParam("inputId", CdtUtils::getParam("id"));
		$oGrid->setId( 'cd_category' );
		return $oGrid;	
	}
	
}
?>
