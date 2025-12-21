@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css')}}">
@endsection

@section('content')
    <div class="form-group">
        <h2 class="form__heading">商品登録</h2>
        <div class="form-group__inner">
            <form action="/products" method="post">
                @csrf
                <div class="product-register-form">
                    <label class="product-register_label">商品名<span class="product-register_required-box">
                        <span class="product-register_required">必須</span>
                    </span>
                    </label>
                    <input class="product-register-name_input" type="text" name="name" id="name" value="{{old('name') }}" placeholder="商品名を入力">
                    <p class="product-name_error-message">
                        @error('name')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="product-register-form">
                <div class="product-register-price">
                    <label class="product-register_label">値段<span class="product-register_required-box">
                        <span class="product-register_required">必須</span>
                    </span>
                    </label>
                    <input  class="product-register-price_input" type="text" name="price" id="price" value="{{old('price')}}" placeholder="値段を入力">
                    <p class="price_error-message">
                        @error('price')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="product-register-form">
                    <div  class="product-register-image">
                        <label class="product-register_label">商品画像<span class="product-register_required-box">
                            <span class="product-register_required">必須</span>
                        </span>
                        </label>
                        <input type="file">
                        <p class="images_error-message">
                            @error('price')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="product-register-form">
                    <div class="product-register-season">
                        <label class="product-register_label">季節<span class="product-register_required-box">
                            <span class="product-register_required">必須</span>
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
                <div class="product-register-form">
                    <div class="product-register-explain">
                        <label class="product-register_label">商品説明   <span class="product-register_required-box">
                            <span class="product-register_required">必須
                            </span>
                        </span>
                        </label>
                        <textarea name="product-explain_textarea" cols="34" rows="10"></textarea>
                    </div>
                </div>
                <div class="product-register-form__btn-inner">
                    <input class="product-register-form__back-btn btn" type="submit" value="戻る" name="back">
                    <input class="product-register-form__register-btn" type="submit" value="登録" name="register">
                </div>
            </form>
        </div>
    </div>
@endsection