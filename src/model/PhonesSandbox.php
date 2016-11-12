<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class PhonesSandbox implements ArrayAccess {
  static $swaggerTypes = array(
      'mobile' => 'string',
      'home' => 'string',
      'office' => 'string'
  );

  static $attributeMap = array(
      'mobile' => 'mobile',
      'home' => 'home',
      'office' => 'office'
  );

  
  /**
  * Telefone celular do cliente
  */
  public $mobile; /* string */
  /**
  * Telefone residencial do cliente
  */
  public $home; /* string */
  /**
  * Telefone de trabalho do cliente
  */
  public $office; /* string */

  public function __construct(array $data = null) {
    $this->mobile = $data["mobile"];
    $this->home = $data["home"];
    $this->office = $data["office"];
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
