@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css')}}">
@endsection

@section('content')
    <div class="form-group">
        <div class="form-group__inner">
            <form action="/products" method="post">
                @csrf
                <div class="form-group__inner-left">
                    <a href="/products">商品一覧</a><span class="fruit-name">>キウイ</span>
                    <div class="product-detail-form">
                        <div  class="product-detail-image">
                            <input type="file">

                            <p class="images_error-message">
                                @error('price')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-group__inner-right"></div>
                    <div class="product-detail-form">
                        <label class="product-detail_label">商品名<span class="product-detail_required-box">
                            <span class="product-detail_required">必須</span>
                        </span>
                        </label>
                        <input class="product-detail-name_input" type="text" name="name" id="name" value="{{old('name') }}" placeholder="商品名を入力">
                        <p class="product-name_error-message">
                            @error('name')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div class="product-detail-form">
                    <div class="product-detail-price">
                        <label class="product-detail_label">値段<span class="product-detail_required-box">
                            <span class="product-detail_required">必須</span>
                        </span>
                        </label>
                        <input  class="product-detail-price_input" type="text" name="price" id="price" value="{{old('price')}}" placeholder="値段を入力">
                        <p class="price_error-message">
                            @error('price')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div class="product-detail-form">
                        <div class="product-detail-season">
                            <label class="product-detail_label">季節<span class="product-detail_required-box">
                                <span class="product-detail_required">必須</span>
                            </span>
                            <span class="season-choice">複数選択可</span>
                            </label>
                            <input type="checkbox-spring">春
                            <input type="checkbox-summer">夏
                            <input type="checkbox-autumn">秋
                            <input type="checkbox-winter">冬
                            <p class="seasons_error-message">
                                @error('price')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-group__inner-under">
                    <div class="product-detail-form">
                        <div class="product-detail-explain">
                            <label class="product-detail_label">商品説明
                            </label>
                        <textarea name="product-explain_textarea" cols="34" rows="10"></textarea>
                    </div>
                    <div class="product-detail-form__btn-inner">
                        <input class="product-detail-form__back-btn btn" type="submit" value="戻る" name="back">
                        <input class="product-detail-form__register-btn" type="submit" value="変更を保存" name="save">
                    </div>

<!--修正が必要------------------------------------->
                    <form action="{{ route('posts.destroy',$item->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
<!-----------ここまで------------------------------->
                </div>
            </form>
        </div>
    </div>
@endsection