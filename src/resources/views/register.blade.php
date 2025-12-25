@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register">
    <h2 class="register__title">商品登録</h2>

    <form class="register__form" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="field">
            <label class="label" for="name">
                商品名 <span class="required">必須</span>
            </label>

            <input
                class="input"
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                placeholder="商品名を入力"
            >

            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="price">
                値段 <span class="required">必須</span>
            </label>

            <input
                class="input"
                type="number"
                name="price"
                id="price"
                value="{{ old('price') }}"
                placeholder="値段を入力"
            >

            @error('price')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="image">
                商品画像 <span class="required">必須</span>
            </label>

            <input
                class="file"
                type="file"
                name="image"
                id="image"
                accept="image/png,image/jpeg"
            >

            @error('image')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <div class="label">
                季節 <span class="required">必須</span>
                <span class="note">複数選択可</span>
            </div>

            @php
                $oldSeasons = (array) old('seasons', []);
            @endphp

            <div class="season">
                @foreach($seasons as $season)
                    <label class="season__item">
                        <input
                            class="season__check"
                            type="checkbox"
                            name="seasons[]"
                            value="{{ $season->id }}"
                            {{ in_array((string)$season->id, $oldSeasons, true) ? 'checked' : '' }}
                        >
                        <span>{{ $season->name }}</span>
                    </label>
                @endforeach
            </div>

            @error('seasons')
            <p class="error">{{ $message }}</p>
            @enderror

            @error('seasons.0')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="description">
                商品説明 <span class="required">必須</span>
            </label>

            <textarea
                class="textarea"
                name="description"
                id="description"
                cols="30"
                rows="8"
                maxlength="120"
                placeholder="商品の説明を入力"
            >{{ old('description') }}</textarea>

            @error('description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="actions">
            <a class="btn btn--ghost" href="{{ route('products.index') }}">戻る</a>
            <button class="btn btn--primary" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection
