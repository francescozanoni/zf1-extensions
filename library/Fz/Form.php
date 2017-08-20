<?php

/**
 * @category   Fz
 * @package    Fz_Form
 * @version    2017-08-20
 */
/**
 * @see Zend_Form
 */
require_once 'Zend/Form.php';
require_once 'Zend/Controller/Front.php';

/**
 * Makes Fz form elements preceed Zend form elements when invoking form elements
 * via generic calls such as $form->addElement('hidden', 'id').
 * It also populates base URL form property, which is used by AJAX-based form
 * elements such as ZendX_JQuery_Form_Element_AutoComplete.
 *
 * @category   Fz
 * @package    Fz_Form
 * @uses       Zend_Form
 * @uses       Zend_Controller_Front
 */
class Fz_Form extends Zend_Form {

	protected $_baseUrl = '';

	public function __construct($options = null) {
		$this->addPrefixPath('Fz_Form_', 'Fz/Form/');
		$this->_baseUrl = Zend_Controller_Front::getInstance()->getBaseUrl();
		parent::__construct($options);
	}

}
