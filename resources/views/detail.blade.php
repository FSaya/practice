@extends('layouts')
@section('title','商品情報詳細')
@section('content')
  <div class="title m-b-md">
      商品情報詳細
  </div>
  @if (session('err_msg'))
    <p class="text-danger">
      {{session('err_msg')}}
    </p>
  @endif
  <div class="detail">
    <span>商品情報ID: {{ $product->id }}</span>
    <br>
    <span>商品画像: {{ $product->img_path }}</span>
    <br>
    <span>商品名: {{ $product->product_name }}</span>
    <br>
    <span>メーカー名: {{ $product->company_id }}</span>
    <br>
    <span>価格: {{ $product->price }}</span>
    <br>
    <span>在庫数: {{ $product->stock }}</span>
    <br>
    <span>コメント: {{ $product->comment }}</span>
  </div>
  <div class="btn">
    <button
      type="button"
      class="btn-detail"
      onclick="location.href='/mstest/public/edit/{{ $product->id }}'">編集</button>
    <button
      type="button"
      class="btn-detail"
      onclick="location.href='/mstest/public/list'">戻る</button>
  </div>
@endsection
