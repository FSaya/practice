@extends('layouts')
@section('title','商品情報編集')
@section('content')
  <div class="title m-b-md">
      商品情報編集
  </div>

  <div class="links">
    <form action="{{ route('update') }}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{ $product->id }}">
      <span>商品情報ID: {{ $product->id }}</span>
      <br>
      <div class="form-group">
          <label for="product_name">商品名</label>
          <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product_name" value="{{ $product->product_name }}">
          @if($errors->has('product_name'))
              <p>{{ $errors->first('product_name') }}</p>
          @endif
      </div>

      <div class="form-group">
          <label for="company_id">メーカー</label>
          <select class="form-control" id="company_id" name="company_id">
              <option value="">メーカー名を選んでください。</option>
              <option value="6" @if( old('company_id') === '6') selected @endif >株式会社 小林</option>
              <option value="7" @if( old('company_id') === '7') selected @endif >有限会社 藤本</option>
              <option value="8" @if( old('company_id') === '8') selected @endif >株式会社 近藤</option>
              <option value="9" @if( old('company_id') === '9') selected @endif >有限会社 青山</option>
              <option value="10" @if( old('company_id') === '10') selected @endif >有限会社 桐山</option>
          </select>
          @if($errors->has('company_id'))
              <p>{{ $errors->first('company_id') }}</p>
          @endif
      </div>

      <div class="form-group">
          <label for="price">価格</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ $product->price }}">
          @if($errors->has('price'))
              <p>{{ $errors->first('price') }}</p>
          @endif
      </div>

      <div class="form-group">
          <label for="stock">在庫数</label>
          <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" value="{{ $product->stock }}">
          @if($errors->has('stock'))
              <p>{{ $errors->first('stock') }}</p>
          @endif
      </div>

      <div class="form-group">
          <label for="comment">コメント</label>
          <textarea class="form-control" id="comment" name="comment" placeholder="Comment">{{ $product->comment }}</textarea>
          @if($errors->has('comment'))
              <p>{{ $errors->first('comment') }}</p>
          @endif
      </div>

      <div class="form-group">
          <label for="img_path">商品画像</label>
          <input type="file" accept="image/*" class="form-control" id="img_path" name="img_path" placeholder="img_path" value="{{ $product->img_path }}">
          @if($errors->has('img_path'))
              <p>{{ $errors->first('img_path') }}</p>
          @endif
      </div>

      <button type="submit" class="btn btn-default">更新</button>
      <button
        type="button"
        class="btn-detail"
        onclick="location.href='/mstest/public/{id}'">戻る</button>
    </form>
  </div>
@endsection
