# SDK PHP para API V2 de Lojistas

Provê os componentes PHP para uso da API V2 de lojistas, disponibilizada pela CNova.

![Vantagens na utilização de SDKs](https://desenvolvedores.cnova.com/api-portal/sites/default/files/images/sdk_dev.png)

## Criando um API Client

Antes de utilizar as APIs, é necessário a criação de um client com as configurações de _base path_ e também as credenciais para acesso.

Abaixo segue o código de exemplo:

```php
require 'vendor/autoload.php';

use CNovaApiLojistaV2\client\Configuration;
use CNovaApiLojistaV2\client\ApiClient;
use CNovaApiLojistaV2\LoadsApi;
use CNovaApiLojistaV2\model\Product;
use CNovaApiLojistaV2\model\ProductLoadPrices;
use CNovaApiLojistaV2\model\ProductLoadStock;
use CNovaApiLojistaV2\model\Dimensions;
use CNovaApiLojistaV2\model\ProductAttribute;
use CNovaApiLojistaV2\client\ApiException;

Configuration::$apiKey['client_id'] = 'll0rQx9SSshr';
Configuration::$apiKey['access_token'] = 'nllKgtXTMv0G';

$api_client = new ApiClient('https://sandbox.cnova.com/api/v2');
```

## Operações auxiliares

Tratamento de estruturas de erros recebidas nas chamadas à API:

```php
function deserializeErrors($errorsJson, $apiClient) {

	$errors = null;

	try {
		$errors = $apiClient->deserialize(json_decode($errorsJson), 'Errors');
	} catch (\Exception $e) {}

	return $errors;

}
```

Formatação de datas para consultas em períodos específicos:

```php
function formatDateRange($initialDate, $finalDate, $apiClient) {

	$dtIni = '*';
	$dtEnd = '*';

	if ($initialDate != null && $initialDate instanceof \DateTime) {
		$dtIni = $initialDate->format(\DateTime::ISO8601);
	}

	if ($finalDate != null && $finalDate instanceof \DateTime) {
		$dtEnd = $finalDate->format(\DateTime::ISO8601);
	}

	return $dtIni . ',' . $dtEnd;

}
```

## APIs Disponíveis

A seguir, são apresentadas as APIs e exemplos com as as principais operações do Marketplace.

### Loads API

API utilizada para operações de carga.

Carga de produtos:

```php
$loads = new LoadsApi($api_client);

// Criação de um novo produto

$product = new Product();

$product->sku_seller_id = 'CEL_LGG4';
$product->product_seller_id = 'CEL';
$product->title = 'Produto de testes LG G4';
$product->description = '<h2>O novo produto de testes</h2>, LG G4';
$product->brand = 'LG';
$product->gtin = array('123456ft');
$product->categories = array (
		'Teste>API'
);
$product->images = array (
		'http://img.g.org/img1.jpeg'
);

$price = new ProductLoadPrices();
$price->default = 1999.0;
$price->offer = 1799.0;

$product->price = $price;

$stock = new ProductLoadStock();
$stock->quantity = 100;
$stock->cross_docking_time = 0;

$product->stock = $stock;

$dimensions = new Dimensions();
$dimensions->weight = 10;
$dimensions->length = 10;
$dimensions->width = 10;
$dimensions->height = 10;

$product->dimensions = $dimensions;

$product_attr = new ProductAttribute();
$product_attr->name = 'cor';
$product_attr->value = 'Verde';

$product->attributes =  array($product_attr);

// Adiciona o novo produto na lista a ser enviada
$products = array($product);

try {

	// Envia a carga de produtos
	$loads->postProducts($products);

} catch (ApiException $e) {

	$errors = deserializeErrors($e->getResponseBody(), $api_client);

	if ($errors != null) {
		foreach ($errors->errors as $error) {
			echo ($error->code . ' - ' . $error->message . "\n");
		}
	} else {
		echo ($e->getMessage());
	}

}
```

Consulta de cargas enviadas:

```php
$loads_api = new LoadsApi($api_client);

try {

	$get_products_response = $loads_api->getProducts(null, null, 0, 10);
	var_dump($get_products_response);

} catch (ApiException $e) {

	$errors = deserializeErrors($e->getResponseBody(), $api_client);

	if ($errors != null) {
		foreach ($errors->errors as $error) {
			echo ($error->code . ' - ' . $error->message . "\n");
		}
	} else {
		echo ($e->getMessage());
	}

}
```

Consulta um produto específico da carga enviada:

```php
$loads_api = new LoadsApi($api_client);

try {

	$get_product_with_errors_response = $loads_api->getProduct('CEL_LGG4');
	var_dump($get_product_with_errors_response);

} catch (ApiException $e) {

	$errors = deserializeErrors($e->getResponseBody(), $api_client);

	if ($errors != null) {
		foreach ($errors->errors as $error) {
			echo ($error->code . ' - ' . $error->message . "\n");
		}
	} else {
		echo ($e->getMessage());
	}

}
```

Modificação do tracking de uma ou mais ordens, utilizando a API Loads:

```php
$loads_api = new LoadsApi($api_client);

$orders_trackings = new OrdersTrackings();

$order_tracking = new OrderTracking();

$order_id = new OrderId();
$order_id->id = 123;
$order_tracking->order = $order_id;

$order_tracking->control_point = 'ABC';
$order_tracking->cte = '123';

$oif = new OrderItemReference();
$oif->sku_seller_id = '123456';
$oif->quantity = 1;

$order_tracking->items = array($oif);

$order_tracking->occurred_at = new \DateTime('NOW');
$order_tracking->seller_delivery_id = '99995439701';
$order_tracking->number = '01092014';
$order_tracking->url = 'servico envio2';

$carrier = new Carrier();
$carrier->cnpj = '72874279234';
$carrier->name = 'Sedex';

$order_tracking->carrier = $carrier;

$invoice = new Invoice();
$invoice->cnpj = '72874279234';
$invoice->number = '123';
$invoice->serie = '456';
$invoice->issued_at = new \DateTime('NOW');
$invoice->access_key = '01091111111111111111111111111111111111101092';
$invoice->link_xml = 'link xlm teste5';
$invoice->link_danfe = 'link nfe teste5';

$order_tracking->invoice = $invoice;

$orders_trackings->trackings = array($order_tracking);

try {

	$loads_api->postOrdersTrackingSent($orders_trackings);

} catch (ApiException $e) {

	$errors = deserializeErrors($e->getResponseBody(), $api_client);

	if ($errors != null) {
		foreach ($errors->errors as $error) {
			echo ($error->code . ' - ' . $error->message . "\n");
		}
	} else {
		echo ($e->getMessage());
	}

}
```

### Seller Items API

API utilizada para gerenciamento dos recursos enviados pelo lojista.

Consulta de seller items:

```php
$seller_items_Api = new SellerItemsApi($api_client);

try {

	$get_seller_items_response = $seller_items_Api->getSellerItems('EX', 0, 100);
	var_dump($get_seller_items_response);

} catch (ApiException $e) {
	echo ($e->getMessage());
}
```

Alteração de preço:

```php
$seller_items_api = new SellerItemsApi($api_client);

try {

	$prices = new Prices();
	$prices->default = 100;
	$prices->offer = 100;

	$seller_items_api->putSellerItemPrices('31.0019', $prices);

} catch (ApiException $e) {
	echo ($e->getMessage());
}
```

Alteração de estoque:

```php
$seller_items_api = new SellerItemsApi($api_client);

try {

	$stock = new Stock();
	$stock->quantity = 200;
	$stock->cross_docking_time = 0;

	$seller_items_api->putSellerItemStock('31.0019', $stock);

} catch (ApiException $e) {
	echo ($e->getMessage());
}
```

### Orders API

API utilizada para gerenciamento de pedidos.

Consulta todas as ordens:

```php
$orders_api = new OrdersApi($api_client);

try {
	$get_orders_response =  $orders_api->getOrders(0, 100);
	var_dump($get_orders_response);
} catch (ApiException $e) {
	echo ($e->getMessage());
}
```

Consulta todas as ordens com status "novo":

```php
$orders_api = new OrdersApi($api_client);

try {

	$purchased_at = formatDateRange(null, new \DateTime('NOW'), $api_client);

	$get_orders_response =  $orders_api->getOrdersByStatusNew($purchased_at, null, null, 0, 100);
	var_dump($get_orders_response);

} catch (ApiException $e) {
	echo ($e->getMessage());
}
```

Criação de um novo tracking, notificando o envio da ordem:

```php
$orders_api = new OrdersApi($api_client);

$new_tracking = new NewTracking();

$new_tracking->items = array('23258312-1', '23258312-2');

$new_tracking->occurred_at = new \DateTime('NOW');

$new_tracking->seller_delivery_id = '99995439701';
$new_tracking->number = '"01092014';
$new_tracking->url = 'servico envio2';

$carrier = new Carrier();
$carrier->cnpj = '72874279234';
$carrier->name = 'Sedex';

$new_tracking->carrier = $carrier;

$invoice = new Invoice();
$invoice->cnpj = '72874279234';
$invoice->number = '123';
$invoice->serie = '456';
$invoice->issued_at = new \DateTime('NOW');
$invoice->access_key = '01091111111111111111111111111111111111101092';
$invoice->link_xml = 'link xlm teste5';
$invoice->link_danfe = 'link nfe teste5';

$new_tracking->invoice = $invoice;

try {
	$orders_api->postOrderTrackingSent($new_tracking, '1024101');
} catch (ApiException $e) {

	$errors = deserializeErrors($e->getResponseBody(), $api_client);

	if ($errors != null) {
		foreach ($errors->errors as $error) {
			echo ($error->code . ' - ' . $error->message . "\n");
		}
	} else {
		echo ($e->getMessage());
	}

}
```

Consulta de ordens com status "enviado":

```php
$orders_api = new OrdersApi($api_client);

try {

	$get_orders_response = $orders_api->getOrdersByStatusSent(null, null, null, 0, 100);
	var_dump($get_orders_response);

} catch (ApiException $e) {
	echo ($e->getMessage());
}
```

### Tickets API

API utilizada para gerenciamento de tickets.

Criação de um novo ticket:

```php
$tickets_api = new TicketsApi($api_client);

$new_ticket = new NewTicket();
$new_ticket->to = 'atendimento+OS_706000500000@mktp.extra.com.br';
$new_ticket->body = 'Corpo da mensagem do ticket';

try {
	$tickets_api->postTicket($new_ticket);
} catch (ApiException $e) {

	$errors = deserializeErrors($e->getResponseBody(), $api_client);

	if ($errors != null) {
		foreach ($errors->errors as $error) {
			echo ($error->code . ' - ' . $error->message . "\n");
		}
	} else {
		echo ($e->getMessage());
	}

}
```

Consulta ticket com status "Aberto":

```php
$tickets_api = new TicketsApi($api_client);

try {

	$tickets = $tickets_api->getTickets('opened', '439211092852', null, null, null, 0, 5);
	var_dump($tickets);

} catch (ApiException $e) {
	echo ($e->getMessage());
}
```

Alteração do status do ticket:

```php
$tickets_api = new TicketsApi($api_client);

try {

	$ticket_status = new TicketStatus();
	$ticket_status->ticket_status = 'Em Acompanhamento';

	$tickets_api->putTicketStatus('123123', $ticket_status);

} catch (ApiException $e) {
	echo ($e->getMessage());
}
```

### Categories API

API utilziada na obtenção da árvore de categorias disponível.

Consulta as categorias disponíveis:

```php
$categories_api = new CategoriesApi($api_client);

try {

	$get_categories_response = $categories_api->getCategories(0, 5);

	foreach ($get_categories_response->categories as $categorie) {
		echo ($categorie->id . ' - ' . $categorie->name . "\n");
	}

} catch (ApiException $e) {
	echo ($e->getMessage());
}
```

### Sites API

API utilizada na obtenção da lista de sites.

Consulta os sites disponíveis:

```php
$sites_api = new SitesApi($api_client);

try {

	$get_sites_response = $sites_api->getSites();
	var_dump($get_sites_response);

} catch (ApiException $e) {
	echo ($e->getMessage());
}
```

### Warehouses API

API utilizada na obtenção da lista de warehouses (armazéns).

Consulta as warehouses disponíveis:

```php
$warehouses_api = new WarehousesApi($api_client);

try {

	$get_warehouses_response = $warehouses_api->getWarehouses();
	var_dump($get_warehouses_response);

} catch (ApiException $e) {
	echo ($e->getMessage());
}
```