<?php 

/** 
 * Factory para componentes 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class BOLComponentsFactory { 

	
	public static function getFindObjectCategory(Category $oCategory, $inputId='cd_category_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'CategoryManager' );
		$oFindObject->setRequestMethod( 'getCategory' );
		$oFindObject->setGridModel( 'CategoryGridModel' );
		$oFindObject->setItemCode( 'cd_category' );
		$oFindObject->setItemLabel( 'ds_category' );
		$oFindObject->setItemClass( 'Category' );

		$oFindObject->setItem( $oCategory );
		
		$oFindObject->setFunctionCallback('category_change');
		$oFindObject->setItemAttributesCallback( 'cd_category' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
	public static function getFindObjectContact(Contact $oContact, $inputId='cd_contact_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'ContactManager' );
		$oFindObject->setRequestMethod( 'getContact' );
		$oFindObject->setGridModel( 'ContactGridModel' );
		$oFindObject->setItemCode( 'cd_contact' );
		$oFindObject->setItemLabel( 'cd_contact' );
		$oFindObject->setItemClass( 'Contact' );

		$oFindObject->setItem( $oContact );
		
		$oFindObject->setFunctionCallback('contact_change');
		$oFindObject->setItemAttributesCallback( 'cd_contact' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
	public static function getFindObjectContactCategory(ContactCategory $oContactCategory, $inputId='cd_contact_category_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'ContactCategoryManager' );
		$oFindObject->setRequestMethod( 'getContactCategory' );
		$oFindObject->setGridModel( 'ContactCategoryGridModel' );
		$oFindObject->setItemCode( 'cd_contact_category' );
		$oFindObject->setItemLabel( 'cd_contact_category' );
		$oFindObject->setItemClass( 'ContactCategory' );

		$oFindObject->setItem( $oContactCategory );
		
		$oFindObject->setFunctionCallback('contactcategory_change');
		$oFindObject->setItemAttributesCallback( 'cd_contact_category' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
	public static function getFindObjectContactSendingNewsletter(ContactSendingNewsletter $oContactSendingNewsletter, $inputId='cd_contact_sending_newsletter_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'ContactSendingNewsletterManager' );
		$oFindObject->setRequestMethod( 'getContactSendingNewsletter' );
		$oFindObject->setGridModel( 'ContactSendingNewsletterGridModel' );
		$oFindObject->setItemCode( 'cd_contact_sending_newsletter' );
		$oFindObject->setItemLabel( 'cd_contact_sending_newsletter' );
		$oFindObject->setItemClass( 'ContactSendingNewsletter' );

		$oFindObject->setItem( $oContactSendingNewsletter );
		
		$oFindObject->setFunctionCallback('contactsendingnewsletter_change');
		$oFindObject->setItemAttributesCallback( 'cd_contact_sending_newsletter' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
	public static function getFindObjectImage(Image $oImage, $inputId='cd_image_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'ImageManager' );
		$oFindObject->setRequestMethod( 'getImage' );
		$oFindObject->setGridModel( 'ImageGridModel' );
		$oFindObject->setItemCode( 'cd_image' );
		$oFindObject->setItemLabel( 'cd_image' );
		$oFindObject->setItemClass( 'Image' );

		$oFindObject->setItem( $oImage );
		
		$oFindObject->setFunctionCallback('image_change');
		$oFindObject->setItemAttributesCallback( 'cd_image' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
	public static function getFindObjectImageCategory(ImageCategory $oImageCategory, $inputId='cd_image_category_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'ImageCategoryManager' );
		$oFindObject->setRequestMethod( 'getImageCategory' );
		$oFindObject->setGridModel( 'ImageCategoryGridModel' );
		$oFindObject->setItemCode( 'cd_image_category' );
		$oFindObject->setItemLabel( 'cd_image_category' );
		$oFindObject->setItemClass( 'ImageCategory' );

		$oFindObject->setItem( $oImageCategory );
		
		$oFindObject->setFunctionCallback('imagecategory_change');
		$oFindObject->setItemAttributesCallback( 'cd_image_category' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
	public static function getFindObjectNewsletter(Newsletter $oNewsletter, $inputId='cd_newsletter_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'NewsletterManager' );
		$oFindObject->setRequestMethod( 'getNewsletter' );
		$oFindObject->setGridModel( 'NewsletterGridModel' );
		$oFindObject->setItemCode( 'cd_newsletter' );
		$oFindObject->setItemLabel( 'ds_newsletter' );
		$oFindObject->setItemClass( 'Newsletter' );

		$oFindObject->setItem( $oNewsletter );
		
		$oFindObject->setFunctionCallback('newsletter_change');
		$oFindObject->setItemAttributesCallback( 'cd_newsletter' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
	public static function getFindObjectNewsletterImage(NewsletterImage $oNewsletterImage, $inputId='cd_newsletter_image_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'NewsletterImageManager' );
		$oFindObject->setRequestMethod( 'getNewsletterImage' );
		$oFindObject->setGridModel( 'NewsletterImageGridModel' );
		$oFindObject->setItemCode( 'cd_newsletter_image' );
		$oFindObject->setItemLabel( 'cd_newsletter_image' );
		$oFindObject->setItemClass( 'NewsletterImage' );

		$oFindObject->setItem( $oNewsletterImage );
		
		$oFindObject->setFunctionCallback('newsletterimage_change');
		$oFindObject->setItemAttributesCallback( 'cd_newsletter_image' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
	public static function getFindObjectSendingNewsletter(SendingNewsletter $oSendingNewsletter, $inputId='cd_sending_newsletter_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'SendingNewsletterManager' );
		$oFindObject->setRequestMethod( 'getSendingNewsletter' );
		$oFindObject->setGridModel( 'SendingNewsletterGridModel' );
		$oFindObject->setItemCode( 'cd_sending_newsletter' );
		$oFindObject->setItemLabel( 'cd_sending_newsletter' );
		$oFindObject->setItemClass( 'SendingNewsletter' );

		$oFindObject->setItem( $oSendingNewsletter );
		
		$oFindObject->setFunctionCallback('sendingnewsletter_change');
		$oFindObject->setItemAttributesCallback( 'cd_sending_newsletter' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
	public static function getFindObjectStatus(Status $oStatus, $inputId='cd_status_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'StatusManager' );
		$oFindObject->setRequestMethod( 'getStatus' );
		$oFindObject->setGridModel( 'StatusGridModel' );
		$oFindObject->setItemCode( 'cd_status' );
		$oFindObject->setItemLabel( 'cd_status' );
		$oFindObject->setItemClass( 'Status' );

		$oFindObject->setItem( $oStatus );
		
		$oFindObject->setFunctionCallback('status_change');
		$oFindObject->setItemAttributesCallback( 'cd_status' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
	public static function getFindObjectTemplate(Template $oTemplate, $inputId='cd_template_autocomplete', $required=true, $required_msg=""){
		$oFindObject = new CMPFindObject();

		$oFindObject->setInputName( $inputId );
		$oFindObject->setInputId( $inputId );
		$oFindObject->setRequestClass( 'TemplateManager' );
		$oFindObject->setRequestMethod( 'getTemplate' );
		$oFindObject->setGridModel( 'TemplateGridModel' );
		$oFindObject->setItemCode( 'cd_template' );
		$oFindObject->setItemLabel( 'cd_template' );
		$oFindObject->setItemClass( 'Template' );

		$oFindObject->setItem( $oTemplate );
		
		$oFindObject->setFunctionCallback('template_change');
		$oFindObject->setItemAttributesCallback( 'cd_template' );
		
		$oFindObject->setObligatorio( $required );
		$oFindObject->setMsgObligatorio( $required_msg );
		
		return $oFindObject;
	}	
	
} 
?>
