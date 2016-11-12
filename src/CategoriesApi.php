<?php

namespace CNovaApiLojistaV2;

class CategoriesApi {

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
   * getCategories
   *
   * Recupera uma lista de categorias
   *
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetCategoriesResponse
   */
   public function getCategories($_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getCategories');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getCategories');
      }
      

      // parse inputs
      $resourcePath = "/categories";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
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

      $responseObject = $this->apiClient->deserialize($response,'GetCategoriesResponse');
      return $responseObject;
  }
  
  /**
   * getCategoryById
   *
   * Recupera detalhes de uma categoria informada
   *
   * @param string $level_id Id da categoria. (required)
   * @return Category
   */
   public function getCategoryById($level_id) {
      
      // verify the required parameter 'level_id' is set
      if ($level_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $level_id when calling getCategoryById');
      }
      

      // parse inputs
      $resourcePath = "/categories/{levelId}";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      
      
      // path params
      if($level_id !== null) {
        $resourcePath = str_replace("{" . "levelId" . "}",
                                    $this->apiClient->toPathValue($level_id), $resourcePath);
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

      $responseObject = $this->apiClient->deserialize($response,'Category');
      return $responseObject;
  }
  

}
