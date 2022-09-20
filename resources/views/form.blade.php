@extends('layouts')
@section('title','商品新規登録')
@section('content')
  <div class="title m-b-md">
      商品新規登録
  </div>

  <div class="links">
    <form action="{{ route('store') }}" method="post">
      @csrf

      <div class="form-group">
          <label for="product_name">商品名</label>
          <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product_name" value="{{ old('product_name') }}">
          @if($errors->has('product_name'))
              <p>{{ $errors->first('product_name') }}</p>
          @endif
      </div>

      <div class="form-group">
          <label for="company_name">メーカー</label>
          <select class="form-control" id="company_name" name="company_name">
              <option value="">メーカー名を選んでください。</option>
            @foreach ($companies as $company)
              <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endforeach
          </select>
          @if($errors->has('company_name'))
              <p>{{ $errors->first('company_name') }}</p>
          @endif
      </div>

      <div class="form-group">
          <label for="price">価格</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
          @if($errors->has('price'))
              <p>{{ $errors->first('price') }}</p>
          @endif
      </div>

      <div class="form-group">
          <label for="stock">在庫数</label>
          <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" value="{{ old('stock') }}">
          @if($errors->has('stock'))
              <p>{{ $errors->first('stock') }}</p>
          @endif
      </div>

      <div class="form-group">
          <label for="comment">コメント</label>
          <textarea class="form-control" id="comment" name="comment" placeholder="Comment">{{ old('comment') }}</textarea>
          @if($errors->has('comment'))
              <p>{{ $errors->first('comment') }}</p>
          @endif
      </div>

      <div class="form-group">
          <label for="img_path">商品画像</label>
          <input type="file" accept="image/*" class="form-control" id="img_path" name="img_path" placeholder="img_path" value="{{ old('img_path') }}">
          @if($errors->has('img_path'))
              <p>{{ $errors->first('img_path') }}</p>
          @endif
      </div>

      <button type="submit" class="btn btn-default">登録</button>
    </form>
  </div>
@endsection
