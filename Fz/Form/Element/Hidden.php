<?php

/**
 * @category   Fz
 * @package    Fz_Form
 * @version    2015-09-11
 */
/**
 * @see Zend_Form_Element_Hidden
 */
require_once 'Zend/Form/Element/Hidden.php';

/**
 * Hides unsuitable decorators from hidden form elements (label, dt and dd).
 *
 * @category   Fz
 * @package    Fz_Form
 * @uses       Zend_Form_Element_Hidden
 * @link       https://juriansluiman.nl/article/106/hide-hidden-zend_form-elements
 * @link       http://stackoverflow.com/questions/481871/zend-framework-how-do-i-remove-the-decorators-on-a-zend-form-hidden-element
 */
class Fz_Form_Element_Hidden extends Zend_Form_Element_Hidden {

	public function render(Zend_View_Interface $view = null) {
		$this->removeDecorator('Label');
		$this->removeDecorator('HtmlTag');
		return parent::render($view);
	}

}
