<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class NewTicketMessage implements ArrayAccess {
  static $swaggerTypes = array(
      'user' => 'UserReference',
      'visibility' => 'string',
      'body' => 'string'
  );

  static $attributeMap = array(
      'user' => 'user',
      'visibility' => 'visibility',
      'body' => 'body'
  );

  
  /**
  * Informações de usuário
  */
  public $user; /* UserReference */
  /**
  * Se o consumidor final irá receber/visualizar a mensagem. Os valores permitidos são: 'private' e 'public'
  */
  public $visibility; /* string */
  /**
  * Texto da mensagem
  */
  public $body; /* string */

  public function __construct(array $data = null) {
    $this->user = $data["user"];
    $this->visibility = $data["visibility"];
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
