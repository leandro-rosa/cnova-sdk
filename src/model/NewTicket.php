<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class NewTicket implements ArrayAccess {
  static $swaggerTypes = array(
      'to' => 'string',
      'body' => 'string'
  );

  static $attributeMap = array(
      'to' => 'to',
      'body' => 'body'
  );

  
  /**
  * Email do consumidor retornado no pedido
  */
  public $to; /* string */
  /**
  * Texto da mensagem
  */
  public $body; /* string */

  public function __construct(array $data = null) {
    $this->to = $data["to"];
    $this->body = $data["body"];
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
