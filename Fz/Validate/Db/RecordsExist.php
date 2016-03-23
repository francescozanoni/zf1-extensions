<?php

/**
 * @category   Fz
 * @package    Fz_Validate
 * @version    2015-09-09
 */
/**
 * @see Zend_Validate_Db_Abstract
 */
require_once 'Zend/Validate/Db/Abstract.php';

/**
 * Confirms a set of records exists in a table.
 *
 * @category   Fz
 * @package    Fz_Validate
 * @uses       Zend_Validate_Db_Abstract
 */
class Fz_Validate_Db_RecordsExist extends Zend_Validate_Db_Abstract {

	/**
	 * Error constants
	 */
	const ERROR_NOT_ALL_RECORDS_FOUND = 'notAllRecordsFound';

	/**
	 * @var array Message templates
	 */
	protected $_messageTemplates = array(
		self::ERROR_NOT_ALL_RECORDS_FOUND => "Not all records matching '%value%' were found",
	);

	/**
	 * Gets the select object to be used by the validator.
	 * If no select object was supplied to the constructor,
	 * then it will auto-generate one from the given table,
	 * schema, field, and adapter options.
	 *
	 * @return Zend_Db_Select The Select object which will be used
	 */
	public function getSelect() {
		if (null === $this->_select) {
			$db = $this->getAdapter();
			/**
			 * Build select object
			 */
			$select = new Zend_Db_Select($db);
			$select->from($this->_table, array(new Zend_Db_Expr('COUNT(*)'), $this->_schema));
			$select->where($db->quoteIdentifier($this->_field, true) . ' IN (?)', $this->_value); // positional, not named
			$this->_select = $select;
		}
		return $this->_select;
	}

	/**
	 * Run query and returns amount of matches found.
	 *
	 * @param  Array $value
	 * @return Amount of matches found.
	 */
	protected function _query($value) {
		if (is_array($value) === false) {
			return 0;
		}

		$select = $this->getSelect();
		/**
		 * Run query
		 */
		$result = $select->getAdapter()->fetchOne($select);

		return intval($result);
	}

	public function isValid($value) {
		$valid = true;
		$this->_setValue($value);

		$result = $this->_query($value);
		if ($result < count($value)) {
			$valid = false;
			$this->_error(self::ERROR_NOT_ALL_RECORDS_FOUND);
		}

		return $valid;
	}

}
