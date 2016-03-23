<?php

/**
 * @category   Fz
 * @package    Fz_Form
 * @version    2015-09-11
 */
/**
 * @see Zend_Form_Element_Hash
 */
require_once 'Zend/Form/Element/Hash.php';

/**
 * Hides unsuitable decorators from hash form elements (label, dt and dd).
 *
 * @category   Fz
 * @package    Fz_Form
 * @uses       Zend_Form_Element_Hash
 * @link       https://juriansluiman.nl/article/106/hide-hidden-zend_form-elements
 * @link       http://stackoverflow.com/questions/481871/zend-framework-how-do-i-remove-the-decorators-on-a-zend-form-hidden-element
 */
class Fz_Form_Element_Hash extends Zend_Form_Element_Hash {

	public function render(Zend_View_Interface $view = null) {
		$this->removeDecorator('Label');
		$this->removeDecorator('HtmlTag');
		return parent::render($view);
	}

}
