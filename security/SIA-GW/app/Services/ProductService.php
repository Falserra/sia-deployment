<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ProductService
{
    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = env('USERS2_SERVICE_BASE_URL');
        $this->secret = env('USERS2_SERVICE_SECRET');
    }

    public function getProducts()
    {
        return $this->performRequest('GET', '/products');
    }

    public function createProduct($data)
    {
        return $this->performRequest('POST', '/products', $data);
    }

    public function showProduct($id)
    {
        return $this->performRequest('GET', "/products/{$id}");
    }

    public function updateProduct($id, $data)
    {
        return $this->performRequest('PUT', "/products/{$id}", $data);
    }

    public function deleteProduct($id)
    {
        return $this->performRequest('DELETE', "/products/{$id}");
    }
}