<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{

    public function getProductsDate($company_id, $keyword) {
        // productsテーブルからデータを取得
        $products = Product::with('company')->get();

        $query = Product::query();
        if(!empty($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }
        if(!empty($company_id)) {
            $query->where('company_id', 'LIKE', "%{$company_id}%");
        }

        $products = $query->get();

        return $products;
    }

    public function getProductDate($id) {
      $product = Product::find($id);

      if (is_null($product)) {
        \Session::flash('err_msg',config('message.no_date'));
        return redirect(route('list'));
      }
      return $product;
    }

    //リレーション
    public function company() {
      return $this->belongsTo('App\Models\Company','company_id','id');
    }

    //Mass Assignment ホワイトリスト方式
    protected $fillable = ['product_name','company_id','price','stock','img_path','comment'];

}
