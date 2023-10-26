<?php
// no direct access
defined('_JEXEC') or die;


class plgsystemWhatsappbuttonAgs extends JPlugin {
	protected $app;
	function onAfterRender(){
		// validando Clientes
		$app = JFactory::getApplication();
		if ($app->isClient("administrator")) {
         return;
  }
	$body = $this->app->getBody();
	// add html
	$html='<div class="floating-wpp"></div>';
	$body = str_replace('</body>',  $html .  '</body>', $body );
	$this->app->setBody($body);
}
// end
function onBeforeRender(){
	 $doc = JFactory::getDocument();
	 // params
	 $numberphone   = $this->params->get('numberphone');
	 $msj           = $this->params->get('msj');
	 $headerTitle   = $this->params->get('headerTitle');
	 $popup         = $this->params->get('popup');
	 $position      = $this->params->get('position');
   // validando
	 if ($popup==0 ) {
	 	$popup = "true";
	 }
   if ($popup==1 ) {
	 	$popup = "false";
	 }

	 // position
	 if ($position==0 ) {
	 	$position = "right";
	 }

	 if ($position==1 ) {
	 $position = "Left";
	}

	// add style
	$doc->addStyleSheet('plugins/system/whatsappbuttonags/assets/floating-wpp.min.css');
	// add script
	$doc->addScript('plugins/system/whatsappbuttonags/assets/floating-wpp.min.js');
	// jquery
	JHtml::_('jquery.framework');
	$doc->addScriptDeclaration("
	$(function () {
        $('.floating-wpp').floatingWhatsApp({
            phone: '$numberphone',
            popupMessage: '$msj ',
            showPopup:$popup,
            position: '$position',
            //autoOpen: false,
            //autoOpenTimer: 4000,
            message: 'Your message to send!',
            //headerColor: 'orange',
            headerTitle: '$headerTitle ',
        });
    });

	");











}



}
