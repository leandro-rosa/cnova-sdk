<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Category implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'int',
      'name' => 'string',
      'parent_id' => 'int',
      'items' => 'int',
      'attributes' => 'array[CategoryAttribute]',
      'categories' => 'array[Category]'
  );

  static $attributeMap = array(
      'id' => 'id',
      'name' => 'name',
      'parent_id' => 'parentId',
      'items' => 'items',
      'attributes' => 'attributes',
      'categories' => 'categories'
  );

  
  /**
  * ID da categoria
  */
  public $id; /* int */
  /**
  * Nome da categoria
  */
  public $name; /* string */
  /**
  * ID da categoria pai
  */
  public $parent_id; /* int */
  /**
  * Quantidade de produtos existentes nessa categoria
  */
  public $items; /* int */
  /**
  * Características do produto para a categoria
  */
  public $attributes; /* array[CategoryAttribute] */
  /**
  * Lista de sub-categorias (filhas)
  */
  public $categories; /* array[Category] */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->name = $data["name"];
    $this->parent_id = $data["parent_id"];
    $this->items = $data["items"];
    $this->attributes = $data["attributes"];
    $this->categories = $data["categories"];
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
