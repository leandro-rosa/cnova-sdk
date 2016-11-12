<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Customer implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'name' => 'string',
      'document_number' => 'string',
      'type' => 'string',
      'created_at' => 'DateTime',
      'email' => 'string',
      'birth_date' => 'DateTime',
      'phones' => 'array[Phone]'
  );

  static $attributeMap = array(
      'id' => 'id',
      'name' => 'name',
      'document_number' => 'documentNumber',
      'type' => 'type',
      'created_at' => 'createdAt',
      'email' => 'email',
      'birth_date' => 'birthDate',
      'phones' => 'phones'
  );

  
  /**
  * Identificador do cliente
  */
  public $id; /* string */
  /**
  * Nome completo do cliente
  */
  public $name; /* string */
  /**
  * Documento do cliente
  */
  public $document_number; /* string */
  /**
  * Tipo de cliente: Pessoa Física ou Jurídica
  */
  public $type; /* string */
  /**
  * Data de envio do produto
  */
  public $created_at; /* DateTime */
  /**
  * Email do cliente
  */
  public $email; /* string */
  /**
  * Data de nascimento do cliente
  */
  public $birth_date; /* DateTime */
  /**
  * Lista de telefones do cliente
  */
  public $phones; /* array[Phone] */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->name = $data["name"];
    $this->document_number = $data["document_number"];
    $this->type = $data["type"];
    $this->created_at = $data["created_at"];
    $this->email = $data["email"];
    $this->birth_date = $data["birth_date"];
    $this->phones = $data["phones"];
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
