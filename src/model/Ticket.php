<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Ticket implements ArrayAccess {
  static $swaggerTypes = array(
      'code' => 'string',
      'status' => 'string',
      'description' => 'string',
      'created_at' => 'DateTime',
      'updated_at' => 'DateTime',
      'closed_at' => 'DateTime',
      'priority' => 'string',
      'assignee' => 'TicketAssignedUser',
      'ombudsman' => 'Ombudsman',
      'customer' => 'CustomerReference',
      'site' => 'string',
      'channel' => 'string',
      'type' => 'TicketType',
      'subject' => 'TicketSubject',
      'sla' => 'TicketSla',
      'metadata' => 'array[MetadataEntry]'
  );

  static $attributeMap = array(
      'code' => 'code',
      'status' => 'status',
      'description' => 'description',
      'created_at' => 'createdAt',
      'updated_at' => 'updatedAt',
      'closed_at' => 'closedAt',
      'priority' => 'priority',
      'assignee' => 'assignee',
      'ombudsman' => 'ombudsman',
      'customer' => 'customer',
      'site' => 'site',
      'channel' => 'channel',
      'type' => 'type',
      'subject' => 'subject',
      'sla' => 'sla',
      'metadata' => 'metadata'
  );

  
  /**
  * ID do ticket
  */
  public $code; /* string */
  /**
  * Status do ticket que são classificados como: <strong>'opened', 'closed' e 'attendance'.</strong>
  */
  public $status; /* string */
  /**
  * Descrição do ticket
  */
  public $description; /* string */
  /**
  * Data da criação do ticket
  */
  public $created_at; /* DateTime */
  /**
  * Atualização do ticket
  */
  public $updated_at; /* DateTime */
  /**
  * Data de encerramento do ticket
  */
  public $closed_at; /* DateTime */
  /**
  * Prioridade do ticket possui os seguintes valores: <strong>'Normal' e 'Em Acompanhamento'</strong>
  */
  public $priority; /* string */
  /**
  * Responsável pelo atendimento do protocolo.
  */
  public $assignee; /* TicketAssignedUser */
  /**
  * Informações de ouvidoria
  */
  public $ombudsman; /* Ombudsman */
  /**
  * Cliente associado ao ticket
  */
  public $customer; /* CustomerReference */
  /**
  * Site de origem do protocolo. Os valores disponíveis no site são: <strong> CD, BT, EH, EX, PF, e CB </strong>
  */
  public $site; /* string */
  /**
  * O canal de atendimento de origem do protocolo, possui os seguintes valores: <strong> Fale Conosco, Admin Seller, CallCenter, Email, e External Service</strong>
  */
  public $channel; /* string */
  /**
  * Tipo do ticket.
  */
  public $type; /* TicketType */
  /**
  * Assunto relacionado ao ticket.
  */
  public $subject; /* TicketSubject */
  /**
  * Informações sobre o prazo de atendimento do ticket.
  */
  public $sla; /* TicketSla */
  /**
  * Leia mais sobre os metadados retornados nas listagens em <a href='../apis/index.html#search'>Metadada</a>
  */
  public $metadata; /* array[MetadataEntry] */

  public function __construct(array $data = null) {
    $this->code = $data["code"];
    $this->status = $data["status"];
    $this->description = $data["description"];
    $this->created_at = $data["created_at"];
    $this->updated_at = $data["updated_at"];
    $this->closed_at = $data["closed_at"];
    $this->priority = $data["priority"];
    $this->assignee = $data["assignee"];
    $this->ombudsman = $data["ombudsman"];
    $this->customer = $data["customer"];
    $this->site = $data["site"];
    $this->channel = $data["channel"];
    $this->type = $data["type"];
    $this->subject = $data["subject"];
    $this->sla = $data["sla"];
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
