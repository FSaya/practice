@extends('layouts')
@section('title','商品情報一覧')
@section('content')
  <div class="title m-b-md">
      商品情報一覧
  </div>
  <button
    type="button"
    class="btn-detail"
    onclick="location.href='/mstest/public/create'">新規登録</button>
  <div>
    <form action="{{ route('list') }}" method="GET" id="searchForm">
      <div class="search_form">
        <input type="text" name="keyword" placeholder="キーワードを入力" value="{{ $keyword }}">
      </div>
      <div class="search_company-name">
        <select class="form-control" id="company_id" name="company_id">
            <option value="">メーカー名を選んでください。</option>
            @foreach ($companies as $company)
              <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endforeach
        </select>
      </div>
      <div class="search_btn">
        <button type="submit" class="btn btn-default">検索</button>
      </div>
    </form>
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
              <td>
                @if ($product->img_path === null)
                  <img src="/mstest/public/storage/img/IMG_8673.jpg">
                @else
                  <img src="{{ asset('/storage/img/'.$product->img_path) }}">
                @endif
              </td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->price }}円</td>
              <td>{{ $product->stock }}</td>
              <td>{{ $product->company['company_name'] }}</td>
              <td>
                <button
                  type="button"
                  class="btn-detail"
                  onclick="location.href='/mstest/public/{{ $product->id }}'">詳細</button>
              </td>
              <form action="{{ route('delete', $product->id) }}" method="POST" onSubmit="return checkDelete()">
                @csrf
                <td>
                  <button
                    type="submit"
                    class="btn-detail"
                    onclick=>削除</button>
                </td>
              </form>
          </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <script>
    function checkDelete() {
      if(window.confirm('削除してよろしいですか？')){
        return true;
      } else {
        return false;
      }
    }
  </script>
@endsection
