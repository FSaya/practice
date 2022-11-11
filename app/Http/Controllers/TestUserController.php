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
    public function showList(Request $request) {

        $companies = Company::all();
        $products = Product::with('company')->get();

        $company_id = $request->input('company_id');
        $keyword = $request->input('keyword');
        $query = Product::query();
        if(!empty($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }
        if(!empty($company_id)) {
            $query->where('company_id', 'LIKE', "%{$company_id}%");
        }

        $products = $query->get();

        return view('list', compact('products','companies','keyword'));
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
      //$inputs = $request->all();

      // インスタンス生成
      $product = new Product();
      $product->product_name = $request->input('product_name');
      $product->company_id = $request->input('company_id');
      $product->price = $request->input('price');
      $product->stock = $request->input('stock');
      $product->comment = $request->input('comment');

      $img = $request->file('img_path')->getClientOriginalName();

      //$img_path = $request->file('img_path')->storeAs('img','public');

      \DB::beginTransaction();
      try {
        //商品を登録
        //Product::create($inputs);
        if ($img) {
          $img_path = $request->file('img_path')->storeAs('img', $img,'public');
          if ($img_path) {
            $product->img_path = $img_path;
          }
        }
        $product->save();
        //Product::create(['img_path' => $img_path]);
        \DB::commit();
      } catch (\Throwable $e) {
        \DB::rollback();
        abort(500);
      }

      \Session::flash('err_msg','商品を登録しました。');
      return redirect(route('create'));
    }

    /**
     *商品編集画面を表示
     * @param int $id
     * @return view
     */
      public function showEdit($id) {
       // インスタンス生成

       $product = Product::find($id);

       if (is_null($product)) {
         \Session::flash('err_msg','データがありません。');
         return redirect(route('list'));
       }

       $model = new Company();
       $companies = $model->getCompaniesDate();

       return view('edit', ['product' => $product], ['companies' => $companies]);
      }

      /**
       *商品編集
       *
       * @return view
       */
      public function exeUpdate(ProductRequest $request) {
        //商品のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
          //商品を編集
          $product = Product::find($inputs['id']);
          $product->fill([
            'product_name' => $inputs['product_name'],
            'company_id' => $inputs['company_id'],
            'price' => $inputs['price'],
            'stock' => $inputs['stock'],
            'comment' => $inputs['comment'],
            'img_path' => $inputs['img_path']
          ]);
          $product->save();
          \DB::commit();
        } catch (\Throwable $e) {
          \DB::rollback();
          abort(500);
        }

        \Session::flash('err_msg','商品を編集しました。');
        return redirect()->back();
      }

      /**
       *商品削除
       * @param int $id
       * @return view
       */
        public function exeDelete($id) {
         // インスタンス生成

         if (empty($id)) {
           \Session::flash('err_msg','データがありません。');
           return redirect(route('list'));
         }

         try {
           //商品を削除
           Product::destroy($id);
         } catch (\Throwable $e) {
           abort(500);
         }

         \Session::flash('err_msg','削除しました。');
         return redirect(route('list'));
        }
}
