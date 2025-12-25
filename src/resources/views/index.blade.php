@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="index">
        <div class="index__head">
            <h1 class="index__title">商品一覧</h1>
            <a class="right--btn" href="{{ route('products.create') }}">＋商品を追加</a>
        </div>

        <div class="index__layout">
            <aside class="sidebar">
                <form class="sidebar__form" action="{{ route('products.index') }}" method="GET">
                    <input class="sidebar__input" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="商品名で検索">

                    <button class="sidebar__search-btn" type="submit">検索</button>

                    <p class="sidebar__label">価格順で表示</p>
                    <select class="sidebar__select" name="sort" onchange="this.form.submit()">
                        <option value="">価格で並び替え</option>
                        <option value="price_desc" {{ request('sort')==='price_desc' ? 'selected' : '' }}>高い順に表示</option>
                        <option value="price_asc" {{ request('sort')==='price_asc' ? 'selected' : '' }}>低い順に表示</option>
                    </select>

                    @if(request('sort'))
                        <div class="sortchip">
                            <span class="sortchip__text">
                                {{ request('sort')==='price_desc' ? '高い順に表示' : '低い順に表示' }}
                            </span>
                            <a class="sortchip__x" href="{{ route('products.index', request()->except('sort','page')) }}">×</a>
                        </div>
                    @endif
                </form>
            </aside>

            <section class="content">
                @if(request('keyword'))
                    <p class="content__result">“{{ request('keyword') }}”の商品一覧</p>
                @endif

                <div class="grid">
                    @foreach($products as $product)
                        <a class="card" href="{{ route('products.show', $product->id) }}">
                            <div class="card__image">
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="card__body">
                                <p class="card__name">{{ $product->name }}</p>
                                <p class="card__price">¥{{ number_format($product->price) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="pagerWrap">
                    {{ $products->links('vendor.pagination.mogitate') }}
                </div>
            </section>
        </div>
    </div>
@endsection