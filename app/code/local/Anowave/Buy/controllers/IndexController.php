<?php
class Anowave_Buy_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$product = Mage::getModel('catalog/product')->load
		(
			$this->getRequest()->getParam('id')
		);
		
		$cart = Mage::getModel('checkout/cart');
		$cart->init();
		$cart->addProduct($product, array('qty' => 1));
		$cart->save();
		
		Mage::getSingleton('checkout/session')->setCartWasUpdated(true);
		
		/* Redirect to checkout */
		$this->_redirect('checkout/onepage');
	}
	
	/**
	* Check allow or not access to ths page
	*
	* @return bool - is allowed to access this menu
	*/
	protected function _isAllowed()
	{
		return true;
	}
}