<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class SellerItemStatus implements ArrayAccess {
  static $swaggerTypes = array(
      'active' => 'boolean',
      'site' => 'string'
  );

  static $attributeMap = array(
      'active' => 'active',
      'site' => 'site'
  );

  
  /**
  * Indica se o produto está ativo 'TRUE' (à venda no MP) ou não 'FALSE'
  */
  public $active; /* boolean */
  /**
  * Site para o qual o status é considerado. Os possíveis sites são: 'EX','PF','CB', 'EH', 'BT', 'CD'.
  */
  public $site; /* string */

  public function __construct(array $data = null) {
    $this->active = $data["active"];
    $this->site = $data["site"];
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
