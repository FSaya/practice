<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class TestUserController extends Controller
{
    public function showList() {
        // インスタンス生成
        $model = new Product();
        $products = $model->getProductsDate();

        return view('list', ['products' => $products]);
    }
}
