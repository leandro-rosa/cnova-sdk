<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class TicketMessage implements ArrayAccess {
  static $swaggerTypes = array(
      'created_at' => 'DateTime',
      'id' => 'string',
      'user' => 'UserReference',
      'body' => 'string',
      'visibility' => 'string'
  );

  static $attributeMap = array(
      'created_at' => 'createdAt',
      'id' => 'id',
      'user' => 'user',
      'body' => 'body',
      'visibility' => 'visibility'
  );

  
  /**
  * Data de criação do Ticket
  */
  public $created_at; /* DateTime */
  /**
  * Id do Ticket
  */
  public $id; /* string */
  /**
  * Usuário
  */
  public $user; /* UserReference */
  /**
  * Texto da mensagem
  */
  public $body; /* string */
  /**
  * Se o consumidor final irá receber/visualizar a mensagem. Os valores permitidos são: 'private' e 'public'
  */
  public $visibility; /* string */

  public function __construct(array $data = null) {
    $this->created_at = $data["created_at"];
    $this->id = $data["id"];
    $this->user = $data["user"];
    $this->body = $data["body"];
    $this->visibility = $data["visibility"];
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
