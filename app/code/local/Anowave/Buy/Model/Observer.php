<?php
class Anowave_Buy_Model_Observer
{
	public function modify(Varien_Event_Observer $observer)
	{
		if ('addtocart' == $observer->getName())
		{
			$observer->getBlock()->setType('addtocart');
		}
	}
	
	public function insert(Varien_Event_Observer $observer)
	{
		if ('addtocart' == $observer->getBlock()->getType())
		{
			$block = $observer->getBlock()->getLayout()->createBlock('buy/buy')->setTemplate('buy/buy.phtml')->setNameInLayout('buy')->setData(array
			(
				'product' => $observer->getBlock()->getProduct()
			));
			
			$observer->getBlock()->insert($block,'buy', true, 'buy');
		}
	}
}