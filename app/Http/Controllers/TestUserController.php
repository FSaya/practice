<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class TestUserController extends Controller
{
     /**
      *商品一覧を表示
      *
      * @return view
      */
    public function showList() {
        // インスタンス生成
        $model = new Product();
        $products = $model->getProductsDate();

        return view('list', ['products' => $products]);
    }
     /**
      *商品詳細を表示
      * @param int $id
      * @return view
      */
    public function showDetail($id) {
        // インスタンス生成

        $product = Product::find($id);

        if (is_null($product)) {
          \Session::flash('err_msg','データがありません。');
          return redirect(route('list'));
        }

        return view('detail', ['product' => $product]);
    }
}
