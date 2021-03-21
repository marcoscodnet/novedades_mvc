<?php

/**
 * Utilidades para seguridad.
 *
 * @author bernardo
 * @since 01-06-2011
 */
class BOLUtils{

	
public static function getFilterOptionItems( $oManager, $valueProperty, $labelProperty, $alias=null ){
	
		$oCriteria = new CdtSearchCriteria();
		if ($alias) {
			$oCriteria->addOrder($alias.'.'.$labelProperty, "ASC");
		}
		else $oCriteria->addOrder($labelProperty, "ASC");
		
		$entities = $oManager->getEntities( $oCriteria );
	
		$items = array();
		foreach ($entities as $oEntity ) {
			$value = CdtReflectionUtils::doGetter( $oEntity, $valueProperty );
			$label = CdtReflectionUtils::doGetter( $oEntity, $labelProperty );
			$items[ $value ] = $label; 
		}
		return $items;
	}
	
	public static function getCategoryItems(){
	
		return self::getFilterOptionItems( new CategoryManager(), "cd_category", "ds_category");
		
	}
	
	public static function getContactItems(){
	
		return self::getFilterOptionItems( new ContactManager(), "cd_contact", "ds_contact");
		
	}
	
	public static function getNewsletterItems(){
	
		return self::getFilterOptionItems( new NewsletterManager(), "cd_newsletter", "ds_newsletter");
		
	}
	
	public static function getStatusItems(){
	
		return self::getFilterOptionItems( new StatusManager(), "cd_status", "ds_status");
		
	}
	
	
	
	
	
	
	
	public static function getYesNoItems(){
		return array( "no" => "No" , "yes" => "Si" );
	}
	
	public static function formatDateToView( $value ){
    
    	if(!empty( $value ))
    		$dt =  date("d/m/Y",CdtDateUtils::mysqlDateToPHP( $value ) )  ;
    	else
    		$dt = "";
    		
    	return $dt;		
    }

	public static function formatDateToPersist( $value ){
    
    	if(!empty( $value ))
    		$dt =  CdtDateUtils::datePHPToMysqlDate( "d/m/Y", $value );
    	else
    		$dt = "";
    		
    	return $dt;		
    }
    
	public static function formatDateTimeToView( $value ){
    
    	if(!empty( $value ))
    		$dt =  CdtDateUtils::fechaHoraMysqlaPHP( $value )   ;
    	else
    		$dt = "";
    		
    	return $dt;		
    }

	public static function formatDateTimeToPersist( $value ){
    
    	if(!empty( $value ))
    		$dt =  CdtDateUtils::fechaHoraPHPddmmyyaMysql( $value );
    	else
    		$dt = "";
    		
    	return $dt;		
    }
    
	public static function getAcreditedOwedItems(){
		return array( -1 => "Adeuda" , 1 => "Acredita" );
	}
	
	public static function Format_toDecimal( $pNum ){
		if ( is_null($pNum) ) {
			return( '0,00' );
		}else{
			return( trim( number_format($pNum, 2, ',', '.') ) );
		}
	}
	
	public static function validEmail($email)
	{
 

	// Primero, checamos que solo haya un símbolo @, y que los largos sean correctos
	  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) 
		{
			// correo inválido por número incorrecto de caracteres en una parte, o número incorrecto de símbolos @
	    return false;
	  }
	  // se divide en partes para hacerlo más sencillo
	  $email_array = explode("@", $email);
	  $local_array = explode(".", $email_array[0]);
	  for ($i = 0; $i < sizeof($local_array); $i++) 
		{
	    if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) 
			{
	      return false;
	    }
	  } 
	  // se revisa si el dominio es una IP. Si no, debe ser un nombre de dominio válido
		if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) 
		{ 
	     $domain_array = explode(".", $email_array[1]);
	     if (sizeof($domain_array) < 2) 
			 {
	        return false; // No son suficientes partes o secciones para se un dominio
	     }
	     for ($i = 0; $i < sizeof($domain_array); $i++) 
			 {
	        if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) 
					{
	           return false;
	        }
	     }
	  }
  		return true;
	}
	
