<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class GetCategoriesResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'categories' => 'array[Category]',
      'metadata' => 'array[MetadataEntry]'
  );

  static $attributeMap = array(
      'categories' => 'categories',
      'metadata' => 'metadata'
  );

  
  public $categories; /* array[Category] */
  public $metadata; /* array[MetadataEntry] */

  public function __construct(array $data = null) {
    $this->categories = $data["categories"];
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
