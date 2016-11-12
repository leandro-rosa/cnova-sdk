<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class GetSellerItemsResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'seller_items' => 'array[SellerItem]',
      'metadata' => 'array[MetadataEntry]'
  );

  static $attributeMap = array(
      'seller_items' => 'sellerItems',
      'metadata' => 'metadata'
  );

  
  public $seller_items; /* array[SellerItem] */
  /**
  * Leia mais sobre os metadados retornados nas listagens em <a href='../apis/index.html#search' target='_blank'>Metadada</a>
  */
  public $metadata; /* array[MetadataEntry] */

  public function __construct(array $data = null) {
    $this->seller_items = $data["seller_items"];
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
