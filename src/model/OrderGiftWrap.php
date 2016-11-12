<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class OrderGiftWrap implements ArrayAccess {
  static $swaggerTypes = array(
      'available' => 'boolean',
      'value' => 'double',
      'message_support' => 'boolean',
      'gift_card' => 'GiftCard'
  );

  static $attributeMap = array(
      'available' => 'available',
      'value' => 'value',
      'message_support' => 'messageSupport',
      'gift_card' => 'giftCard'
  );

  
  /**
  * Flag que indica se existe embrulho para presente para o produto
  */
  public $available; /* boolean */
  /**
  * Valor cobrado pelo embrulho
  */
  public $value; /* double */
  /**
  * Flag que indica se é possível incluir uma mensagem
  */
  public $message_support; /* boolean */
  /**
  * Mensagem que deverá ser enviada juntamente com o embrulho de presente
  */
  public $gift_card; /* GiftCard */

  public function __construct(array $data = null) {
    $this->available = $data["available"];
    $this->value = $data["value"];
    $this->message_support = $data["message_support"];
    $this->gift_card = $data["gift_card"];
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
