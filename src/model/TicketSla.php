<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class TicketSla implements ArrayAccess {
  static $swaggerTypes = array(
      'expire_at' => 'DateTime',
      'delayed' => 'boolean'
  );

  static $attributeMap = array(
      'expire_at' => 'expireAt',
      'delayed' => 'delayed'
  );

  
  /**
  * Data de expiração para resolução do ticket.
  */
  public $expire_at; /* DateTime */
  /**
  * Indicador de atraso do ticket.
  */
  public $delayed; /* boolean */

  public function __construct(array $data = null) {
    $this->expire_at = $data["expire_at"];
    $this->delayed = $data["delayed"];
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
