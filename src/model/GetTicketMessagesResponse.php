<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class GetTicketMessagesResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'messages' => 'array[TicketMessage]',
      'metadata' => 'array[MetadataEntry]'
  );

  static $attributeMap = array(
      'messages' => 'messages',
      'metadata' => 'metadata'
  );

  
  /**
  * Mensagens
  */
  public $messages; /* array[TicketMessage] */
  /**
  * Metadados do status
  */
  public $metadata; /* array[MetadataEntry] */

  public function __construct(array $data = null) {
    $this->messages = $data["messages"];
    $this->metadata = $data["metadata"];
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
