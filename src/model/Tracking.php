<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Tracking implements ArrayAccess {
  static $swaggerTypes = array(
      'items' => 'array[ItemTracking]',
      'control_point' => 'string',
      'description' => 'string',
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
      'control_point' => 'controlPoint',
      'description' => 'description',
      'occurred_at' => 'occurredAt',
      'url' => 'url',
      'number' => 'number',
      'seller_delivery_id' => 'sellerDeliveryId',
      'cte' => 'cte',
      'carrier' => 'carrier',
      'invoice' => 'invoice'
  );

  
  /**
  * Lista de itens alterados pela operação de tracking
  */
  public $items; /* array[ItemTracking] */
  /**
  * Status do pedido. Veja o serviço <a href='#!/orders/getOrderByIdV2_get_0' target='_blank'><strong>GET /orders/{orderId}</strong></a> para consultar todos os controlPoits existentes.
  */
  public $control_point; /* string */
  /**
  * Descrição adicional sobre tracking
  */
  public $description; /* string */
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
  * ID único da entrega para o lojista no parceiro, não pode haver repetição deste ID
  */
  public $seller_delivery_id; /* string */
  /**
  * Conhecimento de Transporte Eletrônico
  */
  public $cte; /* string */
  /**
  * Informações sobre transportadora
  */
  public $carrier; /* Carrier */
  /**
  * Informações sobre a Nota Fiscal da compra
  */
  public $invoice; /* Invoice */

  public function __construct(array $data = null) {
    $this->items = $data["items"];
    $this->control_point = $data["control_point"];
    $this->description = $data["description"];
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
