<?php

/**
 * @category   Fz
 * @package    Fz_Validate
 * @version    2019-04-04
 */

/** @see Zend_Validate_Abstract */
require_once 'Zend/Validate/Abstract.php';

/**
 * Confirms a value does not match another.
 *
 * @category   Fz
 * @package    Fz_Validate
 * @uses       Zend_Validate_Abstract
 */
class Fz_Validate_NotIdentical extends Zend_Validate_Abstract
{
    /**
     * Error codes
     * @const string
     */
    const SAME      = 'same';
    const MISSING_TOKEN = 'missingToken';

    /**
     * Error messages
     * @var array
     */
    protected $_messageTemplates = array(
        self::SAME      => "The two given tokens match",
        self::MISSING_TOKEN => 'No token was provided to match against',
    );

    /**
     * @var array
     */
    protected $_messageVariables = array(
        'token' => '_tokenString'
    );

    /**
     * Original token against which to validate
     * @var string
     */
    protected $_tokenString;
    protected $_token;
    protected $_strict = true;

    /**
     * Sets validator options
     *
     * @param mixed $token
     */
    public function __construct($token = null)
    {
        if ($token instanceof Zend_Config) {
            $token = $token->toArray();
        }

        if (is_array($token) && array_key_exists('token', $token)) {
            if (array_key_exists('strict', $token)) {
                $this->setStrict($token['strict']);
            }

            $this->setToken($token['token']);
        } else if (null !== $token) {
            $this->setToken($token);
        }
    }

    /**
     * Retrieve token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->_token;
    }

    /**
     * Set token against which to compare
     *
     * @param  mixed $token
     * @return Fz_Validate_NotIdentical
     */
    public function setToken($token)
    {
        $this->_tokenString = $token;
        $this->_token       = $token;
        return $this;
    }

    /**
     * Returns the strict parameter
     *
     * @return boolean
     */
    public function getStrict()
    {
        return $this->_strict;
    }

    /**
     * Sets the strict parameter
     *
     * @param  mixed $strict
     * @return Fz_Validate_NotIdentical
     */
    public function setStrict($strict)
    {
        $this->_strict = (boolean) $strict;
        return $this;
    }

    /**
     * Defined by Zend_Validate_Interface
     *
     * Returns true if and only if a token has been set and the provided value
     * does not match that token.
     *
     * @param  mixed $value
     * @param  array $context
     * @return boolean
     */
    public function isValid($value, $context = null)
    {
        $this->_setValue($value);

        if (($context !== null) && isset($context) && array_key_exists($this->getToken(), $context)) {
            $token = $context[$this->getToken()];
        } else {
            $token = $this->getToken();
        }

        if ($token === null) {
            $this->_error(self::MISSING_TOKEN);
            return false;
        }

        $strict = $this->getStrict();
        if (($strict && ($value === $token)) || (!$strict && ($value == $token))) {
            $this->_error(self::SAME);
            return false;
        }

        return true;
    }
}
