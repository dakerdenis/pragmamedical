@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="/css/pages/basic.css">
    <link rel="stylesheet" href="/css/pages/item.css">
    <link rel="stylesheet" href="/css/pages/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
@endsection
@section('content')
        <main class="main main_product">
            <div class="wrapper flex flex-column">
                <h2 class="page-title">{{ $product->{'title_' . $lang} ?? $product->title_az }}</h2>
                <div class="grid product">
                    <aside class="left-side">
                        <div class="gallery">
                            <a href="{{ $product->main_image ? asset('storage/' . $product->main_image) : 'https://via.placeholder.com/800' }}"
                               data-fancybox="gallery" class="main-image">
                                <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : 'https://via.placeholder.com/800' }}"
                                     alt="{{ $product->{'title_' . $lang} }}">
                            </a>
                            @php
                                $thumbs = collect(['image_1','image_2','image_3','image_4'])
                                    ->filter(fn($f) => !empty($product->$f));
                            @endphp
                            @if($thumbs->count())
                            <div class="thumbs">
                                @foreach($thumbs as $field)
                                <a href="{{ asset('storage/' . $product->$field) }}" data-fancybox="gallery">
                                    <img src="{{ asset('storage/' . $product->$field) }}" alt="">
                                </a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </aside>
                    <aside class="right-side">
                        <div class="content">
                            @php
                                $description = $product->{'description_' . $lang} ?? $product->description_az;
                                $usage = $product->{'usage_' . $lang} ?? $product->usage_az;
                                $indications = $product->{'indications_' . $lang} ?? $product->indications_az;
                            @endphp

                            @if($description)
                                <h3>{{ $lang === 'ru' ? 'Описание' : ($lang === 'en' ? 'Description' : 'Təsvir') }}</h3>
                                {!! nl2br(e($description)) !!}
                            @endif

                            @if($usage)
                                <h3>{{ $lang === 'ru' ? 'Способ применения' : ($lang === 'en' ? 'Usage' : 'İstifadə qaydası') }}</h3>
                                {!! nl2br(e($usage)) !!}
                            @endif

                            @if($indications)
                                <h3>{{ $lang === 'ru' ? 'Показания' : ($lang === 'en' ? 'Indications' : 'Göstərişlər') }}</h3>
                                {!! nl2br(e($indications)) !!}
                            @endif

                            @if($product->price)
                                <div style="margin-top:24px; padding:16px 0; border-top:1px solid #e2e8f0;">
                                    <span style="font-size:24px; font-weight:700; color:#063350;">
                                        {{ number_format($product->price, 2) }} ₼
                                    </span>
                                </div>
                            @endif
                        </div>
                    </aside>
                </div>
            </div>
        </main>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            animated: true,
            dragToClose: true,
            Thumbs: {
                autoStart: true
            },
            Toolbar: {
                display: ["close"]
            },
        });
    </script>
@endsection