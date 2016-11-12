<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class CategoryAttribute implements ArrayAccess {
  static $swaggerTypes = array(
      'name' => 'string',
      'values' => 'array[string]',
      'is_variant' => 'boolean'
  );

  static $attributeMap = array(
      'name' => 'name',
      'values' => 'values',
      'is_variant' => 'isVariant'
  );

  
  /**
  * Nome do atributo
  */
  public $name; /* string */
  /**
  * Lista de domínios para atributos variantes
  */
  public $values; /* array[string] */
  /**
  * Identifica se atributo pode sofrer variações
  */
  public $is_variant; /* boolean */

  public function __construct(array $data = null) {
    $this->name = $data["name"];
    $this->values = $data["values"];
    $this->is_variant = $data["is_variant"];
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
