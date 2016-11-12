<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class UserReference implements ArrayAccess {
  static $swaggerTypes = array(
      'login' => 'string',
      'name' => 'string'
  );

  static $attributeMap = array(
      'login' => 'login',
      'name' => 'name'
  );

  
  /**
  * Login do usuário que fará o atendimento do Ticket
  */
  public $login; /* string */
  /**
  * Nome do usuário que fará o atendimento do Ticket
  */
  public $name; /* string */

  public function __construct(array $data = null) {
    $this->login = $data["login"];
    $this->name = $data["name"];
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
