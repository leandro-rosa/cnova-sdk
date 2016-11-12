<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class MetadataEntry implements ArrayAccess {
  static $swaggerTypes = array(
      'key' => 'string',
      'value' => 'object'
  );

  static $attributeMap = array(
      'key' => 'key',
      'value' => 'value'
  );

  
  /**
  * Chave de identificação do atributo
  */
  public $key; /* string */
  /**
  * Valor do atributo
  */
  public $value; /* string */

  public function __construct(array $data = null) {
    $this->key = $data["key"];
    $this->value = $data["value"];
  }

  public function offsetExists($offset) {
    return isset($this->$offset);
  }

  public function offsetGet($offset) {
    return $this->$offset;
  }

  public function offsetSet($offset, $value) {
    $this->$offset = $value;
  }

  public function offsetUnset($offset) {
    unset($this->$offset);
  }
}
