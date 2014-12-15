<?php
class Anowave_Buy_Block_View extends Mage_Catalog_Block_Product_View
{
	public function getChildHtml($name = '', $useCache = true, $sorted = false)
    {
    	Mage::dispatchEvent('get_child_html', array
    	(
    		'name' 		=> $name,
    		'layout' 	=> $this->getLayout(),
    		'block' 	=> $this->getChild($name)
    	));
    	
    	return parent::getChildHtml($name, $useCache, $sortOrder);
    }
}