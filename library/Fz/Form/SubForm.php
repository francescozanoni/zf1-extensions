<?php

/**
 * @category   Fz
 * @package    Fz_Form
 * @version    2020-01-05
 */
/**
 * @see Zend_Form
 */
require_once 'Fz/Form.php';

/**
 * Adds label to subform.
 *
 * @category   Fz
 * @package    Fz_Form
 * @uses       Fz_Form
 * @link       http://zend-framework-community.634137.n4.nabble.com/SubForm-quot-Label-quot-td656049.html
 */
class Fz_Form_SubForm extends Fz_Form
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