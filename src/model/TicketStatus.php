<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class TicketStatus implements ArrayAccess {
  static $swaggerTypes = array(
      'ticket_status' => 'string'
  );

  static $attributeMap = array(
      'ticket_status' => 'ticketStatus'
  );

  
  /**
  * Novo status desejado do Ticket. Fechado <strong> (closed) </strong> e Em Acompanhamento <strong> (attendance) </strong>
  */
  public $ticket_status; /* string */

  public function __construct(array $data = null) {
    $this->ticket_status = $data["ticket_status"];
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
