<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Auth;

// Services
use App\Services\ProductServices;

class ProductsController extends Controller
{
    private $product;

    public function __construct(ProductServices $product)
    {
        $this->product = $product;
    }

    // Product List
    public function products()
    {
        $data = [
            "header" => "Products",
            "title" => "Products",
            "products" => $this->product->getProducts()
        ];

        return view('admin.products.products', compact('data'));
    }
}