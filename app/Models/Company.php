<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
  //リレーション
  public function products() {
    return $this->hasMany('App\Models\Product');
  }

  public function getCompaniesDate() {
      // companiesテーブルからデータを取得
      $companies = DB::table('companies')->get();

      return $companies;
  }

}
