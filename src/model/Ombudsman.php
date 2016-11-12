<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Ombudsman implements ArrayAccess {
  static $swaggerTypes = array(
      'active' => 'boolean',
      'source' => 'string',
      'created_at' => 'DateTime'
  );

  static $attributeMap = array(
      'active' => 'active',
      'source' => 'source',
      'created_at' => 'createdAt'
  );

  
  /**
  * Quando for 'true' se o protocolo estiver na Ouvidoria, e 'false' se não estiver
  */
  public $active; /* boolean */
  /**
  * Quando um protocolo está como ouvidoria com valor 'true' os possíveis valores são: Facebook / Procon / Reclameaqui / Twitter / Outros.
  */
  public $source; /* string */
  /**
  * Data de entrada na Ouvidoria
  */
  public $created_at; /* DateTime */

  public function __construct(array $data = null) {
    $this->active = $data["active"];
    $this->source = $data["source"];
    $this->created_at = $data["created_at"];
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
