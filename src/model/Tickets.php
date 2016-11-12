<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Tickets implements ArrayAccess {
  static $swaggerTypes = array(
      'tickets' => 'array[Ticket]',
      'metadata' => 'array[MetadataEntry]'
  );

  static $attributeMap = array(
      'tickets' => 'tickets',
      'metadata' => 'metadata'
  );

  
  /**
  * Tickets
  */
  public $tickets; /* array[Ticket] */
  /**
  * Leia mais sobre os metadados retornados nas listagens em <a href='../apis/index.html#search'>Metadada</a>
  */
  public $metadata; /* array[MetadataEntry] */

  public function __construct(array $data = null) {
    $this->tickets = $data["tickets"];
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
