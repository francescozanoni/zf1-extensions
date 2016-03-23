<?php

/**
 * @category   Fz
 * @package    Fz_Validate
 * @version    2015-09-09
 */
/**
 * @see Zend_Json
 * @see Fz_Validate_Db_RecordsExist
 */
require_once 'Zend/Json.php';
require_once 'Fz/Validate/Db/RecordsExist.php';

/**
 * Confirms a set of records in JSON array format exists in a table.
 *
 * @category   Fz
 * @package    Fz_Validate
 * @uses       Fz_Validate_Db_RecordsExist
 */
class Fz_Validate_Db_JsonRecordsExist extends Fz_Validate_Db_RecordsExist {

	public function isValid($values) {
		return parent::isValid(Zend_Json::decode($values));
	}

}
