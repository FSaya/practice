<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{


    public function getProductsDate() {
        // productsテーブルからデータを取得
        $products = DB::table('products')->get();

        return $products;
    }

    //リレーション
    public function company() {
      return $this->belongsTo('App\Models\Company','company_id','id');
    }

    //Mass Assignment ホワイトリスト方式
    protected $fillable = ['product_name','company_id','price','stock','img_path','comment'];

}
