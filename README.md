# zf1-extensions
Custom extensions of Zend Framework 1:

  - base URL property populated in each form element, used by AJAX-based form elements such as ZendX_JQuery_Form_Element_AutoComplete:
    - Fz_Form
  - unsuitable decorators removed from the following form elements:
    - Fz_Form_Element_Hash
    - Fz_Form_Element_Hidden
    - Fz_Form_Element_Submit
  - resource loader for custom resource, e.g. traits:
    - Fz_Resource_Resourceloader
  - data validation (existence check) against database:
    - Fz_Validate_Db_RecordsExist
    - Fz_Validate_Db_JsonRecordsExist