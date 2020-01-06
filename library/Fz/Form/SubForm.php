<?php

/**
 * @category   Fz
 * @package    Fz_Form
 * @version    2020-01-06
 */
/**
 * @see Zend_Form_SubForm
 */
require_once 'Zend/Form/SubForm.php';

/**
 * Adds label to subform.
 *
 * @category   Fz
 * @package    Fz_Form
 * @uses       Zend_Form_SubForm
 * @link       http://zend-framework-community.634137.n4.nabble.com/SubForm-quot-Label-quot-td656049.html
 */
class Fz_Form_SubForm extends Zend_Form_SubForm
{

    /**
     * @var string
     */
    protected $_label;

    public function setLabel($label)
    {
        $this->_label = $label;
        return $this->_label;
    }

    public function getLabel()
    {
        return $this->_label;
    }

    public function isRequired()
    {
        return false;
    }

    public function loadDefaultDecorators()
    {
        parent::loadDefaultDecorators();
        $this->removeDecorator('DtDdWrapper');
        $this->addDecorator('Label', array('tag' => 'dt'));
    }
}