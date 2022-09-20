<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
  //リレーション
  public function products() {
    return $this->belongsTo('App\Models\Product');
  }

}
