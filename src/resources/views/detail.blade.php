@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="product-detail">
    <div class="product-detail__inner">

        <div class="product-detail__heading">
            <a href="{{ route('products.index') }}">商品一覧</a>
            <span>＞ {{ $product->name }}</span>
        </div>

        <div class="product-detail__panel">

            <form
                action="{{ route('products.update', $product->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="product-detail__form"
            >
                @csrf
                @method('PUT')

                <div class="product-detail__grid">

                    <div class="product-detail__left">
                        <div class="product-detail__image">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </div>

                        <div class="product-detail__fileRow">
                            <label class="product-detail__fileBtn">
                                ファイルを選択
                                <input type="file" name="image" accept="image/png,image/jpeg">
                            </label>

                             <span id="file-name" class="file-name">
                                {{ basename($product->image) }}
                            </span>
                        </div>

                        <p class="error">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>

                    <div class="product-detail__right">
                        <div class="field">
                            <label class="label">商品名</label>
                            <input class="input" type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="商品名を入力">
                            <p class="error">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="field">
                            <label class="label">値段</label>
                            <input class="input" type="number" name="price" value="{{ old('price', $product->price) }}" placeholder="値段を入力">
                            <p class="error">
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="field">
                            <label class="label">
                                季節
                            </label>

                            <div class="season">
                                @php
                                    $oldSeasonIds = old('season_ids', $product->seasons->pluck('id')->toArray());
                                @endphp

                                @foreach($seasons as $season)
                                    <label class="season__item">
                                        <input
                                            class="season__check"
                                            type="checkbox"
                                            name="season_ids[]"
                                            value="{{ $season->id }}"
                                            {{ in_array($season->id, $oldSeasonIds) ? 'checked' : '' }}
                                        >
                                        <span>{{ $season->name }}</span>
                                    </label>
                                @endforeach
                            </div>

                            <p class="error">
                                @error('season_ids')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>

                <div class="product-detail__under">
                    <div class="field">
                        <label class="label">商品説明</label>
                        <textarea class="textarea" name="description" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
                        <p class="error">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>

                <div class="product-detail__footer">
                    <div class="product-detail__actions">
                        <a href="{{ route('products.index') }}" class="btn btn--ghost">戻る</a>
                        <button type="submit" class="btn btn--primary">変更を保存</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="product-detail__deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="trash" aria-label="削除">

                    <svg class="trash__icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M9 3h6l1 2h4v2H4V5h4l1-2Z" stroke="currentColor" stroke-width="1.6" />
                        <path d="M6 7l1 14h10l1-14" stroke="currentColor" stroke-width="1.6"/>
                        <path d="M10 11v7M14 11v7" stroke="currentColor" stroke-width="1.6"/>
                    </svg>
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
