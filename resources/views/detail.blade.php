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
    <span>商品画像:
      @if ($product->img_path === null)
        <img src="/mstest/public/storage/IMG_8673.jpg">
      @else
        <img src="{{ asset('/storage/'.$product->img_path) }}">
      @endif
    </span>
    <br>
    <span>商品名: {{ $product->product_name }}</span>
    <br>
    <span>メーカー名: {{ $product->company['company_name'] }}</span>
    <br>
    <span>価格: {{ $product->price }}円</span>
    <br>
    <span>在庫数: {{ $product->stock }}個</span>
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
