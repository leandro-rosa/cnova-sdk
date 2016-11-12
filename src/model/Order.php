<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Order implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'order_site_id' => 'string',
      'site' => 'string',
      'payment_type' => 'int',
      'purchased_at' => 'DateTime',
      'approved_at' => 'DateTime',
      'updated_at' => 'DateTime',
      'status' => 'string',
      'total_amount' => 'double',
      'total_discount_amount' => 'double',
      'billing' => 'BillingAddress',
      'customer' => 'Customer',
      'freight' => 'Freight',
      'items' => 'array[OrderItem]',
      'shipping' => 'ShippingAddress',
      'trackings' => 'array[Tracking]',
      'seller' => 'Seller'
  );

  static $attributeMap = array(
      'id' => 'id',
      'order_site_id' => 'orderSiteId',
      'site' => 'site',
      'payment_type' => 'paymentType',
      'purchased_at' => 'purchasedAt',
      'approved_at' => 'approvedAt',
      'updated_at' => 'updatedAt',
      'status' => 'status',
      'total_amount' => 'totalAmount',
      'total_discount_amount' => 'totalDiscountAmount',
      'billing' => 'billing',
      'customer' => 'customer',
      'freight' => 'freight',
      'items' => 'items',
      'shipping' => 'shipping',
      'trackings' => 'trackings',
      'seller' => 'seller'
  );

  
  /**
  * ID do pedido gerado para o lojista
  */
  public $id; /* string */
  /**
  * ID do pedido gerado no site e que é passado ao cliente
  */
  public $order_site_id; /* string */
  /**
  * Site para o qual o pedido foi criado. Consulte a lista completa de sites disponíveis no serviço <a href='#!/sites' target='_blank'><strong>GET /sites</strong></a>
  */
  public $site; /* string */
  /**
  * Código do meio de pagamento. Consulte todos os tipos de pagamento disponíveis em <a href='#!/orders/getOrderByIdV2_get_0' target='_blank'><strong>GET /orders/{orderId}</strong></a>
  */
  public $payment_type; /* int */
  /**
  * Data da compra
  */
  public $purchased_at; /* DateTime */
  /**
  * Data de aprovação de pagamento do pedido
  */
  public $approved_at; /* DateTime */
  /**
  * Última data de atualização do pedido
  */
  public $updated_at; /* DateTime */
  /**
  * Status atual do pedido
  */
  public $status; /* string */
  /**
  * Total do pedido
  */
  public $total_amount; /* double */
  /**
  * Total de descontos do pedido
  */
  public $total_discount_amount; /* double */
  /**
  * Informações de cobrança
  */
  public $billing; /* BillingAddress */
  /**
  * Informações do cliente
  */
  public $customer; /* Customer */
  /**
  * Informações de frete do pedido
  */
  public $freight; /* Freight */
  /**
  * Lista de itens do pedido
  */
  public $items; /* array[OrderItem] */
  /**
  * Informações de envio do pedido.
  */
  public $shipping; /* ShippingAddress */
  /**
  * Informações de tracking do pedido
  */
  public $trackings; /* array[Tracking] */
  /**
  * Informações de venda
  */
  public $seller; /* Seller */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->order_site_id = $data["order_site_id"];
    $this->site = $data["site"];
    $this->payment_type = $data["payment_type"];
    $this->purchased_at = $data["purchased_at"];
    $this->approved_at = $data["approved_at"];
    $this->updated_at = $data["updated_at"];
    $this->status = $data["status"];
    $this->total_amount = $data["total_amount"];
    $this->total_discount_amount = $data["total_discount_amount"];
    $this->billing = $data["billing"];
    $this->customer = $data["customer"];
    $this->freight = $data["freight"];
    $this->items = $data["items"];
    $this->shipping = $data["shipping"];
    $this->trackings = $data["trackings"];
    $this->seller = $data["seller"];
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
