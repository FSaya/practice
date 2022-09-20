<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\ProductRequest;

class TestUserController extends Controller
{
     /**
      *商品一覧画面を表示
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
      *商品詳細画面を表示
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
    /**
     *商品登録画面を表示
     *
     * @return view
     */
    public function showCreate() {
      // インスタンス生成
      $model = new Company();
      $companies = $model->getCompaniesDate();

      return view('form', ['companies' => $companies]);
    }

    /**
     *商品登録
     *
     * @return view
     */
    public function exeStore(ProductRequest $request) {
      //商品のデータを受け取る
      $inputs = $request->all();

      \DB::beginTransaction();
      try {
        //商品を登録
        Product::create($inputs);
        \DB::commit();
      } catch (\Throwable $e) {
        \DB::rollback();
        abort(500);
      }

      \Session::flash('err_msg','商品を登録しました。');
      return redirect(route('list'));
    }
}
