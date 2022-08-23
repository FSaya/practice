@extends('layouts')
@section('title','商品情報一覧')
@section('content')
  <div class="title m-b-md">
      商品情報一覧
  </div>

  <div class="links">
    <table>
      <thead>
          <tr>
              <th>ID</th>
              <th>商品画像</th>
              <th>商品名</th>
              <th>価格</th>
              <th>在庫数</th>
              <th>メーカー名</th>
          </tr>
      </thead>
      <tbody>
      @foreach ($products as $product)
          <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->img_path }}</td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->stock }}</td>
              <td>{{ $product->company_id }}</td>
              <td>
                <button
                  type="button"
                  class="btn-detail"
                  onclick="location.href='/product/{{ $product->id }}'">詳細</button>
              </td>
          </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
