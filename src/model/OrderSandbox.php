<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class OrderSandbox implements ArrayAccess {
  static $swaggerTypes = array(
      'site' => 'string',
      'items' => 'array[OrderItemSandbox]',
      'customer' => 'CustomerSandbox'
  );

  static $attributeMap = array(
      'site' => 'site',
      'items' => 'items',
      'customer' => 'customer'
  );

  
  /**
  * Site para o qual o pedido será criado. . Consulte a lista completa de sites disponíveis no serviço <a href='#!/sites' target='_blank'><strong>GET /sites</strong></a>
  */
  public $site; /* string */
  /**
  * Lista de produtos do pedido
  */
  public $items; /* array[OrderItemSandbox] */
  /**
  * Informações do cliente
  */
  public $customer; /* CustomerSandbox */

  public function __construct(array $data = null) {
    $this->site = $data["site"];
    $this->items = $data["items"];
    $this->customer = $data["customer"];
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
