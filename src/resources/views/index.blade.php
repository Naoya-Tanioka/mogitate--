@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

<body>
    <div class="index_content">
        <div class="search_windows">
            <div class="page_title"></div>
            <div class="kensaku_window">
            </div>
            <div class="kensaku_button"></div>
            <div class="junbanhyouji">価格順で表示</div>
            <div class="sentakushi"></div>
        </div>
        <div class="fruit_images">
            <div class="shouhintuika_button"></div>
            <div class="fruit_image1"></div>
            <div class="fruit_image2"></div>
            <div class="fruit_image3"></div>
            <div class="fruit_image4"></div>
            <div class="fruit_image5"></div>
            <div class="fruit_image6"></div>
        </div>
        <!--ページネーション-->
        <div class="pagination"></div>
    </div>
</body>
</html>