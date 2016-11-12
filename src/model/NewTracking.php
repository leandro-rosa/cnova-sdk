<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class NewTracking implements ArrayAccess {
  static $swaggerTypes = array(
      'items' => 'array[string]',
      'occurred_at' => 'DateTime',
      'url' => 'string',
      'number' => 'string',
      'seller_delivery_id' => 'string',
      'cte' => 'string',
      'carrier' => 'Carrier',
      'invoice' => 'Invoice'
  );

  static $attributeMap = array(
      'items' => 'items',
      'occurred_at' => 'occurredAt',
      'url' => 'url',
      'number' => 'number',
      'seller_delivery_id' => 'sellerDeliveryId',
      'cte' => 'cte',
      'carrier' => 'carrier',
      'invoice' => 'invoice'
  );

  
  /**
  * Lista de Order IDs dos produtos comprados no pedido e que irão ser atualizados pela operação de tracking
  */
  public $items; /* array[string] */
  /**
  * Data da ocorrência
  */
  public $occurred_at; /* DateTime */
  /**
  * Url para consulta na transportadora
  */
  public $url; /* string */
  /**
  * ID do objeto na transportadora
  */
  public $number; /* string */
  /**
  * ID de entrega do Lojista. Esse ID deve ser único para um pedido, não podendo haver repetição entre pedidos
  */
  public $seller_delivery_id; /* string */
  /**
  * Conhecimento do Transporte Eletrônico
  */
  public $cte; /* string */
  /**
  * Informações sobre a transportadora
  */
  public $carrier; /* Carrier */
  /**
  * Informações sobre a Nota Fiscal da compra
  */
  public $invoice; /* Invoice */

  public function __construct(array $data = null) {
    $this->items = $data["items"];
    $this->occurred_at = $data["occurred_at"];
    $this->url = $data["url"];
    $this->number = $data["number"];
    $this->seller_delivery_id = $data["seller_delivery_id"];
    $this->cte = $data["cte"];
    $this->carrier = $data["carrier"];
    $this->invoice = $data["invoice"];
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
