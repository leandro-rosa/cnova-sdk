<?php

namespace CNovaApiLojistaV2;

class TicketsApi {

  function __construct($apiClient = null) {
    if (null === $apiClient) {
      if (Configuration::$apiClient === null) {
        Configuration::$apiClient = new ApiClient(); // create a new API client if not present
        $this->apiClient = Configuration::$apiClient;
      }
      else
        $this->apiClient = Configuration::$apiClient; // use the default one
    } else {
      $this->apiClient = $apiClient; // use the one provided by the user
    }
  }

  private $apiClient; // instance of the ApiClient

  /**
   * get the API client
   */
  public function getApiClient() {
    return $this->apiClient;
  }

  /**
   * set the API client
   */
  public function setApiClient($apiClient) {
    $this->apiClient = $apiClient;
  }

  
  /**
   * getTickets
   *
   * Operação utilizada para consultar os protocolos
   *
   * @param string $status Utilizado para filtrar os tickets com um status específico. Aberto (opened), Em Monitoramento (attendance), Fechado (closed). (required)
   * @param string $code Código do protocolo. (required)
   * @param string $customer_name Nome do comprador (ou parte dele). (required)
   * @param string $created_at Utilizado para filtrar tickets pela data de criação. É possível passar uma variação de datas separadas por &#39;,&#39;. Ex: 2014-12-15T11:00:00.000-02:00,*. (required)
   * @param string $closed_at Utilizado para filtrar tickets pela data de fechamento. É possível passar uma variação de datas separada &#39;,&#39;. Ex: 2014-12-15T11:00:00.000-02:00,2014-12-15T23:00:00.00-02:00. É possível também utilizar o caractere &#39;*&#39; para não limitar alguma posição. Ex: 2014-12-14T00:00.000-02:00,*. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial de consulta.  (required)
   * @param int $_limit Parâmetro utilizado para limitar a quantidade de registros trazidos pela consulta.  (required)
   * @return Tickets
   */
   public function getTickets($status, $code, $customer_name, $created_at, $closed_at, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getTickets');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getTickets');
      }
      

      // parse inputs
      $resourcePath = "/tickets";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($status !== null) {
        $queryParams['status'] = $this->apiClient->toQueryValue($status);
      }// query params
      if($code !== null) {
        $queryParams['code'] = $this->apiClient->toQueryValue($code);
      }// query params
      if($customer_name !== null) {
        $queryParams['customerName'] = $this->apiClient->toQueryValue($customer_name);
      }// query params
      if($created_at !== null) {
        $queryParams['createdAt'] = $this->apiClient->toQueryValue($created_at);
      }// query params
      if($closed_at !== null) {
        $queryParams['closedAt'] = $this->apiClient->toQueryValue($closed_at);
      }// query params
      if($_offset !== null) {
        $queryParams['_offset'] = $this->apiClient->toQueryValue($_offset);
      }// query params
      if($_limit !== null) {
        $queryParams['_limit'] = $this->apiClient->toQueryValue($_limit);
      }
      
      
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'Tickets');
      return $responseObject;
  }
  
  /**
   * postTicket
   *
   * Cria um novo protocolo
   *
   * @param NewTicket $new_ticket Objeto Novo Ticket.. (required)
   * @return string
   */
   public function postTicket($new_ticket) {
      
      // verify the required parameter 'new_ticket' is set
      if ($new_ticket === null) {
        throw new \InvalidArgumentException('Missing the required parameter $new_ticket when calling postTicket');
      }
      

      // parse inputs
      $resourcePath = "/tickets";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "POST";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      
      
      
      
      // body params
      $_tempBody = null;
      if (isset($new_ticket)) {
        $_tempBody = $new_ticket;
      }

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  
  /**
   * putTicketAssignee
   *
   * Operação utilizada para atualizar o responsável pelo atendimento do protocolo
   *
   * @param string $code Código do protocolo. (required)
   * @param TicketAssignee $body Mensagem a ser enviada como descrição da operação. (required)
   * @return string
   */
   public function putTicketAssignee($code, $body) {
      
      // verify the required parameter 'code' is set
      if ($code === null) {
        throw new \InvalidArgumentException('Missing the required parameter $code when calling putTicketAssignee');
      }
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling putTicketAssignee');
      }
      

      // parse inputs
      $resourcePath = "/tickets/{code}/assignee";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "PUT";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json; charset=utf-8'));

      
      
      // path params
      if($code !== null) {
        $resourcePath = str_replace("{" . "code" . "}",
                                    $this->apiClient->toPathValue($code), $resourcePath);
      }
      
      // body params
      $_tempBody = null;
      if (isset($body)) {
        $_tempBody = $body;
      }

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  
  /**
   * getTicketMessagesByCode
   *
   * Operação utilizada para consultar um protocolo
   *
   * @param string $code Identificador do  protocolo. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição do registro inicial que será trazido. A primeira posição é sempre zero (0). (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetTicketMessagesResponse
   */
   public function getTicketMessagesByCode($code, $_offset, $_limit) {
      
      // verify the required parameter 'code' is set
      if ($code === null) {
        throw new \InvalidArgumentException('Missing the required parameter $code when calling getTicketMessagesByCode');
      }
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getTicketMessagesByCode');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getTicketMessagesByCode');
      }
      

      // parse inputs
      $resourcePath = "/tickets/{code}/messages";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($_offset !== null) {
        $queryParams['_offset'] = $this->apiClient->toQueryValue($_offset);
      }// query params
      if($_limit !== null) {
        $queryParams['_limit'] = $this->apiClient->toQueryValue($_limit);
      }
      
      // path params
      if($code !== null) {
        $resourcePath = str_replace("{" . "code" . "}",
                                    $this->apiClient->toPathValue($code), $resourcePath);
      }
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'GetTicketMessagesResponse');
      return $responseObject;
  }
  
  /**
   * postTicketMessage
   *
   * Operação utilizada para criar uma mensagem no protocolo
   *
   * @param string $code Identificador do  protocolo. (required)
   * @param NewTicketMessage $ticket Objeto Ticket. (required)
   * @return string
   */
   public function postTicketMessage($code, $ticket) {
      
      // verify the required parameter 'code' is set
      if ($code === null) {
        throw new \InvalidArgumentException('Missing the required parameter $code when calling postTicketMessage');
      }
      
      // verify the required parameter 'ticket' is set
      if ($ticket === null) {
        throw new \InvalidArgumentException('Missing the required parameter $ticket when calling postTicketMessage');
      }
      

      // parse inputs
      $resourcePath = "/tickets/{code}/messages";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "POST";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      
      
      // path params
      if($code !== null) {
        $resourcePath = str_replace("{" . "code" . "}",
                                    $this->apiClient->toPathValue($code), $resourcePath);
      }
      
      // body params
      $_tempBody = null;
      if (isset($ticket)) {
        $_tempBody = $ticket;
      }

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  
  /**
   * putTicketStatus
   *
   * Operação utilizada para atualizar o status dos tickets
   *
   * @param string $code Código do protocólo. (required)
   * @param TicketStatus $body Parâmetros para ativação/desativação massiva de produtos (required)
   * @return string
   */
   public function putTicketStatus($code, $body) {
      
      // verify the required parameter 'code' is set
      if ($code === null) {
        throw new \InvalidArgumentException('Missing the required parameter $code when calling putTicketStatus');
      }
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling putTicketStatus');
      }
      

      // parse inputs
      $resourcePath = "/tickets/{code}/status";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "PUT";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json; charset=utf-8'));

      
      
      // path params
      if($code !== null) {
        $resourcePath = str_replace("{" . "code" . "}",
                                    $this->apiClient->toPathValue($code), $resourcePath);
      }
      
      // body params
      $_tempBody = null;
      if (isset($body)) {
        $_tempBody = $body;
      }

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  

}
