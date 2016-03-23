<?php

/**
 * @category   Fz
 * @package    Fz_Resource
 * @version    2016-01-21
 */
/**
 * @see Zend_Application_Resource_ResourceAbstract
 */
require_once 'Zend/Application/Resource/ResourceAbstract.php';

// http://stackoverflow.com/questions/10357846/how-to-add-a-resource-type-via-application-ini

/**
 * Adds a resource loader, resources can be loaded also via application.ini.
 *
 * @category   Fz
 * @package    Fz_Resource
 * @uses       Zend_Application_Resource_ResourceAbstract
 * @link       http://stackoverflow.com/questions/10357846/how-to-add-a-resource-type-via-application-ini
 */
class Fz_Resource_Resourceloader extends Zend_Application_Resource_ResourceAbstract {
	
    public function init() {
		
        $options = $this->getOptions();

        /* @var $resourceLoader Zend_Loader_Autoloader_Resource */
        $resourceLoader = $this->getBootstrap()->getResourceLoader();
		
        foreach ($options as $method => $params) {
            if (method_exists($resourceLoader, $method)) {
                call_user_func_array(array($resourceLoader, $method), $params);
            }
        }
		
    }
	
}