<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class GiftCard implements ArrayAccess {
  static $swaggerTypes = array(
      'from' => 'string',
      'to' => 'string',
      'message' => 'string'
  );

  static $attributeMap = array(
      'from' => 'from',
      'to' => 'to',
      'message' => 'message'
  );

  
  /**
  * Nome de quem está dando o presente
  */
  public $from; /* string */
  /**
  * Nome de quem irá receber o presente
  */
  public $to; /* string */
  /**
  * Mensagem que deverá ser enviada no cartão juntamente com o embrulho de presente
  */
  public $message; /* string */

  public function __construct(array $data = null) {
    $this->from = $data["from"];
    $this->to = $data["to"];
    $this->message = $data["message"];
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
