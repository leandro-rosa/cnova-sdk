<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class TicketAssignedUser implements ArrayAccess {
  static $swaggerTypes = array(
      'user' => 'string',
      'group' => 'string'
  );

  static $attributeMap = array(
      'user' => 'user',
      'group' => 'group'
  );

  
  /**
  * Identificador do assunto.
  */
  public $user; /* string */
  /**
  * Descrição do assunto relacionado ao ticket.
  */
  public $group; /* string */

  public function __construct(array $data = null) {
    $this->user = $data["user"];
    $this->group = $data["group"];
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