/**
     * log en el archivo destinado a mensajes de debug.
     * @param string $msg mensajes a loguear
     */
    public static function log_import($msg, $class=__CLASS__) {

        	$oUser = CdtSecureUtils::getUserLogged();	
            $nameFile = date('Ymd') . '_importados_'.$oUser->getCd_user();
            $dt = date('Y-m-d G:i:s');

            $_Log = fopen(APP_PATH . "logs/" . $nameFile . ".log", "a+") or die("Operation Failed!");

            fputs($_Log, $dt . " --> " . $msg . "\n");

            fclose($_Log);
        	
        
    }
    
	public static function sendMailPop($nameFrom, $from, $nameTo, $to, $subject, $msg, $attach, $CustomHeaderArray) {


        require_once(CDT_EXTERNAL_LIB_PATH . "mailer/class.phpmailer.php");
        require_once(CDT_EXTERNAL_LIB_PATH . "mailer/class.smtp.php");


        //para que no de la salida del mailer.
        ob_start();

        $mail = new PHPMailer();

        $mail->From = $from;
        $mail->FromName = $nameFrom;
        $mail->Host = CDT_POP_MAIL_HOST;
        $mail->Mailer = CDT_POP_MAIL_MAILER;
        $mail->Username = CDT_POP_MAIL_USERNAME;
        $mail->Password = CDT_POP_MAIL_PASSWORD;
        $mail->SMTPAuth = true;
        $mail->Subject = $subject;
        
        $mail->PluginDir = CDT_EXTERNAL_LIB_PATH."/mailer/";
		$mail->Sender = CDT_POP_MAIL_USERNAME;
		$mail->AddReplyTo($from);
		$mail->IsHTML(true);
		
		$body = $msg;

        $mail->Body = $body;
        $mail->AltBody = $body;

        $mail->AddAddress($to, $nameTo);
		if ($attach) {
			$mail->AddAttachment($attach);
		}
		if (count($CustomHeaderArray)) {
			foreach ($CustomHeaderArray as $key => $value) {
				$mail->AddCustomHeader($key.':'.$value);
			}
		}
        
        if (!$mail->Send())
            throw new GenericException("Ocurri� un error en el env�o del mail a $nameTo <$to>");

        // Clear all addresses and attachments for next loop
        $mail->ClearAddresses();
        $mail->ClearAttachments();

        //para que no de la salida del mailer.
        ob_end_clean();
    }

    public static function sendMail($nameFrom, $from, $nameTo, $to, $subject, $msg, $attach='', $CustomHeaderArray=array()) {

    	//FIXME para tests todos los mails me los env�o a mi.
    	//$to = "marcospinero@yahoo.com.ar";
    	
        if (CDT_MAIL_ENVIO_POP)
            self::sendMailPop($nameFrom, $from, $nameTo, $to, $subject, $msg, $attach, $CustomHeaderArray);
        else {

            //para que no de la salida del mailer.
            ob_start();

            $to2 = $nameTo . " <" . $to . ">";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: " . $from;

            if (!mail($to2, $subject, $msg, $headers)){
                self::log_error("Ocurri� un error en el env�o del mail a $to2") ;
            	throw new GenericException("Ocurri� un error en el env�o del mail a $to2");
            }
            //para que no de la salida del mailer.
            ob_end_clean();
        }
    }
    
    public static Function between_strings($content,$start,$end){
	    $r = explode($start, $content);
	    if (isset($r[1])){
	        $r = explode($end, $r[1]);
	        return $r[0];
	    }
	    return '';
	} 
	
	/**
     * log en el archivo destinado a mensajes de bounce.
     * @param string $msg mensajes a loguear
     */
    public static function log_bounce($msg, $class=__CLASS__) {

       
            $nameFile = date('Ymd') . '_bounces';
            $dt = date('Y-m-d G:i:s');

            $_Log = fopen(APP_PATH . "logs/" . $nameFile . ".log", "a+") or die("Operation Failed!");

            fputs($_Log, $dt . " --> " . $msg . "\n");

            fclose($_Log);
        	
      
        
    }
    
	/**
     * log en el archivo destinado a mensajes de mails erroneos.
     * @param string $msg mensajes a loguear
     */
    public static function log_mail_error($msg, $class=__CLASS__) {

       
            $nameFile = date('Ymd') . '_mails_erroneos';
            $dt = date('Y-m-d G:i:s');

            $_Log = fopen(APP_PATH . "logs/" . $nameFile . ".log", "a+") or die("Operation Failed!");

            fputs($_Log, $dt . " --> " . $msg . "\n");

            fclose($_Log);
        	
      
        
    }
	
}
